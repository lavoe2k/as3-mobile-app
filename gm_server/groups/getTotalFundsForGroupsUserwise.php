<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
require_once '../dbconfig.php';
include_once 'class.group.php';

if (isset($_POST['totalFunds']))
{	
	$uname = trim($_POST['uname']);
	$upass = trim($_POST['upass']);
	$umail = trim($_POST['umail']);
	$skip = trim($_POST['skip']);
	$max = trim($_POST['max']);

	if($user->login($uname,$umail,$upass))
	{
		$group = new GROUP($DB_con);

		$getTotalFundsForGroupsUserwise = $group->getTotalFundsForGroupsUserwise($skip, $max);
		
		echo json_encode($getTotalFundsForGroupsUserwise);
	}
	else
	{
		$error[] = "Wrong Details!";
	}	
}

if(isset($error))
{
	$response["ERROR"] = $error;
	echo json_encode($response);
}


?>