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


        $fName=$request->input('fName');
        $lName=$request->input('lName');
        $gender=$request->input('gender');
        $data=array('fName'=>$fName,'lName'=>$lName,'gender'=>$gender);
        DB::table('agents')->insert($data);
       return redirect()->route('agent.index')->withStatus('Agent registered successfully');

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

    public function recommender(){
        $x=0;
        $recommend = DB::connection('mysql')->select("SELECT
        member.fName,
        member.lName,
        count(enrollment.recommenderID) as total
        from
        member
        left join enrollment on member.memberID = enrollment.recommenderID
        group by member.memberID,member.fName,member.lName
        having count(enrollment.recommenderID)>0");

        return view('agent.recommend',compact('recommend','x'));
    }

    public function recommended()
    {
        if(isset($_POST['submit'])){//to run PHP script on submit
            if(!empty($_POST['recommended'])){
            // Loop to store and display values of individual checked checkbox.
            foreach($_POST['recommended'] as $selected){
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "politicalparty";

                $conn = mysqli_connect($servername,$username,$password,$dbname);

                if(!$conn){
                    die("Connection failed: " .mysqli_connect());
                }
                echo "Connected successfully";
                echo '<br>';
                }
                $sql='SELECT fName, lName, gender from member where memberID='.$selected;
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $fName=$row['fName'];
                $lName=$row['lName'];
                $gender=$row['gender'];

            }
    }

}
}
