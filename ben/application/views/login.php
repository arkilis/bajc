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
h3 {color:#7A7879}
</style>
</head>
<body>
<!--include header-->
<?php include("includes/header1.php"); ?>
<!--body-->
<div id="bodyPan" style="height:500px;">
    <h3>Welcome to BAJC Submission System</h3>
    <p><a href="http://www.bajc.org.au">Back To bajc.org.au</a></p>
    <div id="mid-body">
        <?php
            $this->load->helper('form');
            //echo validation_errors();
            echo form_open('login/ctlValidate'); 
        ?>
            <table id="login">
                <tr>
                    <td style="width:20%;"><strong>Email:</strong></td>
                    <td style="width:40%;"><input style="width:200px;" name="email" type="text" /></td>
                    <td class="error"><?php echo form_error('email'); ?></td> 
                </tr>
                <tr>
                    <td><strong>Password:</strong></td>
                    <td><input style="width:200px;" name="password" type="password" /></td> 
                    <td class="error"><?php echo form_error('password'); ?></td> 
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Submit" /></td> 
                    <td></td> 
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo anchor('login/goRegister', 'Register as a new user') ?></td> 
                    <td><?php echo anchor('login/goForgetPassword', 'Forget Password') ?></td> 
                </tr>
            </table>
            </form>
    </div>
</div>

<!--footer-->

</body>
</html>
