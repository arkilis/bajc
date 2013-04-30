<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BAJC - EOI Submission History</title>
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
    <?php include("applicant_leftPan.php"); ?>
  </div>
  
  <div id="rightPan">
    <h2>EOI Submission History</h2>
    <hr />
    <table style="width:500px;">
        <tr>
            <td>EOI Title:</td>
            <td><?php echo($ay_res[3]); ?></td>
            <td></td>
        </tr>
        <tr>
            <td>Submitssion DateTime:</td>
            <td><?php echo($ay_res[2]); ?></td>
            <td></td>
        </tr>
        <tr>
            <td>Chief Investigator's Organization:</td>
            <td><?php echo($ay_res[4]); ?></td>
            <td</td>
        </tr>
        <tr>
            <td>Upload Word Documents:</td>
            <td><a href='../../../<?php echo(substr($ay_res[5],9)); ?>'>Download</a></td>
            <td></td>
        </tr>
        <tr>
            <td>Upload PDF Documents:</td>
            <td><a href='../../../<?php echo(substr($ay_res[6],9)); ?>'>Download</a></td>
            <td></td>
        </tr>
    </table>
  </div>  
<!--footer-->
<?php include("includes/footer.php"); ?>
</div>

</body>
</html>
