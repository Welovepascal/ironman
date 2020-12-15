<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SongMod extends Model
{
    protected $fillable =['filename','mime','original_filename'];
    protected $table='song';
}
