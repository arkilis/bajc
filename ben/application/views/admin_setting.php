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
    <h2>Setting up current EOI/ Proposal/ Project deadline</h2>
    <hr />
        <div id="admin_set_eoi">
            <table class="setting">
                <tr class="heading">
                    <td class="col1">Current EOI</td>
                    <td class="col2">Start Date & Time</td>
                    <td class="col3">EndDate & Time</td>
                    <td class="col4"></td>
                    <td class="col5"></td>
                </tr>
                <?php
                    if(count($ay_res_eoi)!=0)
                    {
                        echo("<tr>");
                        echo("<td>".$ay_res_eoi[1]."</td>");
                        echo("<td>".$ay_res_eoi[2]."</td>");
                        echo("<td>".$ay_res_eoi[3]."</td>");
                        echo("<td><a href='".site_url('admin/goViewUpdateEOI')."' />Update</a></td>");
                        echo("<td>Remove</td>");
                        echo("</tr>");
                    }
                    else
                        echo("<tr><td colspan=5 style='text-align:left'>You do not set up EOI yet. Set it <a href='".site_url('admin/goViewAddEOI')."' >here</a>.</td></tr>");
                ?>
            </table>
        </div>
        
        <div id="admin_set_proposal">
            <table class="setting">
                <tr class="heading">
                    <td class="col1">Current Proposal</td>
                    <td class="col2">Start Date & Time</td>
                    <td class="col3">EndDate & Time</td>
                    <td class="col4"></td>
                    <td class="col5"></td>
                </tr>
                <?php
                    if(count($ay_res_proposal)!=0)
                    {
                        echo("<tr>");
                        echo("<td>".$ay_res_proposal[1]."</td>");
                        echo("<td>".$ay_res_proposal[2]."</td>");
                        echo("<td>".$ay_res_proposal[3]."</td>");
                        echo("<td><a href='".site_url('admin/goViewUpdateProposal')."' />Update</a></td>");
                        echo("<td>Remove</td>");
                        echo("</tr>");
                    }
                    else
                        echo("<tr><td colspan=5 style='text-align:left'>You do not set up Proposal yet. Set it <a href='".site_url('admin/goViewAddProposal')."' >here</a>.</td></tr>");
                ?>
            </table>
        </div>
        
        <div id="admin_set_project">
            <table class="setting">
                <tr class="heading">
                    <td class="col1">Current Project</td>
                    <td class="col2">Start Date & Time</td>
                    <td class="col3">EndDate & Time</td>
                    <td class="col4"></td>
                    <td class="col5"></td>
                </tr>
                <?php
                
                    if(count($ay_res_project)!=0)
                    {
                        echo("<tr>");
                        echo("<td>".$ay_res_project[1]."</td>");
                        echo("<td>".$ay_res_project[2]."</td>");
                        echo("<td>".$ay_res_project[3]."</td>");
                        echo("<td><a href='".site_url('admin/goViewUpdateProjet')."' />Update</a></td>");
                        echo("<td>Remove</td>");
                        echo("</tr>");
                    }
                    else
                        echo("<tr><td colspan=5 style='text-align:left'>You do not set up Project yet. Set it <a href='".site_url('admin/goViewAddProject')."' >here</a>.</td></tr>");
                ?>
            </table>
        </div>
 
  </div>
<!--footer-->
<?php include("includes/footer.php"); ?>
</div>
</body>
</html>
