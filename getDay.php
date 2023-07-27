<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript">//alert("sdfsd");</script>
<body>
<?php
	$string = $_POST["date"];
	$timestamp = strtotime($string);
	$compareday = date("l", $timestamp);
	$flag=0;
	if($_POST["bidval"]==""||$_POST["branchidval"]=="")
		echo "SELECT BranchID AND BID PROPERLY!!!";
	else
	{
	require_once("dbconfig.php");
	$query ="SELECT * FROM beautician_availability WHERE BID = '" . $_POST["bidval"] . "' AND BranchID='".$_POST["branchidval"]."'";
	$results = $conn->query($query);
	while($rs=$results->fetch_assoc())
		{
		   if($rs["day"]==$compareday)
		   {
			   $flag++;
			   echo "Beautician Available on ".$compareday;
			   break;
		   }
		}
		if($flag==0)
			echo "Beautician Unavailable on ".$compareday;
	}
?>
	
</body>
</html>