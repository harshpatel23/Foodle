<?php
session_start();
session_destroy();//session_unset();
session_start();
header('Location: index.php');
?>