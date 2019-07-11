@php
   $districts = DB::select('select id from districts');
   while($districts)
   foreach($districts as $district)
   echo $district->id;
     $agents = DB::select('select * from agents where id =?',[$district->id]);
     foreach($agents as $agent)
     echo $agent->fName;
     

   
@endphp