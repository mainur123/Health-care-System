<?php
include 'connectn.php';
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">   <!--AOS CDN css source-->

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



<p><center><h2 class="green">APPOINTMENT LIST</h2></center></p>

<?php

session_start();
include('dbconfig/config.php');


$sql = "SELECT * FROM `appointment`  LEFT JOIN `userinfotable` ON (`userinfotable`.`id`=`appointment`.`did`) LEFT JOIN `puserinfotable` ON (`puserinfotable`.`id`=`appointment`.`id`) WHERE `did` = ".$_SESSION['id'];

//make query and get result
$result = mysqli_query($con,$sql);

//fetch the resulting rows as an array
$patients = mysqli_fetch_all($result, MYSQLI_ASSOC);


//free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($con);



 ?>

 <?php 
foreach($patients as $patient): ?>


    <div class="box">
      <h3 align="center">
        <?php echo "ID:";?>
        <?php echo htmlspecialchars($patient['id']); ?>
          
        </h3>
      <h3 align="center">
        <?php echo htmlspecialchars($patient['fullname']); ?>
          
        </h3>
      <h5 align="center"> 
      <?php echo htmlspecialchars($patient['gender']); ?>
      <br>
    </h5>
    <h5 align="center"> 
      <?php echo "Age:";?>
      <?php echo htmlspecialchars($patient['age']); ?>
      <br>
    </h5>
    <?php
    $Displayform=True;
    if(isset($_POST['submit'])){
      $Displayform= False;

    }
    if($Displayform){

      ?>


    
    <div align="right">
        <form action="" method="post" >
          <label><b>Patient Id</b></label>
        <input type="text" placeholder="Enter patient id" name="pid" required>
        <br>
          <textarea name="title"></textarea><br>
          <input type="submit" name="submit" value="post">
          
          

  
        </form>
    </div>
    <?php
  }?>
  </div>



<?php endforeach; ?>
<?php
if(isset($_POST['submit'])){
  $title=$_POST['title'];
  $pid=$_POST['pid'];
  $q1="insert into post (title,pid) values('$title','$pid')";
  //$q2="insert into notification(pid,title,read_n) values('$pid','$title','1')";
  $pdo->query($q1);
 // $pdo->query($q2);
  echo "posted";

}
?>
   


  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> <!--AOS CDN javascript source-->

  <script>
  AOS.init();
</script> <!--initialize AOS for AOS library support-->


</body>
</html>