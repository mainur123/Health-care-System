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



<p><center><h2 class="green">APPOINTMENT</h2></center></p>

<?php 

include('dbconfig/config.php');

$sql = 'SELECT * FROM userinfotable';

//make query and get result
$result = mysqli_query($con,$sql);

//fetch the resulting rows as an array
$doctors = mysqli_fetch_all($result, MYSQLI_ASSOC);


//free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($con);



 ?>

 <?php 
foreach($doctors as $doctor): ?>


    <div class="box">
      <h3 align="center">
        <?php echo "ID:";?>
        <?php echo htmlspecialchars($doctor['id']); ?>
          
        </h3>
      <h5 align="center"> 
      <h3 align="center">
        <?php echo "Name:";?>
        <?php echo htmlspecialchars($doctor['fullname']); ?>
          
        </h3>
      <h5 align="center"> 
        <?php echo "Category:";?>
      <?php echo htmlspecialchars($doctor['category']); ?>
      <br>
    </h5>
    <h5 align="center"> 
      <?php echo "Gender:";?>

      <?php echo htmlspecialchars($doctor['gender']); ?>
      <br>
    </h5>
    <h5 align="center"> 
      <?php echo "Address:";?>
      <?php echo htmlspecialchars($doctor['address']); ?>
      <br>
    </h5>
    <h5 align="center"> 
      <?php echo "Chamber Time:";?>
      <?php echo htmlspecialchars($doctor['time']); ?>
      <br>
    </h5>
    <div align="right">
        <a class="brand-text" href="pindex.php">Order Appointment</a></div>
    </div>
  </div>



<?php endforeach; ?>


  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> <!--AOS CDN javascript source-->

  <script>
  AOS.init();
</script> <!--initialize AOS for AOS library support-->


</body>
</html>