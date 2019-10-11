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
          </ul>
        </nav>
      </div>
      <form action="bookappointment.php" method="post">
      <div class="inner_container">
        <label><b> Patient Fullname</b></label>
        <input type="text" placeholder="Type your fullname" name="fullname" required>
        <br><br>
        <br>
        
        <br>
        <label><b> Patient ID</b></label>
        <input type="text" placeholder="Enter doctor id" name="id" required>
        <label><b>Doctor Fullname</b></label>
        <input type="text" placeholder="Enter doctor fullname" name="dfullname" required>
        <label><b>Doctor Id</b></label>
        <input type="text" placeholder="Enter doctor id" name="did" required>
        <br>
        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
        <label><b>Confirm Password</b></label>
        <input type="password" placeholder="Enter Password" name="cpassword" required>
        
        
        
        <button name="Book" class="sign_up_btn" type="submit">Confirm</button>

        
        
      </div>
       
      

      
    </form>
    <?php
      if(isset($_POST['Book']))
      {
        @$fullname=$_POST['fullname'];
        @$id=$_POST['id'];
        @$dfullname=$_POST['dfullname'];

        @$did=$_POST['did'];
        @$password=$_POST['password'];
        @$cpassword=$_POST['cpassword'];
        
        if($password==$cpassword)
        {
          $query = "select * from appointment where fullname='$fullname'";
          //echo $query;
        $query_run = mysqli_query($con,$query);
        //echo mysql_num_rows($query_run);
        if($query_run)
          {
            
              $query = "insert into appointment values('','$fullname','$id','$dfullname','$did','$password')";
              $query_run = mysqli_query($con,$query);
              if($query_run)
              {
                echo '<script type="text/javascript">alert("Your appointment is processing")</script>';
                
              }
              else
              {
                echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
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
      else{}
      
    ?>
  </div>
</body>
</html>
    