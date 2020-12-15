<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtistMod extends Model
{
	// Xác định table
    protected $table= 'artist';
    // Xac dinh cac fiel trong table
    protected $fillable =['name','birthday','country'];
}
