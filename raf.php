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

 
<h3 align="center">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logindb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id,fullname,age FROM puserinfotable ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    

    while($row = $result->fetch_assoc()) {
        echo " <br>ID: ". $row["id"]. " <br>Name: ". $row["fullname"]. " <br>Age: ". $row["age"]. "<br>";
        
       
    }
}
 else {
    echo "0 results";

}


 //<div align="right">
       // <a class="brand-text" href="#">more info</a></div>
    //</div>

$conn->close();

?> 




<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> <!--AOS CDN javascript source-->

  <script>
  AOS.init();
</script> <!--initialize AOS for AOS library support-->


</body>
</html>