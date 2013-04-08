<?php
/*
$targetpath="attachment/test";
$newupfile=$_FILES['newupfile'];
print_r($newupfile);
if (move_uploaded_file ($newupfile['tmp_name'],$targetpath)) exit ('true');
exit ('false');*/

include_once("bajc_config.php");
include_once("common.php");

// get types and file
$type1=$_POST['type1'];
$type2=$_POST['type2'];

array_push($_FILES,$_REQUEST);
$file_info = var_export($_FILES,true);
$fileName= $_FILES['file']['name'];
$fileType= pathinfo($fileName, PATHINFO_EXTENSION);
if(!in_array($fileType, $ay_fileTypes) || substr($fileType,0,3)!=$type2)
	exit("Please upload required file format!");
else
{
	$dateTime=getCurDateTime();
	if($type2=="doc")
    {
		$newFilename=$UPLOAD_EOI."/word/".$dateTime.".".$fileType;
        
        # debug
        #echo($fileType);
	}
    if($type2=="pdf")
    {
		$newFilename=$UPLOAD_EOI."/pdf/".$dateTime.".".$fileType;
    
        # debug
        #echo($fileType);
	}	
	$res = file_put_contents("/tmp/".$fileName,$file_info);
	if (move_uploaded_file ($_FILES['file']['tmp_name'],$newFilename))
		exit('Succeed!');
	exit("Failed!");
	
}
?>
