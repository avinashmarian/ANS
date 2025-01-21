<?php
include('config.php');


if(isset($_POST['SubmitButton'])){
    
    
    $name = $_POST['name'];
    $message = $_POST['mesaage'];
        
    
 $query = mysqli_query($con,"insert into setting (name, message)values('$name','$message')");

    
if($query == true)
{
 
    echo "<script>alert('Message Added Successfully\\nThis Message will appeared in Send SMS form You can Select by Message Subject.');</script>";  

}
else
{
    echo "<script>alert('Could Not add message\\nSmoothing went wrong please Contact admin to fix this problems!.');</script>";  
    
}
    
    
           
 
    
    
}





?>
<html>
<head>
    
    
    


    <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         
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
             .text
    {
        background-color: white;
        border: solid #f2f2f2 1px;
        padding: 11px;
        width: 250px;
        outline: none;
        text-decoration: none;
        overflow: hidden;
           color: #2c2c2c;
        border-radius:2px;
    }
                 .text1
    {
        background-color: white;
        border: solid #f2f2f2 1px;
        padding: 11px;
        width: 250px;
        height: 130px;
        outline: none;
        text-decoration: none;
        overflow: hidden;
           color: #2c2c2c;
        border-radius:2px;
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
       position: static;
       }
             .url
        {
          padding: 7px;
           
            width: 250px;
           text-align: left;
           
        }
                  .url1
        {
          padding: 7px;
           
            width: 250px;
           text-align: right;
           
        }
    </style></head>
<body>
    <div class="head"><font style="font-size:17px;"><i class="fa fa-cog fa-fw"></i></font><font style="font-size:24px;">&nbsp;Settings</font>
    <div class="link"><a href="home.php"><i class="fa fa-home"></i></a>&nbsp; | &nbsp;<a href="#" style="color:white"><i class="fa fa-plus"></i></a> &nbsp;|&nbsp; <a href="remove.php"><i class="fa fa-trash"></i>&nbsp;&nbsp;&nbsp;&nbsp;</a></div>
        </div><br><br><br><br>
<form method="POST" action="#">
     <center><div class="form">
     
        <h2 style="color:#f12e33">Add New Message</h2>
          <div style="width:84%;"><font color="gray">Please enter the subject and message description, And click on add button.</font></div><br><br>
      

           <div class="url">
               <label>Subject</label><br><br>
               <input  required name="name" type="text" class="text" placeholder="Subject"></div>
     <div class="url">
               <label>Message Description
</label><br><br>
         <textarea required name="mesaage" maxlength="160"  class="text1" placeholder="Message Description
"></textarea></div>
           
          <div class="url1">
               
                <button type="submit" class="send" name="SubmitButton" id="btnSend"><i class="fa fa-save"></i>&nbsp;&nbsp;Add & Save</button></div>
         
         
         </div></center>      
    
    </form>
    </body>
</html>