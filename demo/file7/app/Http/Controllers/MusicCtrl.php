<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use Redirect;
use Session;
use App\MusicMod;

class MusicCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MusicMod::paginate(10); // Lay het du lieu
        return view('musics.index')->with('v_music',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = MusicMod::all(); // Lay het du lieu
        return view('musics.index')->with('v_music',$data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $files = Input::file('images');
        $file_count = count($files);
        $uploadcount = 0;
        if ($file_count>0) {
            foreach ($files as $file) {
               $rules = array('file' =>'required' );
               $validator =Validator::make(array('file' =>$file ), $rules);
               if ($validator->passes()) {
                   $destinaltionPath ='uploads';
                   $filename = $file->getClientOriginalName();
                   $upload_success = $file->move($destinaltionPath,$filename);
                   $uploadcount ++;

                   $extension = $file->getClientOriginalExtension();
                   $entry = new MusicMod(); // Coi Lai Dong Nay
                   $entry->mime=$file->getClientMimeType();
                   $entry->original_filename = $filename;
                   $entry->filename=$file->getFilename().'.'.$extension;
                   $entry->artist=$request->artist;
                   $entry->singer=$request->singer;
                   $entry->type=$request->type;
                   $entry->year=$request->year;
                   $entry->country=$request->country;
                   $entry->save();
               }
            }
            if ($uploadcount == $file_count) {
                Session::flash('success','Upload sucessfully ');
                return Redirect::to('musics');
            }
            else
            {
                return Redirect::to('musics')->withInput()->withErrors($validator);
            }
        }
        else{
             return redirect()->back()->with('no','Please choose file !');
        }
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
        $song = MusicMod::paginate(15); 
        return view('musics.show')->with([
            'v_music' => $data,'v_track' => $song
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $song = MusicMod::findOrFail($id);
        return view('musics.edit')->with('v_music',$song);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $song = MusicMod::findOrFail($id);
        $input = $request->all();
        $song->fill($input)->save();
        Session::flash('successs','Edit sucessfully ');
        return Redirect::to('musics');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MusicMod::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('delete_task_message','Delete sucessfully');
    }
}
