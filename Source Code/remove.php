<?php
include('config.php');





?>
<html>
<head>
    
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="w3.css">

    <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
@font-face {
  font-family:rajsoft;
  src: url(rajsoftn.ttf);
}
  
       body
    {
        margin: 0px;
    font-family:rajsoft;
        
    }
    .head
    {
        position: fixed;
      background-image: linear-gradient(to bottom , #f33649, #fa2545);
        color: white;
        width: 100%;
        padding: 10px;
        
    }
    .link
            {
            float: right;
                padding: 9px;
                
            }
    
    a
            {
                color: silver;
                overflow: hidden;
                text-decoration: none;
                
            }
          .send
    {
     background-image: linear-gradient(to bottom , #f33649, #fa2545);
        padding: 11px;
        border: none;
        text-decoration: none;
        overflow: hidden;
        color: white;
        border-radius:2px;
        
    }
               .form
    {
        
position:static;
    padding: 11px;
    }
    </style></head>
<body>
    <div class="head"><font style="font-size:17px;"><i class="fa fa-cog fa-fw"></i></font><font style="font-size:24px;">&nbsp;Settings</font>
    <div class="link"><a href="home.php"><i class="fa fa-home"></i></a>&nbsp; | &nbsp;<a href="settings.php" ><i class="fa fa-plus"></i></a> &nbsp;|&nbsp; <a href="#"style="color:white"><i class="fa fa-trash"></i>&nbsp;&nbsp;&nbsp;&nbsp;</a></div>
        </div>
<br><br><br>
<form method="POST" action="#">
     <center> <div class="form">
     
        <h2 style="color:#f12e33">Manage Messages</h2>
         <div style="width:84%;">  <font color="gray">Manage your saved messages by viewing or deleting.</font></div><br>
      
    <div class="res">	
        
 <?php                    
                    
$sql = "SELECT * FROM `setting` ORDER BY id DESC";
$result = $con->query($sql);

                        
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
   echo "<br><div style='font-size:17;padding:11px; background-image: linear-gradient(to top , #f2f2f2 , white);'>Message Id :{$row['id']}</div><table border='0' width='100%' style='border:solid #eaeaea 1px;'><tr><th style='border:solid #f2f2f2 1px;color:white;background-color:#ff6048;width:150px;'>".
         "<tr><th style='border:solid #f2f2f2 1px;text-align:left;padding:11px;background-color:#f2f2f2'>Message Title<br></th></tr>".
         "<tr><td style=padding:11px>{$row['name']} <br> </td></tr> ".
      "<tr><th style='border:solid #f2f2f2 1px;text-align:left;padding:11px;background-color:#f2f2f2'>Message description
<br></th></tr>".
         "<tr><td style=padding:11px>{$row['message']} <br> </td></tr><br></table> <div style='font-size:17;background:whitesmoke;padding:11px;border:solid #f2f2f2 1px;height:55px;'><input type='button' style='float:right;padding:4px;  background-image: linear-gradient(to bottom , #f33649, #fa2545);cursor:pointer;padding:7px;border-radius: 25px;color:white;outline: none;border: 0px;'                  
 onclick=window.location='rem.php?cid={$row['id']}' value='Delete'/><br></div>";
      
      
       
       
       
       
       
       
    
      }
} else {
   echo "<h1 style='color:Red;'>0</h1>Default messages found.";
}
$con->close();
                    
                    
 ?>                   
    
    
    
    
    </form>
    </body>
</html>