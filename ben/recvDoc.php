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

array_push($_FILES,$_REQUEST);
$file_info = var_export($_FILES,true);

if($_FILES['doc']['name']!="")
    $fileName= $_FILES['doc']['name'];
   
$fileType= pathinfo($fileName, PATHINFO_EXTENSION);
if(!in_array($fileType, $ay_fileTypes)) 
	exit("Please upload required file format, PDF, DOC or DOCX!");
else
{
	$dateTime=getCurDateTime();
	$newFilename=$UPLOAD_DOC."/".$dateTime.".".$fileType;
    # debug
    #echo($fileType);
		
	$res = file_put_contents("/tmp/".$fileName,$file_info);
    if($_FILES['doc']['name']!="")
	{
        if (move_uploaded_file ($_FILES['doc']['tmp_name'],$newFilename))
    		exit($newFilename);
	    exit("Failed!");
	}
}
?>
