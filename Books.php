<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> -->

<?php 
	include 'dbConnection_Book.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Digital Library Site - Books</title>
<style type="text/css">
.banner1 {
	background-color: transparent;
	margin-bottom:130px;
	margin-left: 55px;
	margin-right: 55px;
	float: left;
	}
	
.banner2 {
border: #6FC;
margin-left: 60px;
margin-right: 60px;
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
<!--<div class="banner1">
<!-- <img src="Images/logo.png" alt="logo" width="145" height="145" style="" width: 1000px/>&nbsp;&nbsp; -->
<!--<img src="Images/logo33.PNG" alt="logo" style="border: #6FC; z-index:1; position: relative;"/>
<img src="Images/flogo.png" style="z-index:2; top: 8px; right: 100px; position:absolute;" alt="HeaderBanner"/> -->
<img src="Images/Banner.png" alt="HeaderBanner" width="1225" height="147"/>
<!--<div class="banner2"><img src="Images/LibPic.png" alt="LibPic" width="1223" height="300" style="" /></div>-->

<div class="Content">
<div id="NavBar">
<form action="login.php">
<input type="submit" id="admin" name="admin" value="Admin" style="float: right;width:100px; height:30px; border-radius:13px; background-color:#69F; font-size:13px;
font-family:'Arial Black', Gadget, sans-serif;
	font-weight: bold;
    border:1px 1px solid #000;
	text-align:center;"/></form>
		<div id="Holder">
  		<ul>
        <li> <a href="index.php">All</a></li>
  		<li> <a href="Books.php" id= "onlink">E-Books</a></li>
  		<li> <a href="Articles.php">Articles</a></li>
  		<li> <a href="Thesis.php">Thesis</a></li>
  		</ul>
		</div>
  </div>
    
    <!--FORM STARTING -->

<div id="formWrap">
<div id="form"><form method="POST" action="Books.php">
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
	<input type="submit" name="butn" value="" style="background:url(Images/SI.gif) no-repeat; width: 38px; height:33px; margin-top:0px;" />
</div><!--end .input-->
</div> <!--end row-->
	
   </form>

<div id="tableDiv">
<p id="NRF" style="color:red; font-size: 20px; font-weight: bold; text-align: center; text-decoration: underline;"></p>
<table id="table-6" style=" background: -moz-linear-gradient(top, #69F 0, #DBDBDB 100%); background-size: cover ;">

    <thead>
    <tr>
                  <th style="width: 335px;">Tittle</th>
     <th style="width: 100px;">Doc. Type</th>
            <th style="width: 220px;">Author</th>
            <th style="width: 150px;">Journal Name</th>
            <th style="width: 10px;">VOL_ISSNO</th>
            <th style="width: 70px;">Year</th>
		</tr>
    </thead>
    </table>
    
<div id="ResultTable">
<table id="table-6">
<?php 
if(isset($_POST['butn']))
{
	$count=mysql_num_rows($result);
	
	if($count >= 1)
{
	while($row= mysql_fetch_array($result))
	{
    echo '<tbody>';
    echo '   <tr>';
    echo '   <td style="width: 450px;"> <a href="http://localhost/DigitalLibrarySite/pdfs/'.$row[0].'" download="'.$row[0].'">'.$row[1].'</a></td>';
    echo '  <td style="width: 100px;">'.$row[2].'</td>';
    echo '  <td style="width: 300px;">'.$row[3].'</td>';
	if($row[4]== NULL)
	{
		$row[4] = '-----';
	}
	if($row[5]== NULL)
	{
		$row[5] = '-----';
	}
	echo '  <td style="width: 170px;">'.$row[4].'</td>';
	echo '  <td style="width: 140px;">'.$row[5].'</td>';
	echo '  <td style="width: 70px;">'.$row[6].'</td>';
    echo '</tr></tbody>';
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
    
    <!-- <div class="submit">
    <input type="submit" id= "submit" name="submit" value="Send Message"/>
    </div><!--end Submit--> 
        
</div> <!--end form-->
</div> 
  <!--end formWrap-->
</div>
</body>
</html>
