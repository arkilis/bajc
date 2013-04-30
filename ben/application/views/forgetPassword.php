<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BAJC</title>
<link href="<?php echo base_url();?>/style.css" rel="stylesheet" type="text/css" />
<style>
#login tr {height:40px;}
h3 {color:#7A7879; margin-left:10px; padding-top:20px; top:10px;}
</style>
</head>
<body>
<!--include header-->
<?php include("includes/header1.php"); ?>
<!--body-->
<div id="bodyPan" style="height:500px; background-color:#EFEFE7">
    <div id="mid-body">
        <?php
            $this->load->helper('form');
            //echo validation_errors();
            echo form_open('login/getPassword'); 
        ?>
            <table id="login">
                <tr>
                    <td style="width:30%;"><strong>Email:</strong></td>
                    <td style="width:40%;"><input style="width:200px;" name="email" type="text" />*</td>
                    <td class="error"><?php echo form_error('email'); ?></td> 
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Submit" /></td> 
                    <td></td> 
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo anchor('login/goRegister', 'Back to Previous Page') ?></td> 
                    <td></td> 
                </tr>
            </table>
            </form>
    </div>
</div>

<!--footer-->

</body>
</html>
