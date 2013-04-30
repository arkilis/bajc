<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BAJC - EOI List</title>
<link href="<?php echo base_url();?>/style.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript" src="<?php echo base_url();?>/scripts/jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/scripts/ajaxfileupload.js"></script>
<script>
</script>
<body>
<!--include header-->
<?php include("includes/header2.php"); ?>

<!--body-->
<div id="bodyPan"><!--style="border: black solid 1px"-->
  <div id="leftPan">
    <?php include("admin_leftPan.php"); ?>
  </div>
  
  <div id="rightPan">
    <h2>EOI</h2>
    <hr />
    <table class="docTable">
        <tr class="heading">
        <td style="width:10%">EOI Name</td>
        <td style="width:10%">Applicant</td>
        <td style="width:10%">Date</td>
        <td style="width:10%">Title</td>
        <td style="width:20%">Org</td>
        <td style="width:10%">Word</td>
        <td style="width:10%">PDF</td>
        <td style="width:15%">Proposal</td>
    </tr>
    <?php
        
        foreach($ay_res as $ay_elm)
        {
            echo("<tr>");
            echo("<td>".$ay_elm[7]."</td>");
            echo("<td>".$ay_elm[1]."</td>");
            echo("<td>".$ay_elm[0]."</td>");
            echo("<td>".$ay_elm[2]."</td>");
            echo("<td>".$ay_elm[3]."</td>");
            echo("<td><a href='../../../".substr($ay_elm[4],9)."'>Download</a></td>");
            echo("<td><a href='../../../".substr($ay_elm[5],9)."'>Download</a></td>");
            
            if($ay_elm[6]==0)
                echo("<td><input type='checkbox' onclick='javascript:window.location.href="."\"".site_url("admin/grantEOI/".$ay_elm[9]."/".$ay_elm[8])."\""."' /><td>");
            else
                echo("<td><input type='checkbox' checked onclick='javascript:window.location.href="."\"".site_url("admin/ungrantEOI/".$ay_elm[9]."/".$ay_elm[8])."\""."' /><td>");
                
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
