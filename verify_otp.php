<?php
	session_start();

if($_POST['otp'] == $_SESSION['otp']){
            header('Location: signup.php');
        }
        else{
            $_SESSION['otp-error'] = True;
            header('Location:contact.php');
        }
?>