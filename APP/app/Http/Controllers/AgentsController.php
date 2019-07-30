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
<<<<<<< HEAD
    {  
    //     $this->validate($request,[
    //         'fName'=>'required',
    //        // 'lName'=>'required',
    //      //   'gender'=>'required',
    //    // ]);
$x=100000;
    $districts =DB::select('select * from districts');

     while($districts)
     {
=======
    {
        $this->validate($request,[
            'fName'=>'required',
           'lName'=>'required',
           'gender'=>'required',
       ]);
    $x =1000000;
    $districts =DB::select('select * from districts');

    while($districts)
    {
>>>>>>> 0dbb97b642c50f8d1aac5b254a3485af3a4366cb
        foreach($districts as $district){
        $assigns=DB::select('select * from agents where districtID =?',[$district->id]);
        if($assigns){
            //count number of districtID in agents table that match those in the districts table
           $runs=DB::table('agents')
           ->select(DB::raw('count(districtID) as count,districtID'))
           ->where('districtID','=',$district->id)
           ->groupBy('districtID')
           ->get();
                foreach($runs as $run){
<<<<<<< HEAD
                if($run->count<$x){
                    $x=$run->count;
                $dist =$district->id;   
                }
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
               break;
                }                                                          
    } 
                $m=count($districts);
                $heads = DB::select('select * from agents where agentHeadID is NULL and districtID= ?',[rand(1,$m)]);                  
                foreach($heads as $head)
                $fName=$request->input('fName');
                $lName=$request->input('lName');
                $gender=$request->input('gender');
                $dist =$head->districtID;
                $aghead = $head->id; 
                $data=array('fName'=>$fName,'lName'=>$lName,'gender'=>$gender,'districtID'=>$dist,'agentHeadID'=>$aghead);
                DB::table('agents')->insert($data);
                return redirect()->route('agent.index')->withStatus('Agent registered successfully');
                break;
                      
            }  
        } 
  
=======
                    $x=$run->count;
                    $dist =$district->id;
                    continue;
                                    }
                    }
                else{
                        //insert agenthead into agents and update number of agents in districts by 1
                        $fName=$request->input('fName');
                        $lName=$request->input('lName');
                        $gender=$request->input('gender');
                        $signature=$request->input('signature');
                        $dist =$district->id;
                        $data=array('fName'=>$fName,'lName'=>$lName,'gender'=>$gender,'districtID'=>$dist,'signature'=>$signature);
                        DB::table('agents')->insert($data);
                        DB::update('update districts set NumberOfAgents = ? where id = ?', [1,$district->id]);
                        return redirect()->route('agent.index')->withStatus('Agent registered successfully');
                    }
                                    }

                    //get id of district with least members and insert agents into table using that id
                    $min =DB::table('districts')->min('NumberOfAgents');
                    $sel =DB::select('select id from districts where NumberOfAgents = ?',[$min]);
                    foreach($sel as $se)
                        $heads = DB::select('select * from agents where agentHeadID is NULL and districtID= ?',[$se->id]);
                    foreach($heads as $head){
                        $fName=$request->input('fName');
                        $lName=$request->input('lName');
                        $gender=$request->input('gender');
                        $signature=$request->input('signature');
                        $dist =$se->id;
                        $aghead = $head->id;
                        $data=array('fName'=>$fName,'lName'=>$lName,'gender'=>$gender,'districtID'=>$dist,'agentHeadID'=>$aghead,'signature'=>$signature);
                        DB::table('agents')->insert($data);
                    }

                    //updates number of agents in districts table
                    $dist =DB::select('select * from districts');
                    foreach($dist as $dist){
                        $runs=DB::table('agents')
                        ->select(DB::raw('count(districtID) as count,districtID'))
                        ->where('districtID','=',$dist->id)
                        ->groupBy('districtID')
                        ->get();
                        foreach($runs as $ru){
                        DB::update('update districts set NumberOfAgents = ? where id = ?', [$ru->count,$dist->id]);
                         }
     }
                    return redirect()->route('agent.index')->withStatus('Agent registered successfully');
                    break;

    }
    }

>>>>>>> 0dbb97b642c50f8d1aac5b254a3485af3a4366cb
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
           'signature'=>'required',
           ]);
        $fName=$request->input('fName');
        $lName=$request->input('lName');
        $gender=$request->input('gender');
        $signature=$request->input('signature');
        DB::update('update agents set fName= ?,lName= ?,gender =?,signature=? WHERE id = ?', [$fName,$lName,$gender,$signature,$id]);
    
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

    public function recommender(){
        $recommend = DB::select('SELECT
        a.id,
        a.fName,
        a.lName,
        count(b.recomenderID) as total
        from
        members a
        left join members b on a.id = b.recomenderID
        group by a.id,a.fName,a.lName
        having count(b.recomenderID)>0');

        return view('agents.recommend',compact('recommend'));
        }

}
