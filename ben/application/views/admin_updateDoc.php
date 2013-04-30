<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BAJC - Reports List</title>
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
    <h2>Update Document</h2>
     <?php
        $this->load->helper('form');
        echo form_open('admin/updateDocName');
     ?>
    <hr />
    <table>
        <tr>
            <td>Document Name:</td> 
            <td><input type='text' name="docname" value='<?php echo($ay_res["docname"]); ?>' /></td> 
            <td>*</td>
        </tr> 
        <tr>
            <td>Document Path:</td> 
            <td><input type='text' style="width:250px;" readonly value="<?php echo($ay_res['docpath']); ?>" /></td> 
            <td>*</td>
        </tr> 
            <td><input type='hidden' name="docid" value="<?php echo($ay_res['id']); ?>" /></td> 
            <td><input type='submit' value="Update" /></td> 
            <td></td>
        </tr> 
    </table> 
  </div>
<!--footer-->
<?php include("includes/footer.php"); ?>
</div>
</body>
</html>

