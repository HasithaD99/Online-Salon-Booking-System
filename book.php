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
	url: "getbeauticianbooking.php",
	data:'cid='+val,
	success: function(data){
		$("#beautician-list").html(data);
	}
	});
}

function getDay(val) {
	var cidval=document.getElementById("branch-list").value;
	var didval=document.getElementById("beautician-list").value;
	$.ajax({
	type: "POST",
	url: "getDay.php",
	data:'date='+val+'&cidval='+cidval+'&didval='+didval,
	success: function(data){
		$("#datestatus").html(data);
	}
	});
}

</script>
<body style="background-image:url(images/Schedule-Appointments.png)">
	<div class="header">
		<ul>
			<li style="float:left;border-right:none"><a href="index.php" class="logo"><img src="images/Style_lovers.png" width="40px" height="40px"><strong> STYLELOVERS </strong><u>Salon</u> </a></li>
			<li><a href="book.php">Book Now</a></li>
			<li><a href="ulogin.php">Home</a></li>
		</ul>
	</div>
	<form action="book.php" method="post">
	<div class="sucontainer" style="background-image:url(images/Schedule-Appointments.png)">
		<label><b>Name:</b></label><br>
		<input type="text" placeholder="Enter Full name of customer" name="fname" required><br>
		
		<label><b>Gender</b></label><br>
		<input type="radio" name="gender" value="female">Female
		<input type="radio" name="gender" value="male">Male
		<input type="radio" name="gender" value="other">Other<br><br>
	
		<label style="font-size:20px" >City:</label><br>
		<select name="city" id="city-list" class="demoInputBox"  onChange="getTown(this.value);" style="width:100%;height:35px;border-radius:9px">
		<option value="">Select City</option>
		<?php
		$sql1="SELECT distinct(city) FROM clinic";
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
		
		<label style="font-size:20px" >Beautician:</label><br>
		<select id="beautician-list" name="Beautician" onChange="getDate(this.value);" style="width:100%;height:35px;border-radius:9px">
		<option value="">Select Beautician</option>
		</select><br>
		
		
		<label><b>Date of Visit:</b></label><br>
		<input type="date" name="dov" onChange="getDay(this.value);" min="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d',strtotime('+7 day'));?>" required><br><br>
		<div id="datestatus"> </div>
		
		<div class="container">
			<button type="submit" style="position:center" name="submit" value="Submit">Submit</button>
		</div>
<?php
session_start();
if(isset($_POST['submit']))
{
		
		include 'dbconfig.php';
		$fname=$_POST['fname'];
		$gender=$_POST['gender'];
		$username=$_SESSION['username'];
		$branchid=$_POST['Branch'];
		$bid=$_POST['Beautician'];
		$dov=$_POST['dov'];
		$status="Booking Registered.Wait for the update";
		$timestamp=date('Y-m-d H:i:s');
		$sql = "INSERT INTO book (Username,Fname,Gender,BranchID,BID,DOV,Timestamp,Status) VALUES ('$username','$fname','$gender','$branchid','$bid','$dov','$timestamp','$status') ";
		if(!empty($_POST['fname'])&&!empty($_POST['gender'])&&!empty($_SESSION['username'])&&!empty($_POST['Branch'])&&!empty($_POST['Beautician']) && !empty($_POST['dov']))
		{
			$checkday = strtotime($dov);
			$compareday = date("l", $checkday);
			$flag=0;
			require_once("dbconfig.php");
			$query ="SELECT * FROM beautician_availability WHERE BID = '" .$bid. "' AND BranchID='".$bid."'";
			$results = $conn->query($query);
			while($rs=$results->fetch_assoc())
			{
				if($rs["day"]==$compareday)
				{
					$flag++;
					break;
				}
			}
			if($flag==0)
			{
				echo "<h2>Select another date as Beautician Unavailable on ".$compareday."</h2>";
			}
			else
			{
				if (mysqli_query($conn, $sql)) 
				{
						echo "<h2>Booking successful!! Redirecting to home page....</h2>";
						header( "Refresh:2; url=ulogin.php");

				} 
				else
				{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}
		else
		{
			echo "Enter data properly!!!!";
		}
}
?>
	</form>
</body>
</html>