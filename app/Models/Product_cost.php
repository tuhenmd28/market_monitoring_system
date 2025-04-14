<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_cost extends Model
{
    use HasFactory;
    protected $table = "production_cost";
    // protected $fillable = [
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function farmer(){
        return $this->belongsTo(Farmer::class);
    }
}
