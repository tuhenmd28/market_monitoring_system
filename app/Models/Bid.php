<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;
    protected $table = 'bid';
    protected $fillable = ['product_id', 'user_id', 'bid_price', 'bid_time', 'status'];
    public function product()
    {
        return $this->belongsTo(Product::class, 'item_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function images()
    {
        return $this->hasMany(ItemImage::class, 'item_id', 'id');
    }
    public function bits()
    {
        return $this->hasMany(ItemImage::class, 'item_id', 'id');
    }
    public function getBidTimeAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
