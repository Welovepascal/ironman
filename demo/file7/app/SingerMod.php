<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SingerMod extends Model
{
    // Xác định table
    protected $table= 'singer';
    // Xac dinh cac fiel trong table
    protected $fillable =['name','birthday','height','weight','type','country','hoppy'];
}
