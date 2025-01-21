<?php
include('config.php');

date_default_timezone_set('Asia/Kolkata');
  $time = date( 'h:i:s A', time () );
  $cdate = date( 'y-m-d');
?>

<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
     background-image: linear-gradient(to bottom , #f33649, #fa2545);
     background-repeat: no-repeat;
     color: white;
    }
     .text
    {
background:white;
        padding: 11px 40px;
         border:solid white 1px;
        text-decoration: none;
        overflow: hidden;
        color:black;
        border-radius:22px;
       outline: none;
       
      
 
       
    }
   
    select
    {
      background-color: transparent;
        padding:11px;
         border:solid white 1px;
        text-decoration: none;
        overflow: hidden;
        color:white;
        border-radius:22px;
       outline: none;
width: 69%;
    }
         .send
    {

     background-image: linear-gradient(to left,white,white );
        padding: 11px 20px;
        border: none;
        text-decoration: none;
        overflow: hidden;
        color: black;
        border-radius:20px;
         border:solid white 1px;
    }
    .rep
    {
background-color: transparent;
               padding: 11px ;
        border: none;
        text-decoration: none;
        overflow: hidden;
        color:white;
  outline:none;
     
    }
    .set
    {
    background-color: transparent;
        padding: 11px ;
        border: none;
        text-decoration: none;
        overflow: hidden;
        color:white;
       outline:none;
       
    }
        .url
        {
          padding: 7px;
           
            width: 250px;
           
        }
        .form1
        {
            padding: 11px;
            width: 400px;
            border: solid whitesmoke 2px;
           
            height: 150px;
        }
        form
    {
        margin-top: 27%;

    }
    </style>
    </head>
<body>
    
        <form method="POST" action="#">
                                   
               <center><div class="img">
    <center>
    <img src="icon.png"><br><BR><h1>Ready To Send</h1>
       
        A Digital Automated SMS Messages<br>Version : 1.0<br><br>
        
        
                   <div class="url"><input name="userMobile" class="text" type="tel" pattern="[6789][0-9]{9}" placeholder="Mobile Number"  id="number" required   maxlength="10"  oninvalid="Please Enter Proper Mobile Number" ><br></div><div>        
                    
                    <select name="userMessage" class="form-control clid" id="classid" required="required">

        <?php                    
                   
$sql = "SELECT * FROM setting ORDER BY id DESC";
$result = $con->query($sql);

                        
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
   
   echo "<option value='{$row['message']}'>{$row['name']}</option>";
        }
} else {
    echo "<h1 style='color:coral;'>0</h1> Completed Grievances Found";
}
$con->close();
                    
                    
 ?>       
   
                   </select><br></div>
                  <div class="url"><div style="float: right;">
                  <button type="button" onclick="window.location='home.php';" class="set"><i class="fa fa-home"></i>&nbsp;Home</button>
                  <button type="button"  class="rep"onclick="clearAllFields()"><i class="fa fa-close"></i>&nbsp;Clear</button>
                      <button type="submit" class="send" name="SubmitButton" id="btnSend"><i class="fa fa-send-o"></i>&nbsp;Send</button></div>
        </div></center></div></center></form>
   
</body>
<script type="text/javascript">
function clearAllFields(){
    number.value="";
  
}
</script>
</html>

<?php 



if(isset($_POST['SubmitButton']))
{
$textMessage=$_POST["userMessage"];
$mobileNumber=$_POST["userMobile"];
$apiKey = urlencode('WsKqUfka5Wk-HdUjQkM13i0X86ei7dPxrgZXPsL17C');
   
   // Message details
   $numbers = array($mobileNumber);
   $sender = urlencode('TXTLCL');
   $message = rawurlencode($textMessage);
   $numbers = implode(',', $numbers);
   // Prepare data for POST request
   $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
   // Send the POST request with cURL
$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
$haystack = $response;
 //$haystack =  "success";
$needle   = "success";

if( strpos( $haystack, $needle ) !== false) {
    

 
   include('config.php');


           
 $query = mysqli_query($con,"insert into report (phone, message, date, time)values('$mobileNumber','$textMessage','$cdate','$time')");

    
if($query == true)
{
 
    echo "<script>alert('Message sent Successfully!.');</script>";  

}
else
{
    echo "<script>alert('Could Not Save message\\nMessage sent Successfully!.');</script>";  
    
}
      
    
    
    
    
    
}
else
{
  echo "<script>alert('Could Not Send Message!.\\nPlease check your Credit Balance.');</script>";  

}
 
}    
?>
