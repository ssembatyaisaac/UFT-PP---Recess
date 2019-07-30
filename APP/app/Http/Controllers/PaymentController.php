<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funds=DB::select('select * from donors');
        return view('payments.index')->with('funds',$funds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payments.fund');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $fName=$request->input('fName');
            $lName=$request->input('lName');
            $gender=$request->input('gender');
            $amount =$request->input('amountPaid');
            $date=$request->input('dateOfPayment');
            $data=array('fName'=>$fName, 'lName'=>$lName,'gender'=>$gender,'amountPaid'=>$amount,'dateOfPayment'=>$date);
            DB::table('donors')->insert($data);
            return redirect()->route('pay.index')->withStatus('Thank you for your support');

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
        $funds = DB::select('select * from districts where id = ?', [$id]);
        return view('payments.edit')->with('funds',$funds);
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
            'donorName'=>'required',
           ]);
        $donorName=$request->input('donorName');
        DB::update('UPDATE donors set donorName= ? WHERE id = ?', [$donorName,$id]);

        return redirect()->route('pay.index')->withStatus('District updated successfully');
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

    public function amount()
    {
        $amount = DB::select('SELECT sum(amountPaid) as amount
        from donors where
        month(dateOfPayment)=month(current_date()) &&
        year(dateOfPayment)=year(current_date())');

        foreach ($amount as $sum) {
            $totalamount=$sum->amount;
        }

        if ($totalamount<2000) {
            return'NO payments to be made';
        } else {
            $payment=$totalamount-200000;
            $high = DB::select('SELECT * from (SELECT me.districtid, me.districtName, COUNT(us.agentID) as Enrollments FROM
            (select districts.id as districtid, districts.districtName,
            agents.id as agentid, agents.agentHeadID
            from districts LEFT JOIN agents ON districts.id=agents.districtID
            GROUP BY districts.id, districts.districtName, agents.agentHeadID, agents.id) as me
            INNER JOIN
            (SELECT * from members WHERE month(dateOfEnrollment)=month(current_date())
            && year(dateOfEnrollment)=year(current_date())) as us
            on me.agentid=us.agentID GROUP BY me.districtid, me.districtName) as ok
            where Enrollments=(SELECT max(Enrollments) FROM
            (SELECT me.districtid, me.districtName, COUNT(us.agentID) as Enrollments FROM
            (select districts.id as districtid, districts.districtName,
            agents.id as agentid, agents.agentHeadID
            from districts LEFT JOIN agents ON districts.id=agents.districtID
            GROUP BY districts.id, districts.districtName, agents.agentHeadID, agents.id) as me
            INNER JOIN
            (SELECT * from members WHERE month(dateOfEnrollment)=month(current_date())
            && year(dateOfEnrollment)=year(current_date())) as us
            on me.agentid=us.agentID GROUP BY me.districtid, me.districtName) as ok)');

            foreach ($high as $row) {
                $highid=$row->districtid;
                #return view('payments.try',compact('highid'));
            }

            $sql=DB::select('SELECT count(me.id) as num from (select * from agents where
            districtID = '.$highid.' && agentHeadID is not null) as me');
            foreach ($sql as $row) {
                $hag=$row->num;
            }
                #return view('payments.try',compact('hag'));


            $sql=DB::select('SELECT count(me.id) as num from (select * from agents where
            agentHeadID is not null) as me');
            foreach ($sql as $row) {
                $ag=$row->num;
            }
                #return view('payments.try',compact('ag'));

            $sql=DB::select('SELECT count(me.id) as num from (select * from agents where
            agentHeadID is null) as me');
            foreach ($sql as $row) {
                $agh=$row->num;
            }

            $k=(1.75*($agh+1)+($ag+$hag)+0.5);
            $agent=$payment/$k;
            $agenthead=1.75*$agent;
            $admin=0.5*$agent;
            $highagent=2*$agent;
            $highagenthead=2.5*$agent;

            $date=date('Y-m-d');

            $sqlm=DB::select('SELECT id from agents where districtID='.$highid.'
            && agentHeadID is not null');

            foreach ($sqlm as $row) {
                $hag=$row->id;
                $data=array('agentID'=>$hag,'amount'=>$highagent,'month'=>$date);
                DB::table('payments')->insert($data);
            }

            $sqlm=DB::select('SELECT id from agents where districtID='.$highid.'
            && agentHeadID is null');
            foreach ($sqlm as $row) {
                $hag=$row->id;
                $data=array('agentID'=>$hag,'amount'=>$highagenthead,'month'=>$date);
                DB::table('payments')->insert($data);
            }

            $sqlm=DB::select('SELECT id from agents where districtID!='.$highid.'
            && agentHeadID is null');
            foreach ($sqlm as $row) {
                $hag=$row->id;
                $data=array('agentID'=>$hag,'amount'=>$agenthead,'month'=>$date);
                DB::table('payments')->insert($data);
            }

            $sqlm=DB::select('SELECT id from agents where districtID!='.$highid.'
            && agentHeadID is not null');
            foreach ($sqlm as $row) {
                $hag=$row->id;
                $data=array('agentID'=>$hag,'amount'=>$agent,'month'=>$date);
                DB::table('payments')->insert($data);
            }

            $sqlm=DB::select('SELECT id from admins');
            foreach ($sqlm as $row) {
                $hag=$row->id;
                $data=array('adminID'=>$hag,'amount'=>$admin,'month'=>$date);
                DB::table('payments')->insert($data);
            }

        }
    }
}
