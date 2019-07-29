<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Routing\Route;

class recommendcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        foreach($_POST['recommended'] as $selected){
            $sql=DB::select('SELECT fName, lName, gender from members where id='.$selected);
            foreach ($sql as $row) {
                $fName=$row->fName;
                $lName=$row->lName;
                $gender=$row->gender;

                $x=100000;
                $districts =DB::select('select * from districts');

            while($districts){
                foreach($districts as $district){
                $assigns=DB::select('select * from agents where districtID =?',[$district->id]);
                if($assigns){
                    $runs=DB::table('agents')
                    ->select(DB::raw('count(districtID) as count,districtID'))
                    ->where('districtID','=',$district->id)
                    ->groupBy('districtID')
                    ->get();
                            foreach($runs as $run){
                            if($run->count<$x){
                                $x=$run->count;
                            $dist =$district->id;
                            }
                            continue;
                        }
                }
                else{
                    $dist =$district->id;
                    $data=array('fName'=>$fName,'lName'=>$lName,'gender'=>$gender,'districtID'=>$dist);
                    DB::table('agents')->insert($data);
                    DB::update('UPDATE members SET recomenderID=NULL WHERE recomenderID ='.$selected);
                    DB::delete('DELETE from members where id ='.$selected);
                    return redirect()->route('agent.index')->withStatus('Agent registered successfully');
                break;
                    }
                }
                        $m=count($districts);
                        $heads = DB::select('select * from agents where agentHeadID is NULL and districtID= ?',[rand(1,$m)]);
                        foreach($heads as $head)
                        $dist =$head->districtID;
                        $aghead = $head->id;
                        $data=array('fName'=>$fName,'lName'=>$lName,'gender'=>$gender,'districtID'=>$dist,'agentHeadID'=>$aghead);
                        DB::table('agents')->insert($data);
                        DB::update('UPDATE members SET recomenderID=NULL WHERE recomenderID ='.$selected);
                        DB::delete('DELETE from members where id ='.$selected);
                        return redirect()->route('agent.index')->withStatus('Agent registered successfully');
                        break;

                    }

            }
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

    }
}
