<?php
include('config.php');





?>
<html>
<head>
    
    
 <link rel="stylesheet" href="w3.css">
 <script type="text/javascript" src="jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="jspdf.debug.js"></script>

    <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
       body
    {
        margin: 0px;
     font-family: lato;
        
    }
    .head
    {
        position: fixed;
        background-color: #2d2e30;
        color: white;
        width: 100%;
        padding: 11px;
        
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
        background-image: linear-gradient(to left,#1953ac,#2067d6 );
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
             @media print { 
              .res { 
                visibility: hidden;
               } 
            } 
    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="head"><font style="font-size:17px;"><i class="fa fa-cog fa-fw"></i></font><font style="font-size:24px;">&nbsp;History</font>
    <div class="link"><a href="home.php">Home</a> | <a href="#" style="color:white">History&nbsp;&nbsp;&nbsp;&nbsp;</a></div>
        </div>
<br><br><br>
<form method="POST" action="#">
     <center> <div class="form">
     
        <h2 style="color:#1953ac">Message History
</h2>
           <font color="gray">Full details About messages which you have been sent!.</font><br><button style="padding: 6px 20px;background-color:#0080ff;color: white;cursor:pointer;outline: none;border: 0px;" OnClick="demoFromHTML()">Print All Message History</button><a href="#" onclick="window.open('https://www.google.com/', '_system');" >Google</a>
                   <br>
      
    <div class="res" id="fromHTMLtestdiv">	
        
 <?php                    
                    
$sql = "SELECT * FROM `report` ORDER BY id DESC";
$result = $con->query($sql);

                        
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
   echo "<br><div id={$row['id']}><div style='font-size:17;background-image:whitesmoke;padding:11px; background-image: linear-gradient(to top , whitesmoke , white);'>Message Id :{$row['id']}</div><table border='0' width='100%' style='border:solid silver 1px;'><tr><th style='border:solid whitesmoke 1px;background-color:whitesmoke;width:150px;'>".
        
       "<tr><th style='border:solid silver 1px;text-align:left;padding:11px;background-color:whitesmoke'>Phone Number<br></th></tr>".
         "<tr><td style=padding:11px>{$row['phone']} <br> </td></tr> ".
       "<tr><th style='border:solid silver 1px;text-align:left;padding:11px;background-color:whitesmoke'>Message<br></th></tr>".
         "<tr><td style=padding:11px>{$row['message']} <br> </td></tr> ".
        "<tr><th style='border:solid silver 1px;text-align:left;padding:11px;background-color:whitesmoke'>Date<br></th></tr>".
         "<tr><td style=padding:11px>{$row['date']} <br> </td></tr> ".
      "<tr><th style='border:solid silver 1px;text-align:left;padding:11px;background-color:whitesmoke'>Time
<br></th></tr>".
         "<tr><td style=padding:11px>{$row['time']} <br> </td></tr><br></table></div><div> <div style='font-size:17;background:whitesmoke;padding:11px;border:solid silver 1px;height:55px;'><input type='button' style='float:right;padding:4px;background-color:#0080ff;cursor:pointer;color:white;outline: none;border: 0px;'                  
 onclick=CallPrin(this) name={$row['id']} value='Print Current'/>&nbsp;&nbsp;<input type='button' style='float:left;padding:4px;background-color:#fd5a5e;cursor:pointer;color:white;outline: none;border: 0px;'                  
 onclick=window.location='re.php?cid={$row['id']}' value='Delete'/></div>";
      
      
       
       
       
       
       
       
    
      }
} else {
   echo "<h1 style='color:#1953ac;'>0</h1>Message History found";
}
$con->close();
                    
                    
 ?>                   
    
    
         </div></div></center>
    
    </form>
         <script>
function CallPrin(str) {
	
	var c = "#" + str.name;
	var pdf = new jsPDF('p', 'pt', 'letter')
	// source can be HTML-formatted string, or a reference
	// to an actual DOM element from which the text will be scraped.
	, source = $(c)[0]
	// we support special element handlers. Register them with jQuery-style 
	// ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
	// There is no support for any other type of selectors 
	// (class, of compound) at this time.
	, specialElementHandlers = {
		// element with id of "bypass" - jQuery style selector
		'#bypassme': function(element, renderer){
			// true = "handled elsewhere, bypass text extraction"
			return true
		}
	}

	margins = {
      top: 40,
      bottom: 40,
      left: 45,
      width: 522
    };
    // all coords and widths are in jsPDF instance's declared units
    // 'inches' in this case
    pdf.fromHTML(
    	source // HTML string or DOM elem ref.
    	, margins.left // x coord
    	, margins.top // y coord
    	, {
    		'width': margins.width // max width of content on PDF
    		, 'elementHandlers': specialElementHandlers
    	},
    	function (dispose) {
    	  // dispose: object with X, Y of the last line add to the PDF 
    	  //          this allow the insertion of new lines after html
		
var now = Math.floor(Math.random() * 105675471);
		 
var name =  "Message_history-" + now;

          pdf.save(name);
        },
    	margins
    )
}




function demoFromHTML() {
	
	
	var pdf = new jsPDF('p', 'pt', 'letter')
	// source can be HTML-formatted string, or a reference
	// to an actual DOM element from which the text will be scraped.
	, source = $('#fromHTMLtestdiv')[0]
	// we support special element handlers. Register them with jQuery-style 
	// ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
	// There is no support for any other type of selectors 
	// (class, of compound) at this time.
	, specialElementHandlers = {
		// element with id of "bypass" - jQuery style selector
		'#bypassme': function(element, renderer){
			// true = "handled elsewhere, bypass text extraction"
			return true
		}
	}

	margins = {
      top: 40,
      bottom: 40,
      left: 45,
      width: 522
    };
    // all coords and widths are in jsPDF instance's declared units
    // 'inches' in this case
    pdf.fromHTML(
    	source // HTML string or DOM elem ref.
    	, margins.left // x coord
    	, margins.top // y coord
    	, {
    		'width': margins.width // max width of content on PDF
    		, 'elementHandlers': specialElementHandlers
    	},
    	function (dispose) {
    	  // dispose: object with X, Y of the last line add to the PDF 
    	  //          this allow the insertion of new lines after html
		
var now = Math.floor(Math.random() * 105675471);
		 
var name =  "Message_history-" + now;

          pdf.save(name);
        },
    	margins
    )
}




</script>
		 
    </body>
</html>