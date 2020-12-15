<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use Redirect;
use Session;
use App\MusicMod;

class UkMusicCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $input = MusicMod::where('country','UK')->paginate(15);
        return view('songuk.index')->with('v_song',$input);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = MusicMod::findOrFail($id);
        $song = MusicMod::where('country','UK')->paginate(15); 
        return view('songuk.show')->with([
            'v_music' => $data,'v_track' => $song
        ]);
    }
}
