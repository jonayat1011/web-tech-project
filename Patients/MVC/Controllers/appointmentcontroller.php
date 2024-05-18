<?php 

require_once('..\Models\alldb.php');
function doctorname(){

	$res=doctornamefromdb();

	 return  $res;
}

function addDoctorAppointmentToDatabase($doctorName, $doctorSpecialty, $DoctorDate, $doctorTime){

	$res=AddAppointment($doctorName, $doctorSpecialty, $DoctorDate, $doctorTime);
     if(!$res){


return  false;
}else{
return  true;

 }

}



 ?>