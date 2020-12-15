<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MusicMod extends Model
{
    protected $table= 'songtbl';
    // Xac dinh cac fiel trong table
    protected $fillable =['filename','mime','original_filename','artist','singer','type','year','country'];

    public static function getByCountry($conutry)
    {
        return DB::table('songtbl')->where('conutry','=','$conutry');
    }
}
