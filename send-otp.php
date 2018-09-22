<?php 
	session_start();
	$mobile = $_POST["contact"];
	$message="1234";
	$json = json_decode(file_get_contents("https://smsapi.engineeringtgr.com/send/?Mobile=9930157621&Password=Foodle123&Message=".urlencode($message)."&To=".urlencode($mobile)."&Key=foodlsxK2qeznrW8DNELIvZo1B5F") ,true);
	if ($json["status"]==="success") {
		$_SESSION['otp']='1234';
		echo $_SESSION['otp'];
		echo $json["msg"];
		header('Location: contact.php');
	}else{
		echo $json["msg"];
		//your code when not send
}
?>