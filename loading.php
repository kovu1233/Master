<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php

//$q = intval($_GET['q']);
$deviceID = $_GET['divd'];

include('connection.inc.php');


$sqldeviceID=mysql_query("SELECT deviceID FROM meswag where deviceID = '".$deviceID."'");

if(mysql_num_rows($sqldeviceID)>=1){
	$sqlPayStatus=mysql_query("SELECT savedID FROM meswag where deviceID = '".$deviceID."'");
	if(mysql_num_rows($sqlPayStatus)>=1){
		while ($result = mysql_fetch_array($sqlPayStatus, MYSQL_ASSOC)) {
			echo "<div class='Btnz' style='margin-bottom:2%;' onClick='loadingit(this.innerHTML);'>".$result["savedID"]."</div>";
		}
			echo "<div class='Btnz1' style='margin-bottom:2%;' onClick='loadingit(this.innerHTML);'>CLOSE</div>";
		mysql_free_result($sqlPayStatus);
	}
	else{
	}
}
	echo "";
	//echo $htmlRequest;
	
?>
</body>
</html>