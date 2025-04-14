<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category_id', 'product_type_id', 'price', 'image'];
    protected $table = 'item';
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function images()
    {
        return $this->hasMany(ItemImage::class, 'item_id','id');
    }
    public function bids()
    {
        return $this->hasMany(Bid::class, 'item_id','id');
    }

}
