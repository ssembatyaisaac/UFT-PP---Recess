<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class MyModel extends Model
{
    public function read(){
        return DB::connection('mysql')->select("SELECT
        member.fName,
        member.lName,
        count(enrollment.recommenderID) as total
        from
        member
        left join enrollment on member.memberID = enrollment.recommenderID
        group by member.memberID,member.fName,member.lName
        having count(enrollment.recommenderID)>0"
        );
    }

    public function highestdistrict(){
        DB::connection('mysql')->select('SELECT
        districtID, districtName, max(Enrollments) FROM
        (SELECT me.districtID, me.districtName, COUNT(us.agentID) as Enrollments FROM
        (select district.districtID, district.districtName, agent.agentID, agent.agentHeadID
        from district LEFT JOIN agent ON district.districtID=agent.districtID
        GROUP BY district.districtID, agent.agentID) as me
        INNER JOIN
        (SELECT * from enrollment WHERE month(dateOfEnrollment)=month(current_date())
        && year(dateOfEnrollment)=year(current_date())) as us
        on me.agentID=us.agentID GROUP BY me.districtID) as us');
        //$high_district=$row->districtID;
        return $high_district=3;
    }

    public function highagent(){
        return DB::connection('mysql')->select("SELECT count(me.agentID) as num from (select * from agent where
        districtID = ".$high_district." && agentHeadID is not null) as me");
    }

    public function highagenthead(){
        return DB::connection('mysql')->select("SELECT count(me.agentID) as num from (select * from agent where
        districtID = ".$high_district." && agentHeadID is null) as me");

    }

    public function agenthead(){
        return DB::connection('mysql')->select("SELECT count(me.agentID) as num from (select * from agent where
        agentHeadID is null) as me");
    }

    public function agent(){
        return DB::connection('mysql')->select("SELECT count(me.agentID) as num from (select * from agent where
        agentHeadID is not null) as me");
    }
}
