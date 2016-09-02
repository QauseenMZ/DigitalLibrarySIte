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

/*CHECKING FOR NULLS*/

	if($doc == '-' || $title=='-' || $author=='-' || $localURL=='-' || $uploadedby=='-')
	{
		echo "alert('Please Fill the Required Fields!')";
	}
	
	/*if ($year== '' || $) */
	if($month == '-')
	{
		$month= '';
	}
	if($year == '-')
	{
		$year= '';
	}
	if($journal == '-')
	{
		$journal= '';
	}
	if($vol == '-')
	{
		$vol= '';
	}
	if($requestedby == '-')
	{
		$requestedby= '';
	}
	if($keyword == '-')
	{
		$keyword= '';
	}
	if($price == '-')
	{
		$price= '';
	}
	
$result = mysql_query("INSERT INTO `article`(`DOCUMENT_TYPE`, `TITLE`, `AUTHORS`, `VOL_ISSNO`, `JOURNAL_NAME`, `MONTH`, `YEAR`, `LOCAL_URL`, `REQUESTED_BY`, `UPLOADED_BY`, `KEYWORD`,`PRICE`, `ENTRY_DATE`) VALUES ('".$doc."','".$title."','".$author."','".$vol."','".$journal."','".$month."','".$year."','".$localURL."','".$requestedby."','".$uploadedby."','".$keyword."',".$price.", CURDATE())",$conn);

if(! $result )
{
  die('Could not Enter Data. SQL Error: ' . mysql_error());
}
} /*isset close*/

mysql_close($conn);
?>