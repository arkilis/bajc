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
    <h2>Other Documents List</h2>
    <hr />
    <table class="docTable" style="width:550px;">
    <tr class="heading">
        <td style="width:10%">Name</td>
        <td style="width:10%">Email</td>
        <td style="width:10%">Mobile</td>
        <td style="width:10%">Work Phone</td>
        <td style="width:20%">Address</td>
        <td style="width:10%">Type</td>
        <td style="width:10%">Status</td>
        <td style="width:10%"></td>
    </tr>
    <?php
        
        foreach($ay_res as $key=>$elm)
        {
            echo("<tr>");
            echo("<td>".$elm[1]." ".$elm[2]."</td>");
            echo("<td>".$elm[4]."</td>");
            echo("<td>".$elm[5]."</td>");
            echo("<td>".$elm[6]."</td>");
            echo("<td>".$elm[7]."</td>");
    
            if($elm[8]==0)
                echo("<td>Applicant</td>");
            elseif($elm[8]==1)
                echo("<td>Admin</td>");
            elseif($elm[8]==2)
                echo("<td>TAC</td>");
            else
                echo("<td>Board Member</td>");
        
            if($elm[9]==1)
            {
                $Deactive= "admin/deactivateUser/".$key; 
                echo("<td>Active</td>");
                echo("<td><a href='".site_url($Deactive)."'>Change</a></td>");
            }
            else
            {
                $Active= "admin/activateUser/".$key; 
                echo("<td>Inactive</td>");
                echo("<td><a href='".site_url($Active)."'>Change</a></td>");
            }
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
