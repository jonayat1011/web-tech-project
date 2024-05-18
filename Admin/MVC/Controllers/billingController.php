<?php
require_once('../Models/alldb.php');
session_start();

function billingList(){
	return billingListdb();
}
?>