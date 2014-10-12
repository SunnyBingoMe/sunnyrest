<?php 
$_SESSION['sharedPrivateKey'] = (int)(md5("998xinmade", true));


function userIsAdmin($userId){
	if(!isset($userId) || is_null($userId)){
		$userId = $_SESSION['userId'];
	}
	if ($userId == 1 || $userId == 18){
		return true;
	}else{
		return false;
	}
}

