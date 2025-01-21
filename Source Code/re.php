<?php

include('config.php');

  
$userid=$_GET['cid'];
$query=mysqli_query($con,"delete from report where id='$userid'");
      
echo "<script>window.location='report.php';</script>";

  

 ?>
