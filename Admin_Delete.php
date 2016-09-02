<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> -->

<?php 
	include '_delete.php';
	include 'dbConnection_AllDocs.php';
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
<link href="CSS/TableCSS.css" rel="stylesheet" type="text/css" />
<link href="CSS/ResultTableCSS.css" rel="stylesheet" type="text/css" />
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
        <li> <a href="Admin_Upload.php">Upload</a></li>
  		<li> <a href="Admin_Delete.php" id="onlink">Delete</a></li>
  		</ul>
		</div>
  </div>
    
    <!--FORM STARTING -->
<div id="formWrap">
<div id="form"><form method="POST" action="Admin_Delete.php">
		<div class="row">
		  <div class="label">Select: </div> <!--end label-->
	<div class="input">
	<select type="select" id="fullName" class="detail" name="combo">   
	<option value="Tittle">Tittle</option>
    <option value="Author">Author</option>
    <option value="Journal Name">Journal Name</option>
    <option value="Keyword">Keyword</option></select>
	</div></div> <!--end row-->
    <div class="row">
    <div class="label">Search By: </div> <!--end label-->
	<div class="input" style="margin-top:0px; margin-bottom:7px;">
	<input type="text" id="fullName" class="detail" name="searchKeys"/>
    <!-- <a href="Articles.html"><img alt="icon" src="Images/SI.gif" type="submit" formmethod="POST" formaction="thesis.html"/></a> -->
	<input type="submit" name="butn" value="" style="background:url(Images/SI.gif) no-repeat; width: 38px; height:33px;" />
</div><!--end .input-->
</div> <!--end row-->
	
   </form>

<div id="tableDiv">

<p id="NRF" style="color:red; font-size: 20px; font-weight: bold; text-align: center; text-decoration: underline;"></p>

<table id="table-6" style=" background: -moz-linear-gradient(top, #69F 0, #DBDBDB 100%); background-size: cover ; margin-left:0px;">

    <thead>
    <tr>
     <th style="width: 335px;">Tittle</th>
     <th style="width: 100px;">Doc. Type</th>
            <th style="width: 220px;">Author</th>
            <th style="width: 150px;">Journal Name</th>
            <th style="width: 10px;">VOL_ISSNO</th>
            <th style="width: 70px;">Year</th>
            <th style="width: 30px;">Option</th>
		</tr>
    </thead>
    </table>
    
<div id="ResultTable">
<table id="table-6" style="margin-left:0px;">
<?php 
if (isset($_GET['id']))
{
		if($result5){
echo "<script>
 		document.getElementById('NRF').innerHTML = 'Deleted Successfully!';
   		</script>";
		}

else {
echo "<script>
 		document.getElementById('NRF').innerHTML = 'ERROR:';
   		</script>".mysql_error();
}
}/*isset close*/

if(isset($_POST['butn']))
{
	$count=mysql_num_rows($result);
	
	if($count >= 1)
{
	while($row= mysql_fetch_array($result))
	{
    echo '<tbody>';
	echo  '<form method="post" action="Admin_Delete.php">';
	echo '   <tr>';
	echo '  <td style="width: 450px;">'.$row[1].'</td>';
    echo '  <td style="width: 450px;">'.$row[2].'</td>';
    echo '  <td style="width: 100px;">'.$row[3].'</td>';
    echo '  <td style="width: 300px;">'.$row[4].'</td>';
	if($row[5]== NULL)
	{
		$row[5] = '-----';
	}
	if($row[6]== NULL)
	{
		$row[6] = '-----';
	}
	echo '  <td style="width: 170px;">'.$row[5].'</td>';
	echo '  <td style="width: 140px;">'.$row[6].'</td>';
	echo '  <td style="width: 30px;"><a href="Admin_Delete.php?id='.$row[1].'">Delete</a></td>';
    echo '</tr></form></tbody>';
	}
}
	else
{
   /* echo '<p style="color:red; font-size: 20px; font-weight: bold; text-align: center; text-decoration: underline;"> No Result Found </p> ';*/
   echo "<script>
   		/*alert('Result Not Found!');
*/		document.getElementById('NRF').innerHTML = 'No Result Found';
   		</script>";
}
}
	?>
   
	</table>
</div>
    </div>
        
</div><!--end form-->
</div> 
  <!--end formWrap-->
</body>
</html>
