<?php

include('config.php');

  
$userid=$_GET['cid'];
$query=mysqli_query($con,"delete from setting where id='$userid'");
      
echo "<script>window.location='remove.php';</script>";

  

 ?>
