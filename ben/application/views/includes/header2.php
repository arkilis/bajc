<!-- Header -->
<div id="topPan">
    <div id="logo">
	    <a href="<?php echo site_url("login"); ?>">
		    <img src="<?php echo base_url();?>/images/logo.jpg" title="Green items" alt="Green items" width="487" height="136" border="0" />
	    </a>
    </div>
    <div id="info">
        Welcome: <a href='<?php echo site_url("applicant/goUpdateProfile"); ?>'><?php echo($this->session->userdata('fname')." ".$this->session->userdata('lname')); ?></a>|<?php echo anchor('login/logout','Logout') ?>
	<p><a href="http://www.bajc.org.au">Back To http://www.bajc.org.au</a></p>	
    </div>
</div>
