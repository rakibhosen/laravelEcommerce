<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\District;

class Division extends Model
{
  public $fillable =[
    'name',
    'priority',
];
    public function district(){
      return $this->belongsTo(District::class);
    }

}
