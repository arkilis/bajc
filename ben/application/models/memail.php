<?php

include_once("class.myMailer.php");
include_once("/var/www/ben/bajc_config.php");

class MEmail extends CI_Model{

    var $smtpserver     = "";
    var $smtpserverport = 0;
    var $smtpusermail   = "";
    var $smtpuser       = "";
    var $smtppass       = "";
    var $adminEmail     = "";


    function MEmail(){
        parent::__construct();

        // initialize    
        $this->smtpserver    = "ssl://smtp.gmail.com";
	    $this->smtpserverport = 465;
	    $this->smtpusermail   = "bajcdev@gmail.com";
	    $this->smtpuser       = "bajcdev@gmail.com";
	    $this->smtppass       = "wahaha1988";
	    $this->adminEmail     = "arkilis@gmail.com";

    }

    // basic send Email function    
    function sendEmail($targetEmail, $subject, $body)
    {
        $smtp= new smtp(
                $this->smtpserver,
                $this->smtpserverport,
                true,
                $this->smtpuser,
                $this->smtppass);
        // debug
        //$smtp->debug = true;
        $smtp->sendmail(
                $targetEmail, 
                $this->smtpusermail,
                $subject,
                $body,
                "HTML");  
    }

    // send welcome email
    function welcomeEmail($targetEmail, $name)
    {
        $subject    = "Welcome and Thanks for Registering!";
        $body       = "<h2>Dear ".$name."<h2>"; 
        $body      .= "<p>Congratulation! Your Account has been Successfully created!</p>"; 
        $body      .= "<p>For security reason, you could not login now! But our system admin will activate your account soon!</p>"; 
    
        $this->sendEmail($targetEmail, $subject, $body);
    }

    // send welcome email to Admin
    function welcomeEmailToAdmin($name)
    {
        $subject    = "A new user ".$name." reistered our system!";
        $body       = "<h2><strong>".$name."</strong> Congratulation! Your Account has been Successfully created!</h2>"; 
        $body      .= "<p>For security reason, you could not login now! But our system admin will activate your account soon!</p>"; 
    
        $this->sendEmail($this->adminEmail, $subject, $body);
    }
    // send Activate email
    function activateEmail($targetEmail, $name)
    {
        $subject    = "Your Account has been Activated!";
        $body       = "<h2>".$name."Congratulation! Your Account has been Successfully activated!</h2>"; 
    
        $this->sendEmail($targetEmail, $subject, $body);
    }

    // send EOI success email
    function eoiEmail($targetEmail, $name, $eoititle, $org, $date, $doc, $pdf)
    {
        $subject    = "Thanks for your submission!";
        $body       = "<h2>Confirmation Email</h2>"; 
        $body      .= "<p>Congratulation! You have successfully submitted an EOI, see details as following:</p>"; 
        $body      .= "<br />";
        $body      .= "<table>";
        $body      .= "<tr><td>Chief Investigator:</td><td>".$name."</td></tr>";
        $body      .= "<tr><td>EOI Title:</td><td>".$eoititle."</td></tr>";
        $body      .= "<tr><td>Organization:</td><td>".$org."</td></tr>";
        $body      .= "<tr><td>Submit Date:</td><td>".$date."</td></tr>";
        $body      .= "<tr><td>Word Document:</td><td>".$doc."</td></tr>";
        $body      .= "<tr><td>PDF Document:</td><td>".$pdf."</td></tr>";
        $body      .= "</table>";
 
        $this->sendEmail($targetEmail, $subject, $body);
    }

    // send EOI success email to Admin
    function eoiEmailToAdmin($name, $eoititle, $org, $date, $doc, $pdf)
    {
        $subject    = "New EOI submission";
        $body       = "<h2>Confirmation Email<h2>"; 
        $body      .= "<br />";
        $body      .= "<table>";
        $body      .= "<tr><td>Chief Investigator:</td><td>".$name."</td></tr>";
        $body      .= "<tr><td>EOI Title:</td><td>".$eoititle."</td></tr>";
        $body      .= "<tr><td>Organization:</td><td>".$org."</td></tr>";
        $body      .= "<tr><td>Submit Date:</td><td>".$date."</td></tr>";
        $body      .= "<tr><td>Word Document:</td><td>".$doc."</td></tr>";
        $body      .= "<tr><td>PDF Document:</td><td>".$pdf."</td></tr>";
        $body      .= "</table>";
 
        $this->sendEmail($this->adminEmail, $subject, $body);
    }
    
    // send EOI has been granted congrats email
    function eoiGranted($name)
    {
        $subject    = "Your EOI has been granted";
        $body       = "<h2>Congratulation, Your EOI has been granted!</h2>";
    }
}
?>
