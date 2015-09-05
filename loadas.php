<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php

//$q = intval($_GET['q']);
$deviceID = $_GET['divd'];
$loadID = $_GET['loadID'];

include('connection.inc.php');

$sqldeviceID=mysql_query("SELECT deviceID FROM meswag where deviceID = '".$deviceID."'");

if(mysql_num_rows($sqldeviceID)>=1){
	$sqlPayStatus=mysql_query("SELECT htmlRequest FROM meswag where deviceID = '".$deviceID."' AND savedID = '".$loadID."'");
	if(mysql_num_rows($sqlPayStatus)>=1){
		while ($result = mysql_fetch_array($sqlPayStatus, MYSQL_ASSOC)) {
			echo $result['htmlRequest'];
		}
	}
	else{
		echo "Error, cannot find saved record!";
	}
}
else{
	echo "Error, cannot find device";
	}
	

	
?>
</body>
</html>