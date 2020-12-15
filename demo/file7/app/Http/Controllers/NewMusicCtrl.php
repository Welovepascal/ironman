<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use Redirect;
use Session;
use App\MusicMod;

class NewMusicCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $input = MusicMod::orderBy('id','desc')->paginate(20);
       return view('songnew.index')->with('v_song',$input);
    }

    public function show($id)
    {
        $data = MusicMod::findOrFail($id);
        $input = MusicMod::orderBy('id','desc')->paginate(20); 
        return view('songnew.show')->with([
            'v_music' => $data,'v_track' => $input
        ]);
    }

}
