<?php 
	session_start();
    include 'templates/db-con.php';
    $user_id = $_SESSION['uname'];
    $sql = "SELECT contact from person where user_id = '$user_id';";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        die("QUERY FAILED ".mysqli_error($conn));
    }
     if(mysqli_num_rows($result) != 0){
        $row = mysqli_fetch_assoc($result);
        $mobile = $row['contact'];
    }
    $resv_id = $_GET['resv_id'];
    $message="Voila! You have made a reservation through Foodle. Your Reservation ID is ".$resv_id.". Show this SMS at reception to avoid confusions.";
	$json = json_decode(file_get_contents("https://smsapi.engineeringtgr.com/send/?Mobile=9930157621&Password=Foodle123&Message=".urlencode($message)."&To=".urlencode($mobile)."&Key=foodlsxK2qeznrW8DNELIvZo1B5F") ,true);
	if ($json["status"]=="success") {
        echo "Reservation Successfull. You will soon get confirmation SMS containing your Reservation ID on your Mobile";
        header("refresh:2 ; url=my_reservations.php");
    }else{
		$json = json_decode(file_get_contents("https://smsapi.engineeringtgr.com/send/?Mobile=8668463938&Password=Foodle123&Message=".urlencode($message)."&To=".urlencode($mobile)."&Key=harshc1Vaz8kfiOrFdpNwhJ") ,true);
	if ($json["status"]=="success") {
        echo "Reservation Successfull. You will soon get confirmation SMS containing your Reservation ID on your Mobile";
		header("refresh:2 ; url=my_reservations.php");
	}else{
		$json = json_decode(file_get_contents("https://smsapi.engineeringtgr.com/send/?Mobile=8412941419&Password=Foodle123&Message=".urlencode($message)."&To=".urlencode($mobile)."&Key=harshu0h7RFIHTbrCUpjw") ,true);
	if ($json["status"]=="success") {
        echo "Reservation Successfull. You will soon get confirmation SMS containing your Reservation ID on your Mobile";
		header("refresh:0; url=my_reservations.php");
	}else{
        echo "OTP not sent. Try later.";
    }

}
}
?>