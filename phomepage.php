<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>

<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body>
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
		<center><h2>Home Page</h2></center>
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
				<button  href="bookappointment.php">Book Appointment</button>	
			</div>
		</form>
	</div>
	

</body>
</html>