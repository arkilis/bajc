<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BAJC - Board Members</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!--include header-->
<?php include("header.php"); ?>

<!--body-->
<div id="bodyPan"><!--style="border: black solid 1px"-->
  <div id="leftPan">
	 <div id="item1">
			<h2>Project</h2>
			<p>Project & reports</p>
			<a href="#">&nbsp;</a>
		</div>
        <div id="item2">
			<h2>Other</h2>
			<p>Other Docs</p>
			<a href="#">&nbsp;</a>
		</div>
  </div>
  
  <div id="rightPan">
  	<?php include("listDocs.php"); ?>
  </div>

</div>

<!--footer-->
<?php include("footer.php"); ?>

</body>
</html>
