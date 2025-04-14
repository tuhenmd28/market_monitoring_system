<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'phone',
    //     'nid',
    //     'division_id',
    //     'district_id',
    //     'upazila_id',
    //     'union_id',
    //     'address',
    //     'password',
    // ];

    protected $table = 'farmer';
}
