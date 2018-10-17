<?php 
	session_start();
    include 'templates/db-con.php';
    $resv_id = $_GET['resv_id'];
    $rest_id = $_GET['rest_id'];

    $sql0 = "SELECT rest_name from rest where rest_id = '$rest_id';";
            $result0 = mysqli_query($conn, $sql0);
            if(!$result0){
                die("QUERY FAILED ".mysqli_error($conn));
            }
            if(mysqli_num_rows($result0) != 0){
                $row0 = mysqli_fetch_assoc($result0);
                $rest_name = $row1['rest_name'];
            }

    $sql = "SELECT user_id from resrvations where resv_id = '$resv_id';";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        die("QUERY FAILED ".mysqli_error($conn));
    }
     if(mysqli_num_rows($result) != 0){
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['user_id'];
            $sql1 = "SELECT contact from person where user_id = '$user_id';";
            $result1 = mysqli_query($conn, $sql1);
            if(!$result1){
                die("QUERY FAILED ".mysqli_error($conn));
            }
            if(mysqli_num_rows($result1) != 0){
                $row1 = mysqli_fetch_assoc($result1);
                $contact = $row1['contact'];
            }
    }
    else{
        echo "SMS not Sent";
        header("refresh:1; url=manager_view.php");
    }
    if(mysqli_num_rows($result1) != 0){
    $message="Due to some unavoidable circumstances, your reservation in '".$rest_name."' with Reservation id '".resv_id"' has been cancelled.Sorry for the inconvenience caused";
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