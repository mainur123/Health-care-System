<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">

	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">   <!--AOS CDN css source-->

<title>Sign Up Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>


<div class="marq">
  <h4><marquee  scrollamount="13" direction="right" >WELCOME TO OUR WEBSITE!!!</marquee></h4>
  <h2>HEALTH-CARE SYSTEM</h2>
</div>


<div class="menu">
        <nav class="mainmenu">
          <ul>
            <li><a class="active" href="home.html">Home</a></li>
            <li><a class="active" href="primary_aid.html">Primary Aid</a></li>
            <li><a class="active" href= "appointment.php">Appointment</a></li>
            <li><a class="active" href="healthtips.html">Health Tips</a><li>
            <li><a class="active" href="about.html">About</a></li>
            <li><a class="active" href="register.php">Admin</a></li>
          </ul>
        </nav>
      </div>
<br><br>
	<div id="main-wrapper" data-aos="zoom-in-up" data-aos-duration="1500">
	<center><h2>Sign Up Form</h2></center>
		<form action="register.php" method="post">
			<div class="imgcontainer">
				<img src="imgs/avatar.png" alt="Avatar" class="avatar">
			</div>
			<div class="inner_container">
				<label><b>Fullname</b></label>
				<input type="text" placeholder="Type your fullname" name="fullname" required>
				<br><br>
				<label><b>Gender</b></label>
				<select class="gender" name="gender">
					<option value="male">Male</option>
					<option value="Female">Female</option>

				</select><br>
				<br>
				<label><b>Category</b></label>
				<select class="category" name="category">
					<option value="heart">heart</option>
					<option value="brain">brain</option>
					<option value="bone">bone</option>
					<option value="eye">eye</option>


				</select><br>
				<br>
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>
				<label><b>Address</b></label>
				<input type="text" placeholder="Enter your address" name="address" required>
				<label><b>Chamber Time</b></label>
				<input type="text" placeholder="Enter time" name="time" required>

				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<label><b>Confirm Password</b></label>
				<input type="password" placeholder="Enter Password" name="cpassword" required>
				<button name="register" class="sign_up_btn" type="submit">Sign Up</button>
				
				<a href="index.php"><button type="button" class="back_btn"><< Back to Login</button></a>
			</div>
		</form>
		<script language="javascript">
	var password;
	var pass1="admin";
	password=prompt('ENTER password TO view page',' ');
	if(password==pass1)
		alert('correct password,click to enter.');
	else{
		window.location="register.php";
	}
</script>
		
		<?php
			if(isset($_POST['register']))
			{
				@$fullname=$_POST['fullname'];
				@$category=$_POST['category'];
				@$gender=$_POST['gender'];
				@$address=$_POST['address'];
				@$time=$_POST['time'];

				@$username=$_POST['username'];
				@$password=$_POST['password'];
				@$cpassword=$_POST['cpassword'];
				
				if($password==$cpassword)
				{
					$query = "select * from userinfotable where username='$username'";
					//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
							$query = "insert into userinfotable values('','$username','$fullname','$gender','$category','$password','$address','$time')";
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
								
								header( "Location: congratulation.html");
							}
							else
							{
								echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
			}
			else
			{
			}
		?>
	</div>

	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> <!--AOS CDN javascript source-->

  <script>
  AOS.init();
</script> <!--initialize AOS for AOS library support-->


</body>
</html>