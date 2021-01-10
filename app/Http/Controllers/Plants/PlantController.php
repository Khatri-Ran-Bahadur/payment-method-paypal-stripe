<?php

namespace App\Http\Controllers\Plants;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plant;
use App\Http\Requests\PlantRequest;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plants=Plant::all();//its not query optimize current and datatbales
        return view('admin.plants.index',['plants'=>$plants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plants.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlantRequest $request)
    {
        $data=$request->except('_token');
        Plant::insert($data);
        return back()->with('message','This Plant is successfully Added ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plant=Plant::find($id);
        return view('admin.plants.form',['plant'=>$plant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlantRequest $request, $id)
    {
        $data=$request->except('_token','_method');
        Plant::where('id',$id)->update($data);
        return back()->with('message','This Plant is successfully Updated ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Plant::destroy($id);
        return back()->with('message','This Plant is successfully Deleted ');
    }
}
