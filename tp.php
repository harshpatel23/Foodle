<?php echo date("Y-m-d H:i:s")."<br>";
$time = '2018-10-16 02:00:00';
echo $time.'<br>';
if ($time > date("Y-m-d H:i:s"))
	echo "yes";
else
	echo "no";
 ?>