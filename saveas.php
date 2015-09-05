<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php

//$q = intval($_GET['q']);
$deviceID = $_GET['divd'];
$savedID = $_GET['savedID'];
$htmlRequest = $_GET['htmlRequest'];

include('connection.inc.php');


$sqldeviceID=mysql_query("SELECT deviceID FROM meswag where deviceID = '".$deviceID."'");

if(mysql_num_rows($sqldeviceID)>=1){
	$sqlPayStatus=mysql_query("SELECT savedID FROM meswag where deviceID = '".$deviceID."' AND savedID = '".$savedID."'");
	if(mysql_num_rows($sqlPayStatus)>=1){
		mysql_query("UPDATE meswag set htmlRequest = '".$htmlRequest."' where savedID = '".$savedID."'");
	}
	else{
		mysql_query("INSERT INTO meswag (deviceID, savedID, htmlRequest) VALUES ('".$deviceID."', '".$savedID."', '".$htmlRequest."')");
	}
}
	else{
		mysql_query("INSERT INTO meswag (deviceID, savedID, htmlRequest) VALUES ('".$deviceID."', '".$savedID."', '".$htmlRequest."')");
	}
	
	echo "";
	echo $htmlRequest;
	
?>
</body>
</html>