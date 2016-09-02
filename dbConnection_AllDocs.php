<?php 

$comboSelect;
$searchKeys;
$result;

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


if(isset($_POST['butn']))
{	
	$searchKeys = $_POST['searchKeys'];
   $comboSelect = mysql_real_escape_string($_POST['combo']);
   
   switch ($comboSelect) {
        case 'Tittle':
		{
			$result = mysql_query("Select LOCAL_URL, TITLE, DOCUMENT_TYPE, AUTHORS, JOURNAL_NAME, VOL_ISSNO, YEAR from article where del_sts=1 and TITLE='".$searchKeys."' ORDER BY 'TITLE' ASC;",$conn);
			break;
		}
			
        case 'Author':
		{
			$result = mysql_query("Select LOCAL_URL, TITLE, DOCUMENT_TYPE, AUTHORS, JOURNAL_NAME, VOL_ISSNO, YEAR from article where del_sts=1 and AUTHORS LIKE '%".$searchKeys."%' ORDER BY 'AUTHORS' ASC;",$conn);
			break;
		}
		
		case 'Keyword':
		{
			$result = mysql_query("Select LOCAL_URL, TITLE, DOCUMENT_TYPE, AUTHORS, JOURNAL_NAME, VOL_ISSNO, YEAR from article where del_sts=1 and TITLE LIKE '%".$searchKeys."%' ORDER BY 'TITLE' ASC;",$conn);
			break;
		}
		
		case 'Journal Name':
		{
			$result = mysql_query("Select LOCAL_URL, TITLE, DOCUMENT_TYPE, AUTHORS, JOURNAL_NAME, VOL_ISSNO, YEAR from article where del_sts=1 and Journal_Name LIKE '%".$searchKeys."%' ORDER BY 'Journal_Name' ASC;",$conn);
			break;
		}
		
        default:
           {
			    echo 'Not in these';
            break;
		   }
 }			
 
/*
while($row= mysql_fetch_array($result))
{
echo $row[0];
echo $row[1];
echo $row[2].'<br/>'.'<br/>';
}*/
}
mysql_close($conn);
?>