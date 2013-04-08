<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BAJC - Registration</title>
<link href="<?php echo base_url();?>/style.css" rel="stylesheet" type="text/css" />
</head>


<body>
<!--include header-->
<?php include("includes/header1.php"); ?>
<!--body-->
<div id="bodyPan"><!--style="border: black solid 1px"-->
    <div id="mid-body">
        <fieldset>
        <?php 
            $this->load->helper('form');
            echo form_open('login/getPassword');
        ?>
        <table>
            <tr>
                <td>Email:</td>
                <td><input name="email_pswd" type="text"/></td>
                <td class="error">*<?php echo form_error('email'); ?></td>
            </tr> 
            <tr>
                <td></td>
                <td><input type="submit" value="Submit" /></td>
                <td></td>
            </tr>
        </table>
        </form>
    </div>
</div>

<!--footer-->
<?php include("includes/footer.php"); ?>

</body>
</html>
