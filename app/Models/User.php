<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Union;
use App\Models\Farmer;
use App\Models\Upazila;
use App\Models\District;
use App\Models\Division;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    const SUPPERADMIN = 1;
    const ADMIN = 2;
    const FARMER = 3;
    const CUSTOMER = 4;
    const EMPLOYEE = 5;

    const types = [
        self::SUPPERADMIN => 'Supper Admin',
        self::ADMIN => 'Admin',
        self::FARMER => 'Farmer',
        self::CUSTOMER => 'Customer',
        self::EMPLOYEE => 'Employee',
    ];


    public function division(){
        return $this->belongsTo(Division::class,'division_id','id');
    }
    public function district(){
        return $this->belongsTo(District::class,'district_id','id');
    }
    public function upazila(){
        return $this->belongsTo(Upazila::class,'upazila_id','id');
    }
    public function union(){
        return $this->belongsTo(Union::class,'union_id','id');
    }
    public function farmer1(){
        return $this->hasOne(Farmer::class,'user_id','id');
    }
}
