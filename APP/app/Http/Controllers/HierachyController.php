<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Hierachy;

class HierachyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $show =DB::select('select * from agents');
       return view('hierachy.index')->with('show',$show);//->with('hierachy', $hierachy);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $search = DB::select('select * from districts where id = ?',[$id]);
        foreach($search as $search){
        $ban = $search->id;
        $aghead=DB::select('select * from agents where agentHeadID is NULL and districtID =?',[$ban]);
        $agents=DB::select('select * from agents where agentHeadID is NOT NULL and districtID =?',[$ban]);
        }
        return view('hierachy.show')->with('aghead',$aghead)->with('agents',$agents);
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


    public function search (Request $request)
    {
        $name = $request->input('search');
        $search = DB::select('select * from districts where districtName = ?',[$name]);
        foreach($search as $search){
        $ban = $search->id;
        $aghead=DB::select('select * from agents where agentHeadID is NULL and districtID =?',[$ban]);
        $agents=DB::select('select * from agents where agentHeadID is NOT NULL and districtID =?',[$ban]);
        }
        return view('hierachy.show')->with('aghead',$aghead)->with('agents',$agents);
    
        //
    }
  
    }
   
