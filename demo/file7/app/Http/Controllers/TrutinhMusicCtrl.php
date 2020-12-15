<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use Redirect;
use Session;
use App\MusicMod;

class TrutinhMusicCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $input = MusicMod::where('type','Nhạc trữ tình')->paginate(15);
        return view('trutinh.index')->with('v_song',$input);
    }

     
    public function show($id)
    {
        $data = MusicMod::findOrFail($id);
        $song = MusicMod::where('type','Nhạc trữ tình')->paginate(15); 
        return view('trutinh.show')->with([
            'v_music' => $data,'v_track' => $song
        ]);
    }

}
