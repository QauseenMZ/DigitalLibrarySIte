<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> -->

<?php 
	include '_upload.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Digital Library Site - Admin</title>
<style type="text/css">
.banner1 {
	background-color: transparent;
	margin-bottom:2px;
	margin-left: 60px;
	margin-right: 60px;
	float: left;
	}
table{
	margin-left: 160px;
	margin-right: 10px;
}
img{
	 margin-left: 53px;
	margin-right: 53px;
 }


</style>
<link href="CSS/contentCSS.css" rel="stylesheet" type="text/css" />
<link href="CSS/NavCSS.css" rel="stylesheet" type="text/css" />
<link href="CSS/SearchFormCSS.css" rel="stylesheet" type="text/css" />
</head>

<body>
<img src="Images/Banner.png" alt="HeaderBanner" width="1225" height="147"/>

<div class="Content">
<div id="NavBar">
<form action="index.php"><input type="submit" id="Library Panel" name="admin" value="Library Panel" style="float: right;width:100px; height:30px; border-radius:17px; background-color:#69F; font-size:15px; width: 150px; height: 35px; font-family:'Arial Black', Gadget, sans-serif;
	font-weight: bold;
    border:1px 1px solid #000;
	text-align:center;"/></form>

		<div id="Holder">
  		<ul>
        <li> <a href="Admin_Upload.php" id="onlink">Upload</a></li>
  		<li> <a href="Admin_Delete.php">Delete</a></li>
  		</ul>
		</div>
  </div>
    
    <!--FORM STARTING -->
<div id="formWrap">
<p id="NRF2" style="color:red; font-size: 20px; font-weight: bold; text-align: center; text-decoration: underline;"></p>

<table>
<form action="Admin_Upload.php" method="post" enctype="multipart/form-data">

 <tr>
 <td>Select File:</td>
 <td><input type="file" name="doc" /></td>
 </tr>
 <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
<tr>
	<td>Document Type: </td>
	<td style="padding-right: 30px;">
	<input type="text" id="docType" class="detail" name="docType" required/></td>
    
	<td>Journal Name: </td>
	<td>
    <input type="text" id="journal" class="detail" name="journal" required/></td>
</tr>
<tr>
	<td>Title:</td>
    <td>
	<input type="text" id="title" class="detail" name="title" required/></td>
	<td>Volume Issue No: </td>
    <td>
	<input type="text" id="vol" class="detail" name="vol" required/></td>
    </tr>
    <tr>
    <td>Author: </td>
	<td>
	<input type="text" id="author" class="detail" name="author" required/></td>
    <td>Local URL: </td>
    <td>
	<input type="text" id="local" class="detail" name="local" required/></td>
</tr>
<tr>
	<td>Year: </td>
    <td>
	<input type="text" id="year" class="detail" name="year" required/>
    </td>
	<td>Uploaded By: </td>
    <td>
	<input type="text" id="uploadedby" class="detail" name="uploadedby"required/></td>
</tr>
<tr>
	<td>Month: </td>
    <td>
	<input type="text" id="month" class="detail" name="month"/></td>
    <td>Requested By: </td>
    <td>
	<input type="text" id="requestedby" class="detail" name="requestedby" required/></td>
</tr>
<tr>
	<td>Keyword: </td>
    <td>
	<input type="text" id="keyword" class="detail" name="keyword" required/></td>
    <td>Price: </td>
    <td>
	<input type="text" id="price" class="detail" name="price"/></td>
</tr>
<tr>
    <td>
<input type="submit" name="upload" value="Upload Now"/></td>
    </tr>

<?php 
if(isset($_POST['upload']))
{
	if($result)
{ 
	echo "<script>
  		document.getElementById('NRF2').innerHTML = 'Uploaded Successfully!';
   		</script>";
}

	else
	{
		echo "<script>
  		document.getElementById('NRF2').innerHTML = 'Please Try Again!';
   		</script>";
	}
} /*isset close*/
?>
    </form>
</table>

</div>
</div>
</body>
</html>
