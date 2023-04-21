<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

  protected $fillable = ['product_name', 'product_price', 'category_id', 'product_description', 'product_status'];

  public function category() {
    return $this->belongsTo(Category::class);
  }

  public function product_images() {
    return $this->hasMany(ProductImages::class);
  }
}