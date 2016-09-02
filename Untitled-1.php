<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<link rel="stylesheet" href="form.css" />
<link href="CSS/SearchFormCSS.css" rel="stylesheet" type="text/css" />
	<title>Site-o-Matic Tutorials: How to Style Form Buttons and File Browse Buttons with CSS</title>
    </head>
    <body>
   <!-- <div id='file_browse_wrapper' style="z-index:1">
		
	    </div>
	<form>
	   
	    <p>Styled file browse button:</p>
	    <div id='file_browse_wrapper'>
		
	    </div>
        
        <input type='file' id='file_browse'/>-->
    
 <div id="formWrap">
	<div id="form">
    <form action="Untitled-1.php" method="post" enctype="multipart/form-data">
    
    <div class="row">
    Select File:
    <div class="input">
    <input type="file" name="doc" />
    <input type="submit" name="upload" value="Upload Now" />
    </div><!--end input-->
    </div> <!--end row-->
    
    <div class="row">
    <div class="label">Title: </div> <!--end label-->
	<div class="input">
	<input type="text" id="title" class="detail" name="title"/>
    </div><!--end input-->
    
    <div class="label">Document Type: </div> <!--end label-->
	<div class="input">
	<input type="text" id="docType" class="detail" name="docType"/>
    </div><!--end input-->
    
    <div class="label">Author: </div> <!--end label-->
	<div class="input">
	<input type="text" id="author" class="detail" name="author"/>
    </div><!--end input-->
    
    <div class="label">Volume Issue No: </div> <!--end label-->
	<div class="input">
	<input type="text" id="vol" class="detail" name="vol"/>
    </div><!--end input-->
    
    <div class="label">Journal Name: </div> <!--end label-->
	<div class="input">
    <input type="text" id="journal" class="detail" name="journal"/>
    </div><!--end input-->
	  
    <div class="label">Month: </div> <!--end label-->
	<div class="input">
	<input type="text" id="month" class="detail" name="month"/>
    </div><!--end input-->
    
    <div class="label">Year: </div> <!--end label-->
	<div class="input">
	<input type="text" id="year" class="detail" name="year"/>
    </div><!--end input-->
    
    <div class="label">Local URL: </div> <!--end label-->
	<div class="input">
	<input type="text" id="local" class="detail" name="local"/>
    </div><!--end input-->
    
    <div class="label">Requested By: </div> <!--end label-->
	<div class="input">
	<input type="text" id="requestedby" class="detail" name="requestedby"/>
    </div><!--end input-->
    
    <div class="label">Uploaded By: </div> <!--end label-->
	<div class="input">
	<input type="text" id="uploadedby" class="detail" name="uploadedby"/>
    </div><!--end input-->
    
    <div class="label">Keyword: </div> <!--end label-->
	<div class="input">
	<input type="text" id="keyword" class="detail" name="keyword"/>
    </div><!--end input-->
    
    <div class="label">Price: </div> <!--end label-->
	<div class="input">
	<input type="text" id="price" class="detail" name="price"/>
    </div><!--end input-->
    
    <div class="label">Entry Date: </div> <!--end label-->
	<div class="input">
	<input type="text" id="entrydate" class="detail" name="entrydate"/>
    </div><!--end input-->
        </div> <!--end row-->

    </form>
</div> <!--form div close-->
       		 </div> <!--formWrap div close-->
    </body>
<?php

$conn = mysql_connect("localhost","root","");

if(!$conn)
{
die("Database Connection Error".mysql_error);
}

$select_db= mysql_select_db("Lib",$conn);

if(!$select_db)
{
echo "Cannot Find Database";
}

if (isset($_POST['upload']))
{
	
	 /*UPLOAD PDF*/
	 $doc_name = $_FILES['doc']['name'];
	 $doc_type = $_FILES['doc']['type'];
	 $doc_size = $_FILES['doc']['size'];
	 $doc_tmp_name = $_FILES['doc']['tmp_name'];

if($doc_name == ''){
	echo "<script> alert('Please Select a File to Upload')</script>";
	exit();
}

else{
	move_uploaded_file($doc_tmp_name,"pdfs/$doc_name");
	echo "File Uploaded Successfully";	
}

	/*END PDF UPLOAD*/


	$title = $_POST['title'];
	$author =$_POST['author'];
	$doc = $_POST['docType'];
	$vol= $_POST['vol'];
	$journal = $_POST['journal'];
	$month= $_POST['month'];
	$year= $_POST['year'];
	$localURL= $_POST['local'];
	$requestedby= $_POST['requestedby'];
	$uploadedby= $_POST['uploadedby'];
	$keyword= $_POST['keyword'];
	$price= $_POST['price'];
	$entrydate= $_POST['entrydate'];
	
/*$Serial_No= mysql_query("SELECT SERIAL_OID from article where TITLE= '".$title."'",$conn);*/
	
$result = mysql_query("INSERT INTO `article`(`DOCUMENT_TYPE`, `TITLE`, `AUTHORS`, `VOL_ISSNO`, `JOURNAL_NAME`, `MONTH`, `YEAR`, `LOCAL_URL`, `REQUESTED_BY`, `UPLOADED_BY`, `KEYWORD`,`PRICE`, `ENTRY_DATE`) VALUES ('".$doc."','".$title."','".$author."','".$vol."','".$journal."','".$month."','".$year."','".$localURL."','".$requestedby."','".$uploadedby."','".$keyword."',".$price.",'".$entrydate."')",$conn);

if(! $result )
{
  die('Could not enter data: ' . mysql_error());
}
echo "Entered data successfully\n";

} /*isset close*/

mysql_close($conn);
?>
</html>