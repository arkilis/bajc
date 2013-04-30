<?php  

	//########################################## 
	$smtpserver = "ssl://smtp.gmail.com"; 					// SMTP Server
	$smtpserverport =465;									// SMTP Port
	$smtpusermail = "bajcdev@gmail.com";					// SMTP Email Account 
	$smtpemailto = "arkilis@gmail.com";						// Target Email 
	$smtpuser = "bajcdev@gmail.com";				 		// SMTP Server Account same as the SMTP Email Account
	$smtppass = "wahaha1988";								// Password fo the SMTP Account 
	$mailsubject = "PHP Testing Email";						// Email Subject 
	$mailbody = "<h1>This is a testing Email from Bajc</h1>";//Email Content
	$mailtype = "HTML";										// Email format (HTML/TXT), TXT is text format
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);  // True here means whether asking for authorizing 
	$smtp->debug = true;									// Show Debug info 
	$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype); 

?> 