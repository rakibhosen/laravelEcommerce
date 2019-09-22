<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
public function imgs()
  {
  
    return $this->hasMany(Product_img::class);
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function brand()
  {
    return $this->belongsTo(Brand::class);
  }
}
