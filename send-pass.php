<?php 
	session_start();
    include 'templates/db-con.php';
    $user_id = $_POST['username'];
    $contact = $_POST['contact'];
    $sql = "SELECT pwd from person where user_id = '$user_id' and contact = '$contact';";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        die("QUERY FAILED ".mysqli_error($conn));
    }
     if(mysqli_num_rows($result) != 0){
        $row = mysqli_fetch_assoc($result);
        $pass = $row['pwd'];
    }
    else{
        echo "Invalid Data. Please Provide valid data.";
        header("refresh:1; url=forgot_pass.php");
    }
    if(mysqli_num_rows($result) != 0){
    $message="Your Password to login to Foodle is '".$pass."'";
	$json = json_decode(file_get_contents("https://smsapi.engineeringtgr.com/send/?Mobile=9930157621&Password=Foodle123&Message=".urlencode($message)."&To=".urlencode($contact)."&Key=foodlsxK2qeznrW8DNELIvZo1B5F") ,true);
	if ($json["status"]=="success") {
        header("refresh:0 ; url=login.php");
    }else{
		$json = json_decode(file_get_contents("https://smsapi.engineeringtgr.com/send/?Mobile=8668463938&Password=Foodle123&Message=".urlencode($message)."&To=".urlencode($contact)."&Key=harshc1Vaz8kfiOrFdpNwhJ") ,true);
	if ($json["status"]=="success") {
		header("refresh:0 ; url=login.php");
	}else{
		$json = json_decode(file_get_contents("https://smsapi.engineeringtgr.com/send/?Mobile=8412941419&Password=Foodle123&Message=".urlencode($message)."&To=".urlencode($contact)."&Key=harshu0h7RFIHTbrCUpjw") ,true);
	if ($json["status"]=="success") {
		header("refresh:0; url=login.php");
	}else{
        echo "OTP not sent. Try later.";
    }
    }

}
}
?>