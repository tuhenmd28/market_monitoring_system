<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use App\Models\Login;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Spatie\Multitenancy\Models\Tenant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    function encryptIt($string)
    {


        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'Lf6Q5htqdgnSn0AABqlsSddj1QNu0fJs';
        $secret_iv = 'This is my secret iv';
        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
        $output = str_replace("=", "", $output);

        return $output;
    }
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_name' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate() : void
    {
        $username = $this->only('user_name')['user_name'];
        $password = $this->encryptIt($this->only('password')['password']);

        $login = Login::where([['username', $username], ['password', $password]])->first();
        // $login = Login::where('username', $username)->first();
        $user = User::where('user_name', $username)->first();
        if(Tenant::checkCurrent()){
           if(app('currentTenant')->subdomain != $username){
            throw ValidationException::withMessages([
                'error' => trans('auth.user'),
            ]);
           }

        }
        if($user->user_type != 1){
            throw ValidationException::withMessages([
                'user_login' => trans('auth.user_login'),
            ]);
        }
        // dd($user);
        $this->ensureIsNotRateLimited();
        // if ($login != null || $user->login_id != null) {


            if (!Auth::attempt($this->only('user_name', 'password'), $this->boolean('remember'))) {

                RateLimiter::hit($this->throttleKey());

                throw ValidationException::withMessages([
                    'user_name' => trans('auth.failed'),
                ]);
            }
            // Auth::login($user);

        // } else {
        //     // dd("slkjdf");
        //     throw ValidationException::withMessages([
        //         'user_name' => trans('auth.failed'),
        //     ]);
        // }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('email')) . '|' . $this->ip());
    }
}
