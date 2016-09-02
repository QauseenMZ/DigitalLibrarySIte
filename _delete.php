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

if (isset($_GET['id']))
{
	
$id=$_GET['id'];

		//$sql="DELETE FROM article WHERE serial_oid='$id'";
		$sql="UPDATE article set del_sts=0 WHERE serial_oid='$id'";
        $result5 =mysql_query($sql);
		}/*isset close*/

?>