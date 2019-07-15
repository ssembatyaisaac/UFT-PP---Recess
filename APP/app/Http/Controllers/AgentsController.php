<?php

namespace App\Http\Controllers;

use App\Agent;
//use App\Http\Requests\AgentRequest;
use Illuminate\Http\Request;
use DB;


class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Agent $model)
    {
        //
        $agents =DB::select('select * from agents');
        return view('agents.index')->with('agents',$agents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('agents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
    //     $this->validate($request,[
    //         'fName'=>'required',
    //        // 'lName'=>'required',
    //      //   'gender'=>'required',
    //    // ]);
    $x =1000000;
    $districts =DB::select('select * from districts');

    while($districts)
    {
        foreach($districts as $district){
        $assigns=DB::select('select * from agents where districtID =?',[$district->id]);
        if($assigns){
           $runs=DB::table('agents')
           ->select(DB::raw('count(districtID) as count,districtID'))
           ->where('districtID','=',$district->id)
           ->groupBy('districtID')
           ->get();
                foreach($runs as $run){
                $x=$run->count;
                $dist =$district->id;
                                continue;
                                    }
                    }
                    else{
                        $fName=$request->input('fName');
                        $lName=$request->input('lName');
                        $gender=$request->input('gender');
                        $dist =$district->id;
                        $data=array('fName'=>$fName,'lName'=>$lName,'gender'=>$gender,'districtID'=>$dist);
                        DB::table('agents')->insert($data);
                       return redirect()->route('agent.index')->withStatus('Agent registered successfully');
                    }
                                    }

                                    $heads = DB::select('select * from agents where agentHeadID is NULL and districtID =?',[$dist]);
                                    $fName=$request->input('fName');
                                    $lName=$request->input('lName');
                                    $gender=$request->input('gender');
                                    $dist =$district->id;
                                    foreach($heads as $head)
                                    $aghead = $head->id; 
                                    $data=array('fName'=>$fName,'lName'=>$lName,'gender'=>$gender,'districtID'=>$dist,'agentHeadID'=>$aghead);
                                    DB::table('agents')->insert($data);
                                    return redirect()->route('agent.index')->withStatus('Agent registered successfully');                             
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
        $agents = DB::select('select * from agents where id = ?', [$id]);
        return view('agents.edit')->with('agents',$agents);
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
             $this->validate($request,[
            'fName'=>'required',
           'lName'=>'required',
           'gender'=>'required',
           ]);
        $fName=$request->input('fName');
        $lName=$request->input('lName');
        $gender=$request->input('gender');
        DB::update('update agents set fName= ?,lName= ?,gender =? WHERE id = ?', [$fName,$lName,$gender,$id]);
    
        return redirect()->route('agent.index')->withStatus('Agent updated successfully');
        
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
