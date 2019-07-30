<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class DistrictsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
      $districts =DB::select('select * from districts');
      return view('districts.index')->with('districts',$districts);
    }
=======
      $districts =DB::select('select * from districts');  
      return view('districts.index')->with('districts',$districts);
     
     }
>>>>>>> 0dbb97b642c50f8d1aac5b254a3485af3a4366cb

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('districts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $districtName=$request->input('districtName');
        
        $data=array('districtName'=>$districtName);
        DB::table('districts')->insert($data);
       return redirect()->route('district.index')->withStatus('District registered successfully');
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
        //
        $districts = DB::select('select * from districts where id = ?', [$id]);
        return view('districts.edit')->with('districts',$districts);
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
        //
        $this->validate($request,[
            'districtName'=>'required',
           ]);
        $districtName=$request->input('districtName');
        DB::update('update districts set districtName= ? WHERE id = ?', [$districtName,$id]);
        return redirect()->route('district.index')->withStatus('District updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
