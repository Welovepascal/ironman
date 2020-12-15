<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArtistMod; // use Model (ArtistMod)
class ArtistCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ArtistMod::paginate(10); // Lay het du lieu
        return view('artists.index')->with('v_artist',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ArtistMod::all(); // Lay het du lieu
        return view('artists.insert')->with('v_artist',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Lay gia tri tu form
        $input = $request->all();
        // Luu tat ca cac input tu form vao database
        ArtistMod::create($input);
        // Hien thi lai Form - Bao thanh cong
        return redirect()->back()->with('insert_task_message','Insert sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ArtistMod::findOrFail($id);
        return view('artists.show')->with('v_artist',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artist = ArtistMod::findOrFail($id);
        return view('artists.edit')->with('v_artist',$artist);
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
        $artist = ArtistMod::findOrFail($id);
        $input = $request->all();
        $artist->fill($input)->save();
        return redirect()->back()->with('update_task_message','Update sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ArtistMod::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('delete_task_message','Delete sucessfully');
    }
}
