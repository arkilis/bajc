<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BAJC - Docuemnt uploads</title>
<link href="<?php echo base_url();?>/style.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript" src="<?php echo base_url();?>/scripts/jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/scripts/ajaxfileupload.js"></script>
<body>
<!--include header-->
<?php include("includes/header2.php"); ?>
<!--body-->
<div id="bodyPan"><!--style="border: black solid 1px"-->
  <div id="leftPan">
    <?php include("admin_leftPan.php"); ?>
  </div>
  
  <div id="rightPan">
    <h2>Other Documents List</h2>
    <hr />
    <table class="docTable">
    <tr class="heading">
        <td style="width:30%">Document Name</td>
        <td style="width:10%">Download</td>
        <td style="width:30%">Upload Date</td>
        <td style="width:15%">Edit</td>
        <td style="width:15%">Remove</td>
    </tr>
    <?php
        
        foreach($ay_res as $key=>$elm)
        {
            echo("<tr>");
            echo("<td>".$elm[0]."</td>");
            $path= base_url();
            echo("<td><a href='../../../".substr($elm[1],9)."'>Download</a></td>");
            echo("<td>".$elm[2]."</td>");
            $getURL_update= "admin/goUpdateDoc/".$key;
            echo("<td><a href='".site_url($getURL_update)."'>Edit</a></td>");
            $getURL_remove= "admin/delDoc/".$key;
            echo("<td><a href='".site_url($getURL_remove)."'>Remove</a></td>");
            echo("</tr>");
        }
 
    ?>
    </table>
  </div>
  <!--footer-->
  <?php include("includes/footer.php"); ?>
</div>
</body>
</html>
