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
   $type= 'Article';
   
   switch ($comboSelect) {
        case 'Tittle':
		{
			$result = mysql_query("Select LOCAL_URL, TITLE, DOCUMENT_TYPE, AUTHORS, JOURNAL_NAME, VOL_ISSNO, YEAR from article where del_sts=1 and TITLE='".$searchKeys."' AND Document_type='".$type."' ORDER BY 'TITLE' ASC;",$conn);
			break;
		}
			
        case 'Author':
		{
			$result = mysql_query("Select LOCAL_URL, TITLE, DOCUMENT_TYPE, AUTHORS, JOURNAL_NAME, VOL_ISSNO, YEAR from article where del_sts=1 and AUTHORS LIKE '%".$searchKeys."%' AND Document_type='".$type."' ORDER BY 'AUTHORS' ASC;",$conn);
			break;
		}
		
		case 'Keyword':
		{
			$result = mysql_query("Select LOCAL_URL, TITLE, DOCUMENT_TYPE, AUTHORS, JOURNAL_NAME, VOL_ISSNO, YEAR from article where del_sts=1 and TITLE LIKE '%".$searchKeys."%' ORDER BY 'TITLE' ASC;",$conn);
			break;
		}
		
		case 'Journal Name':
		{
			$result = mysql_query("Select LOCAL_URL, TITLE, DOCUMENT_TYPE, AUTHORS, JOURNAL_NAME, VOL_ISSNO, YEAR from article where del_sts=1 and Journal_Name LIKE '%".$searchKeys."%' AND Document_type='".$type."' ORDER BY 'Journal_Name' ASC;",$conn);
			break;
		}
		
        default:
           {
			    echo 'Not in these';
            break;
		   }
 }			
 
}
mysql_close($conn);
?>