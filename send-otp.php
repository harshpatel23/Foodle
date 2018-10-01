<?php 
	session_start();
    $OTP=rand(100000,999999);
	$mobile = $_POST["contact"];
	$message="Welcome to Foodle.\n".$OTP." is your OTP to signup.";
	$json = json_decode(file_get_contents("https://smsapi.engineeringtgr.com/send/?Mobile=9930157621&Password=Foodle123&Message=".urlencode($message)."&To=".urlencode($mobile)."&Key=foodlsxK2qeznrW8DNELIvZo1B5F") ,true);
	if ($json["status"]=="success") {
        $_SESSION['otp'] = $OTP;
        $_SESSION['contact'] = $mobile;
		header('Location: contact.php');
	}else{
		echo $json["msg"];
        echo "\nOTP Not sent. Try Later.";
		//your code when not send
}
?>