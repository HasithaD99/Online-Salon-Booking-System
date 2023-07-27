<html>
<head>
<link rel="stylesheet" href="main.css">
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
</head><?php include "dbconfig.php"; ?>
<script>
function getTown(val) {
	$.ajax({
	type: "POST",
	url: "get_town.php",
	data:'countryid='+val,
	success: function(data){
		$("#town-list").html(data);
	}
	});
}
function getBranch(val) {
	$.ajax({
	type: "POST",
	url: "getbranch.php",
	data:'townid='+val,
	success: function(data){
		$("#branch-list").html(data);
	}
	});
}
function getBeauticianday(val) {
	$.ajax({
	type: "POST",
	url: "getbeauticiandaybooking.php",
	data:'cid='+val,
	success: function(data){
		$("#beautician-list").html(data);
	}
	});
}
</script>
<body style="background-image:url(images/yellowpage.jpg)">
	<div class="header">
		<ul>
			<li style="float:left;border-right:none"><a href="index.php" class="logo"><img src="images/Style_lovers.png" width="40px" height="40px"><strong> STYLELOVERS </strong><u>Salon</u> </a></li>
			<li><a href="index.php">Home</a></li>
		</ul>
	</div>
	<form action="locateus.php" method="post">
	<div class="sucontainer" style="background-image:url(images/yellowpage.jpg)">
		<ul style="background-image:url(images/yellowpage.jpg)">			
			<label><b>Search Beautician</b></label>
			<input type="text" name="beauticianname" placeholder="Enter Beautician Name"></input>
			<button type="submit" style="position:center" name="subd" value="Submit">Submit</button>
		</ul>
		<label style="font-size:20px" >City:</label><br>
		<select name="city" id="city-list" class="demoInputBox"  onChange="getTown(this.value);" style="width:100%;height:35px;border-radius:9px">
		<option value="">Select City</option>
		<?php
		$sql1="SELECT distinct(city) FROM branch";
         $results=$conn->query($sql1); 
		while($rs=$results->fetch_assoc()) { 
		?>
		<option value="<?php echo $rs["city"]; ?>"><?php echo $rs["city"]; ?></option>
		<?php
		}
		?>
		</select>
        <br>
	
		<label style="font-size:20px" >Town:</label><br>
		<select id="town-list" name="Town" onChange="getBranch(this.value);" style="width:100%;height:35px;border-radius:9px">
		<option value="">Select Town</option>
		</select><br>
		
		<label style="font-size:20px" >Branch:</label><br>
		<select id="branch-list" name="Branch" onChange="getBeauticianday(this.value);" style="width:100%;height:35px;border-radius:9px">
		<option value="">Select Branch</option>
		</select><br>
		<div class="container">
			<button type="submit" style="position:center" name="submit" value="Submit">Submit</button>
		</div>
<?php
session_start();
if(isset($_POST['subd']))
{
		include 'dbconfig.php';
		if(!empty($_POST['beauticianname']))
		{
			$beautician=$_POST['beauticianname'];
			$sql1 = "Select * from Beautician where UPPER(name) like UPPER('%".$beautician."%')";
			$result1=mysqli_query($conn, $sql1);  
			while($row1 = mysqli_fetch_array($result1))
			{
			echo "<hr>";
			echo "<label><b><br>".$row1['name']."<br><b>Gender:<b>".$row1['gender']."<br><b>Specialization:<b>".$row1['specialization']."<br></b>"."</label>";
			$sql2="select * from beautician_availability where bid=".$row1["bid"];
			//$sql2 = "Select name,address,contact from branch where branchid in (select branchid from beautician_availability where did in(Select did from beautician where bid=".$row1['bid']."));";
			$result2=mysqli_query($conn, $sql2);  
			while($row2 = mysqli_fetch_array($result2))
			{
			//echo "<b>Branch Name:".$row2['name']."</b><br><b>Address:<b>".$row2['address']."<br><b>Contact:<b>".$row2['contact'];
			echo "<label><br><b>Day:".$row2["day"]."</b><br><b>Timings:<b>".$row2["starttime"]." to ".$row2["endtime"]."</label>";
			$sql3="Select * from branch where branchid = ".$row2["branchid"];
			$result3 = mysqli_query($conn , $sql3);
			while($row3 = mysqli_fetch_array($result3))
			{
				echo"<label><br><b>Branch Name:".$row3["name"]." Town:".$row3["town"]." City:".$row3["city"]."</label>";
			}
			
			}
			}
		}
		else
		{
				echo"Enter a valid name.";
		}
}
if(isset($_POST['submit']))
{
		include 'dbconfig.php';
		$branchid=$_POST['Branch'];
		$sql1 = "Select * from Branch where branchid=$branchid";
		$result1=mysqli_query($conn, $sql1);  
		$row1 = mysqli_fetch_array($result1);
		$sql2 = "Select name,gender,specialization,contact from beautician where did in (select did from beautician_availability where branchid=$branchid);";
		$result2=mysqli_query($conn, $sql2);  
		$row2 = mysqli_fetch_array($result2);
		echo "<label><b>Branch Name:".$row1['name']."</b><br><b>Address:<b>".$row1['address']."<br><b>Contact:<b>".$row1['contact']."<br><b>Beautician Name:<b>".$row2['name']."<br><b>Specialization:<b>".$row2['specialization']."<br><b>Beautician Contact:<b>".$row2['contact']."</label>"; 
}
?>
	</form>
</body>
</html>