<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<?php
include 'connectn.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">   <!--AOS CDN css source-->

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

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
	<?php
include 'connectn.php';
$data=$pdo->query("SELECT title FROM `post`  LEFT JOIN `puserinfotable` ON (`puserinfotable`.`id`=`post`.`pid`)  WHERE `pid` = ".$_SESSION['id']);

$count=$data-> rowCount();
	
	?>
	 <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Notification(<?php echo $count; ?>)
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
    	<?php
    	
    	foreach($data as $value){
    		?>

    	
    	<li><?php 
    	echo $value['title']; ?></li>
    	<?php 
    }
    ?>
      
    </ul>
  </div>


	
	<div id="main-wrapper">
		
		<center><h3>Welcome <?php 
		echo $_SESSION['username'];
		echo "<br>";
		echo "Your id is:";
		echo $_SESSION['id'];
		
		?></h3></center>
		
		<form action="bookappointment.php" method="post">
			<div class="imgcontainer">
				<img src="imgs/patient1.png" alt="Avatar" class="avatar">
			</div>
			<div class="inner_container">
				<button  href="bookappointment.php" class="back_btn">Book Appointment</button>	
			</div>
		</form>
	</div>

	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> <!--AOS CDN javascript source-->
	
  <script>
  AOS.init();
</script> <!--initialize AOS for AOS library support-->

</body>
</html>