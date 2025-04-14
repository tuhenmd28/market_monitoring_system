<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Union;
use App\Models\Farmer;
use App\Models\Product;
use App\Models\Upazila;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.pages.index');
    }
    public function admin_register(Request $request)
    {

            $data['division'] = Division::all();
            return view('frontend.pages.signup', $data);



    }
    public function admin_signup_store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users',
            // 'phone' => 'required|unique:users',
            'password' => 'required|min:6|max:255',
            // "password_confirmation" => "required|same:password",
        ];
        validator::make($request->all(), $rules)->validate();
        // $data = $request->all();
        // dd($data);
        // $data['password'] = Hash::make($request->password);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->nid = $request->nid;
        // $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        // $user->division_id = $request->division_id;
        // $user->district_id = $request->district_id;
        // $user->upazila_id  = $request->upzila_id;
        // $user->union_id = $request->union_id;
        // $user->address = $request->address;
        $user->type = $request->status;
        $user->save();


        return redirect()->route('signin')->with(["success" => "Registration Successful"]);

    }
    public function farmer_signup_store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|min:6|max:255',
            'nid' => 'required',
            'total_land' => 'required',
            'own_land' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'upzila_id' => 'required',
            'union_id' => 'required',
            'address' => 'required',
            "password_confirmation" => "required|same:password",
        ];
        validator::make($request->all(), $rules)->validate();
        // $data = $request->all();
        // dd($data);
        // $data['password'] = Hash::make($request->password);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nid = $request->nid;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->division_id = $request->division_id;
        $user->district_id = $request->district_id;
        $user->upazila_id  = $request->upzila_id;
        $user->union_id = $request->union_id;
        $user->address = $request->address;
        $user->type = User::FARMER;
        $user->save();

        $farmer = new Farmer();
        $farmer->user_id = $user->id;
        $farmer->total_land = $request->total_land;
        $farmer->own_land = $request->own_land;
        $farmer->save();


        return redirect()->route('signin')->with(["success" => "Registration Successful"]);

    }
    public function adminSignIn()
    {
        // dd('ok');
        return view('frontend.pages.admin_login');
    }
    public function signin()
    {
        $data['division'] = Division::all();
        return view('frontend.pages.login', $data);
    }
    public function farmerSignIn()
    {
        return view('frontend.pages.index');
    }
    public function auction()
    {
        return view('frontend.pages.auction');
    }
    public function product()
    {
        $data['products'] = Product::with('bids','category','images')->get();
        return view('frontend.pages.product',$data);
    }
    public function product_details($id)
    {
        $data['product'] = Product::with('bids','category','images')->find($id);
        return view('frontend.pages.product_details',$data);
    }
    public function contact()
    {
        return view('frontend.pages.contact');
    }
    public function about()
    {
        return view('frontend.pages.about');
    }
    public function getDistrict(Request $request)
    {
        $division_id = $request->division_id;
        $district = District::where('division_id', $division_id)->get();
        $output = '<option value="">Select District</option>';

        foreach ($district as $dist) {
            $output .= '<option value="' . $dist->id . '">' . $dist->name . '</option>';
        }
        if ($district->count() == 0) {
            $output = false;
        }
        return $output;
    }
    public function getUpazila(Request $request)
    {
        $division_id = $request->division_id;
        $district = Upazila::where('district_id', $division_id)->get();
        $output = '<option value="">Select Upazila</option>';

        foreach ($district as $dist) {
            $output .= '<option value="' . $dist->id . '">' . $dist->name . '</option>';
        }
        if ($district->count() == 0) {
            $output = false;
        }
        return $output;
    }
    public function getUnion(Request $request)
    {
        $division_id = $request->division_id;
        $district = Union::where('upazilla_id', $division_id)->get();
        $output = '<option value="">Select Union</option>';

        foreach ($district as $dist) {
            $output .= '<option value="' . $dist->id . '">' . $dist->name . '</option>';
        }
        if ($district->count() == 0) {
            $output = false;
        }
        return $output;
    }
    public function login(Request $request)
    {

        // dd($request->all());

        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->with(["errors" => $validator->errors()]);
        }

            $credential = $request->only('email', 'password');




            if (Auth::attempt($credential)) {
                // dd($credential);

                if (auth()->user()->type == User::SUPPERADMIN) {
                    return redirect()->route('dashboard')->with(["success" => "Login Successful"]);
                } else if (auth()->user()->type == User::ADMIN) {
                    // dd(auth()->user()->hasDirectPermission('dashboard_view'));
                    // if(auth()->user()->hasDirectPermission('dashboard_view')){
                    return redirect()->route('dashboard')->with(["success" => "Login Successful"]);
                    // }
                    // return redirect()->route('profile_update_view')->with(["success" => "Login Successful"]);

                } else if (auth()->user()->type == User::FARMER) {
                    return redirect()->route('dashboard')->with(["success" => "Login Successful"]);
                } else if (auth()->user()->type == User::CUSTOMER) {
                    return redirect()->route('dashboard')->with(["success" => "Login Successful"]);
                } else if (auth()->user()->type == User::EMPLOYEE) {
                    return redirect()->route('dashboard')->with(["success" => "Login Successful"]);
                } else {
                    Auth::logout();
                   return redirect()->back()->with(["error" => "These credentials do not match our records"]);
                }
            } else {
                return redirect()->back()->with(["error" => "These credentials do not match our records"]);
            }




    }
}
