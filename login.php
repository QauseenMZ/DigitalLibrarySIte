<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> -->

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Digital Library Site - Login</title>
<style type="text/css">
.banner1 {
	background-color: transparent;
	margin-bottom:2px;
	margin-left: 60px;
	margin-right: 60px;
	float: left;
	}
	
.banner2 {
border: #6FC;
margin-left: 60px;
margin-right: 60px;
}

</style>
<link href="CSS/contentCSS.css" rel="stylesheet" type="text/css" />
<link href="CSS/SearchFormCSS.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="banner1">
<img src="Images/Banner.png" alt="HeaderBanner" width="1225" height="147"/>
</div>

<div class="banner2"><img src="Images/LibPic.png" alt="LibPic" width="1215" height="260" style="" /></div>

<div class="Content">

    
    <!--FORM STARTING -->

<div id="formWrap">
<div id="form">
<form method="POST" action="login.php">
<p id='alert' style="color:red; font-size: 20px; font-weight: bold; text-align: center; text-decoration: underline;"></p>
		<div class="row">
		  <div class="label">User Name: </div> <!--end label-->
	<div class="input">
	<input type="text" id="username" name="username" class="detail"/>
	</div></div> <!--end row-->
    <div class="row">
    <div class="label">Password: </div> <!--end label-->
	<div class="input">
	<input type="password" id="password" name="password" class="detail"/>
</div><!--end .input-->
</div> <!--end row-->
	<input type="submit" name="butn" value="Login" style="width: 100px; height:30px; font-weight:bold; border-radius: 7px; float:right; margin-right: 353px;" />
  </form>
</div> <!--end form-->

<?php 

if(isset($_POST['butn']))
{	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if ($username == 'admin' && $password== '1234567')
	{
		header("Location: /DigitalLibrarySite/Admin_Upload.php");
    exit;
	}
	else
	{
		echo "<script> document.getElementById('alert').innerHTML = 'Incorrect User Name or Password'; </script>";
	}
}
?>
</div> 
  <!--end formWrap-->
</div>
</body>
</html>
