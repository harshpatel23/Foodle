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
		$json = json_decode(file_get_contents("https://smsapi.engineeringtgr.com/send/?Mobile=8668463938&Password=Foodle123&Message=".urlencode($message)."&To=".urlencode($mobile)."&Key=harshc1Vaz8kfiOrFdpNwhJ") ,true);
	if ($json["status"]=="success") {
        $_SESSION['otp'] = $OTP;
        $_SESSION['contact'] = $mobile;
		header('Location: contact.php');
	}else{
		$json = json_decode(file_get_contents("https://smsapi.engineeringtgr.com/send/?Mobile=8412941419&Password=Foodle123&Message=".urlencode($message)."&To=".urlencode($mobile)."&Key=harshu0h7RFIHTbrCUpjw") ,true);
	if ($json["status"]=="success") {
        $_SESSION['otp'] = $OTP;
        $_SESSION['contact'] = $mobile;
		header('Location: contact.php');
	}else{
        echo "OTP not sent. Try later.";
    }
}
}
?>