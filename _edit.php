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

$serial = 23900;

$result = mysql_query("INSERT INTO `article`(`DOCUMENT_TYPE`, `TITLE`, `AUTHORS`, `VOL_ISSNO`, `JOURNAL_NAME`, `MONTH`, `YEAR`, `LOCAL_URL`, `REQUESTED_BY`, `UPLOADED_BY`, `KEYWORD`,`PRICE`, `ENTRY_DATE`) VALUES ('".$doc."','".$title."','".$author."','".$vol."','".$journal."','".$month."','".$year."','".$localURL."','".$requestedby."','".$uploadedby."','".$keyword."',".$price.",'".$entrydate."')",$conn);

if(! $result )
{
  die('Could not enter data: ' . mysql_error());
}

echo "Entered data successfully\n";

} /*isset close*/

mysql_close($conn);
?>