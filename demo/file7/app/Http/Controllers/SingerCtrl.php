<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SingerMod;

class SingerCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SingerMod::paginate(10); // Lay het du lieu
        return view('singers.index')->with('v_singer',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = SingerMod::all(); // Lay het du lieu
        return view('singers.insert')->with('v_singer',$data);
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
        SingerMod::create($input);
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
        $data = SingerMod::findOrFail($id);
        return view('singers.show')->with('v_singer',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $singer = SingerMod::findOrFail($id);
        return view('singers.edit')->with('v_singer',$singer);
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
        $singer = SingerMod::findOrFail($id);
        $input = $request->all();
        $singer->fill($input)->save();
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
        $data = SingerMod::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('delete_task_message','Delete sucessfully');
    }
}
