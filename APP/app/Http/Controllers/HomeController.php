<?php

namespace App\Http\Controllers;
use DB;
use App\donors;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $funds = DB::select('select amountPaid, MONTH(dateOfPayment) as month from donors');
        return view('DashBoard.dashboard')->with('funds', $funds);
    }


    public function funds1()
    {
        $funds = DB::select('select amountPaid, MONTH(dateOfPayment) as month from donors');
        return view('DashBoard.home1')->with('funds', $funds);
    }

    public function enrollment()
    {
        $enrollment = DB::select('select  MONTH(dateOfEnrollment) as month from members');
        return view('DashBoard.home2')->with('enrollment', $enrollment);
    }

    public function wellwishers(){

        return view('DashBoard.home3');
    }

    public function store(Request $request){
        $this->validate($request,[
            'month'=>'required',
             ]);

        $month =$request->input('month');

        $donors = DB::select('select donorName, amountPaid, MONTH(dateOfPayment) as month from funds where MONTH(dateOfPayment) = ?', [$month]);
        return view('DashBoard.home3')->with('donors', $donors);
    }

}
