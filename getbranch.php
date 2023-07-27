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
	$query ="SELECT * FROM branch WHERE Town = '" . $_POST["townid"] . "'";
	$results = $conn->query($query);
?>
	<option value="">Select Branch</option>
<?php
	while($rs=$results->fetch_assoc()) {
?>
	<option value="<?php echo $rs["branchid"]; ?>"><?php echo $rs["name"]."-".$rs["town"]."(BranchID-".$rs["branchid"].")"; ?></option>
<?php

}
?>
</body>
</html>