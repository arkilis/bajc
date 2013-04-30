<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BAJC - TAC</title>
<link href="<?php echo base_url();?>/style.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript" src="<?php echo base_url();?>/scripts/jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/scripts/ajaxfileupload.js"></script>
<script type="text/javascript">
</script>
<body>
<!--include header-->
<?php include("includes/header2.php"); ?>

<!--body-->
<div id="bodyPan"><!--style="border: black solid 1px"-->
  <div id="leftPan">
    <?php include("tac_leftPan.php"); ?>
  </div>
  
  <div id="rightPan">
    <h2>Other Documents List</h2>
    <hr />
    <table class="docTable">
    <tr class="heading">
        <td style='width:40%'>Document Name</td>
        <td style='width:20%;'>Download</td>
        <td style='width:40%;'>Upload Date</td>
    </tr>
    <?php
        
        foreach($ay_res as $elm)
        {
            echo("<tr>");
            echo("<td>".$elm[0]."</td>");
            $path= base_url();
            echo("<td><a href='../../../".substr($elm[1],9)."'>Download</a></td>");
            echo("<td>".$elm[2]."</td>");
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
