<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BAJC - Registration</title>
<link href="<?php echo base_url();?>/style.css" rel="stylesheet" type="text/css" />
<style>

#register tr {height:40px;}

</style>
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
            echo form_open('login/saveUser');
        ?>
        <table id="register">
            <tr>
                <td class="error">Fill all fields with *</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Title</td>
                <td>
                    <select name="title">
                        <option value="Mr." selected>Mr.</option>
                        <option value="Ms.">Ms.</option>
                        <option value="Dr.">Dr.</option>
                    </select>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="fname" /></td>
                <td>*</td>
                <td class="error"><?php echo form_error('fname'); ?></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="lname" /></td>
                <td>*</td>
                <td class="error"><?php echo form_error('lname'); ?></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <select name="gender">
                        <option value="Male" selected>Male</option>
                        <option value="Female">Female</option>
                    </select>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type="text" name="address" /></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Mobile:</td>
                <td><input type="text" name="mobile" /></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Work Phone:</td>
                <td><input type="text" name="phone" /></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" /></td>
                <td>*</td>
                <td class="error"><?php echo form_error('email'); ?></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" /></td>
                <td>*</td>
                <td class="error"><?php echo form_error('password'); ?></td>
            </tr>
            <tr>
                <td>Re-Password:</td>
                <td><input type="password" name="repassword" /></td>
                <td>*</td>
                <td class="error"><?php echo form_error('repassword'); ?></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Submit" /></td>
                <td></td>
                <td></td>
            </tr> 
        </table>
        </form>
        </fieldset>
    </div>
</div>
</body>
</html>
