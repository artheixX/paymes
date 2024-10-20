<?php 
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	require "vendor/autoload.php";
	use Paymes\Payment;

	$paymentObject = new Payment();
	$do = $paymentObject->createOrder("A15335");
	echo  $do;
	


?>