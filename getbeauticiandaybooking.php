<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript">//alert("sdfsd");</script>
<body>
<?php
require_once("dbconfig.php");
	$query ="SELECT distinct BID FROM beautician_availability WHERE BID =".$_POST["branchid"];
	$results = $conn->query($query);
?>
	<option value="">Select Beautician</option>
<?php
	while($rs=$results->fetch_assoc()) {
		$query1="Select Name from beautician where BID=".$rs["BID"];
		$result1=$conn->query($query1);
		while($rs1=$result1->fetch_assoc())
		{
?>
	<option value="<?php echo $rs["BID"]; ?>"><?php echo "Mr/Mrs. ".$rs1["Name"]; ?></option>
<?php
		}
}
?>
</body>
</html>