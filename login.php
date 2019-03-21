<?php
session_start();
unset($_SESSION["user_id"]);
unset($_SESSION["user_name"]);

?>
<?php 

$message="";
$msg = "";
$admin='admin4418';

$btnsub = $_POST['btnsub'];
$btnsub = preg_replace('/[^a-z]/', "", $btnsub);
$gender = preg_replace('/[^0-9a-z]/', "", $_POST['gender']);
$ecode = $_POST['ecode'];

if ($btnsub == 'log') {
	if (isset($_POST['logsubmit'])){
		if(count($_POST)>0) {
		$conn = mysql_connect("localhost","root","");
		mysql_select_db("entranceexam_masterlist",$conn);
		$result = mysql_query("SELECT * FROM tbl_accnts WHERE username='" . $_POST["user_name"] . "' and password = '". sha1($_POST["password"])."'");
		$row  = mysql_fetch_array($result);
		if(is_array($row)) {
			$_SESSION["user_id"] = $row[accnt_ID];
			$_SESSION["user_name"] = $row[username];
			
		} else {
			$message = "Invalid account";
			$change="<div class='flash'> $message </div>";
		}
		}
	}
	
	if (isset($_SESSION["user_id"])){
		$administrator = "Administrator";
		//header("Location:opening.php?a=$administrator"); 	
		header("location:Admin_home.php");
	}
 }
 
?>



<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
         

        <title>MCHS | Admin </title>
   
   
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
 
	<link href="style/tabMenu.css" rel="stylesheet" type="text/css">
	<link href="style/structure.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="style/styles.css">
	<script type="text/javascript" src="js/flashnoti.js"></script>

</head>
     
		<style type="text/css">
            html{
                background: url(images/background2.jpg) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;	
            }
        </style>  
    
 
	<script>
	function startQuiz(url) {
		window.location = url;
		}
	</script>
        
	<script type="text/javascript" >
		$(document).ready(function(){
		setTimeout(function(){
		$(".flash").fadeOut("slow", function () {
		$(".flash").remove();
			});
    
		}, 2000);
 		});
 	</script>
      
	<SCRIPT type="text/javascript">
		window.history.forward();
		function noBack() { window.history.forward(); }
	</SCRIPT> 	

<BODY onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">
   

<div class="homebodyauto">

<div id="admin_bannerpic"> 

   <div id="admin_banner_in"><br><h1>Mount Carmel High School</h1> </div>
   <div id="headerbanner_admin">
   <p>  </p>
    </div>
<div id="admin_banner_in2"><br><p><em>E</em>Test</p></div>
</div>

<div id='cssmenu'><ul></ul></div>

<center>
<div id="startbody">
<center>
	<div id="regform">
	<center><h1>Here</h1></center><?php if (msg != "") { ?><center> <strong id="message"><?php echo $msg;} ?></strong></center>
 	<br>
    <form name="frmUser" method="post" action="EE_Admin.php" class="frmlogin">
    <table>
	<tr><td align="right"><h2>Username: </h2></td><td><input type="text" name="user_name" placeholder="administrator" required></td></tr>
	<tr><td align="right"><h2>Password: <h2></td><td><input type="password" name="password" placeholder="********" required></td></tr>
	</table>
    <br>
    <input type="hidden" value="log" name="btnsub"/> 
    <input type="submit" name="logsubmit" value="Log in" class='btnOK'/>
 	</form>
 	</div><!-- end of regform-->
</center>
	<div align="center"><?php echo $change; ?> </div>

</div><!-- end of startbody -->
</center>

 
</div>
                          
<footer id="footer">
     <center>
<a href="http://www.finduniversity.ph/universities/mount-carmel-college-escalante">Mount Carmel College</a> | <a href="http://www.escalantecity.gov.ph">Escalante City, Negros Occidental</a>
<br/>
  <em>Copyright @ 2015</em> 
     </center>
  </footer>    
       
</body>
</html>
