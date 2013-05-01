<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BAJC - Update EOI</title>
<link href="<?php echo base_url();?>/style.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript" src="<?php echo base_url();?>/scripts/jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/scripts/ajaxfileupload.js"></script>
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
    <h2>Update EOI</h2>
    <hr />
    <?php
        $this->load->helper('form');
        echo form_open('admin/updateEOI');
    ?>
    <table>
        <tr>
            <td>EOI Title:</td>
            <td><input name="eoiname" type="text" value="" /></td>
            <td>*</td>
            <td class="error"><?php echo form_error('eoiname'); ?></td>
        </tr>
        <tr>
            <td>Start Date & Time:</td>
            <td><input name="startdatetime" type="text" /></td>
            <td>*</td>
            <td class="error"><?php echo form_error('startdatetime'); ?></td>
        </tr>
        <tr>
            <td>End Date & Time:</td>
            <td><input name="deadline" type="text" /></td>
            <td>*</td>
            <td class="error"><?php echo form_error('deadline'); ?></td>
        </tr>
        <tr>
            <td>Description:</td>
            <td><textarea name="description" cols=60 rows=4></textarea></td>
            <td></td>
            <td class="error"><?php echo form_error('description'); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Submit" /></td>
            <td></td>
            <td></td>
        </tr>
    </table> 
  </div>
<!--footer-->
<?php include("includes/footer.php"); ?>
</div>
</body>
</html>
