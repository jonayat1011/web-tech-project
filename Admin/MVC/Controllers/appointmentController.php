<?php
require_once('../Models/alldb.php');
session_start();

function appointmentsList(){
	return appointmentsListdb();
}
?>