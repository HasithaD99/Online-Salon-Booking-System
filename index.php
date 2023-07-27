<!DOCTYPE html>
<html>
<body style="background-image:url(images/salon1.jpg)">
<link rel="stylesheet" href="main.css">
			<div class="header">
				<ul>
					<li style="float:left;border-right:none"><a href="index.php" class="logo"><img src="images/Style_lovers.png" width="40px" height="40px"><strong> STYLELOVERS </strong><u>Salon</u> </a></li>
					<li><a href="signup.php">Sign Up</a></li>
					<li><a href="locateus.php">Locate Us</a></li>
					<li><a href="#home">Home</a></li>
				</ul>
			</div>
			<div class="center">
				<h1 style="color:#BDBDBD" >STYLELOVERS</h1><br>
				<p style="text-align:center;color:#F2F2F2;font-size:30px;top:35%">“We aim at providing the finest services to our clients at industry competitive prices."</p><br>
				<button onclick="document.getElementById('id01').style.display='block'" style="position:absolute;top:55%;left:45.5%">Login</button>
				
			
					<button onclick="document.getElementById('id02').style.display='block';document.getElementById('id01').style.display='none'" style="float;position:absolute;top:90%;left:5%">BOOK NOW</button>
			
			</div>
<div id="id01" class="modal">
  
  <form class="modal-content animate" method="post" action="index.php">
    <div class="imgcontainer">
		<span style="float:left"><h2>&nbsp&nbsp&nbsp&nbspLog In</h2></span>
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
	
    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
		<button type="submit" name="login">Login</button>
		
      <input type="checkbox" checked="checked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
	  <button onclick="document.getElementById('id02').style.display='block';document.getElementById('id01').style.display='none'" style="float:right">Don't have one?</button>
    </div>
  </form>
</div>

<div id="id02" class="modal">
  
  <form class="modal-content animate" action="signup.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span><br>
    </div>

	<div class="imgcontainer">
      <img src="images/register.jpg" alt="Avatar" class="avatar">
    </div>
	
    <div class="container">
		<p style="text-align:center;font-size:18px;"><b>Sign Up -> Choose your Dates -> Book your visit</b></p>
      <p style="text-align:center"><b>Booking an appointment has never been easier!</b></p>
	  
    </div>
	
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
	  <button type="submit" name="signup" style="float:right">Sign Up</button>
    </div>
	
  </form>
</div>


<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}

</script>
<?php
session_start();
$error=''; 
if (isset($_POST['login'])) {
if (empty($_POST['uname']) || empty($_POST['psw'])) {
$error = "Username or Password is invalid";
}
else
{
	include 'dbconfig.php';
	$username=$_POST['uname'];
	$password=$_POST['psw'];

	$query = mysqli_query($conn,"select * from customer where password='$password' AND username='$username'");
	$rows = mysqli_fetch_assoc($query);
	$num=mysqli_num_rows($query);
	if ($num == 1) {
		$_SESSION['username']=$rows['username'];
		$_SESSION['user']=$rows['name'];
		header( "Refresh:1; url=ulogin.php"); 
	} 
	else 
	{
		$error = "Username or Password is invalid";
	}
	mysqli_close($conn); 
}
}
?>
</body>
</html>
