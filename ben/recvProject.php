<?php
/*
$targetpath="attachment/test";
$newupfile=$_FILES['newupfile'];
print_r($newupfile);
if (move_uploaded_file ($newupfile['tmp_name'],$targetpath)) exit ('true');
exit ('false');*/

include_once("bajc_config.php");
include_once("common.php");

error_reporting(E_ALL & ~E_NOTICE);


// get types and file
$type2=$_POST['type2'];

array_push($_FILES,$_REQUEST);
$file_info = var_export($_FILES,true);

if($_FILES['word_doc']['name']!="")
    $fileName= $_FILES['word_doc']['name'];
   

if($_FILES['pdf_doc']['name']!="")
    $fileName= $_FILES['pdf_doc']['name'];
 
$fileType= pathinfo($fileName, PATHINFO_EXTENSION);
if(!in_array($fileType, $ay_fileTypes) || substr($fileType,0,3)!=$type2)
	exit("0");  // 0: wrong extension name
else
{
	$dateTime=getCurDateTime();
	if($type2=="doc")
    {
		$newFilename=$UPLOAD_PROJECT."/report1/".$dateTime.".".$fileType;
        
        # debug
        #echo($fileType);
	}
    if($type2=="pdf")
    {
		$newFilename=$UPLOAD_PROJECT."/report2/".$dateTime.".".$fileType;
    
        # debug
        #echo($fileType);
	}	
	$res = file_put_contents("/tmp/".$fileName,$file_info);
    if($_FILES['word_doc']['name']!="")
	{
        if (move_uploaded_file ($_FILES['word_doc']['tmp_name'],$newFilename))
    		exit($newFilename);
	    exit("-1"); // -1: upload failed
	}
    if($_FILES['pdf_doc']['name']!="")
	{
        if (move_uploaded_file ($_FILES['pdf_doc']['tmp_name'],$newFilename))
    		exit($newFilename);
	    exit("-1");
	}
}
?>
