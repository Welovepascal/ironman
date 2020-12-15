<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use Redirect;
use Session;
use App\MusicMod;

class VnMusicCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $input = MusicMod::where('country','Việt Nam')->paginate(15);
        return view('songvn.index')->with('v_song',$input);
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
        $song = MusicMod::where('country','Việt Nam')->paginate(15); 
        return view('songvn.show')->with([
            'v_music' => $data,'v_track' => $song
        ]);
    }
}
