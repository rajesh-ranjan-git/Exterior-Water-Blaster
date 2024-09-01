<?php 
$dontsendemail = 0;
$possiblespam = FALSE;
$strlenmessage = "";
$email = $_REQUEST['email']; 
$city = $_REQUEST['city'];
$message = $_REQUEST['message']; 
 
$emailaddress = "info@propagent.in";

if(isset($_REQUEST["htest"]) && $_REQUEST["htest"] != "") die("Possible spam detected. Please hit your browser back button and check your entries."); 

function checkemail($field) {
	
	if( !preg_match( "/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$/", $field))
	{
		die("Improper email address detected. Please hit your browser back button and enter a proper email address."); 
		return 1;
	}
}

function checkmonth($field,$checkrequiredob) {
    if($checkrequiredob == 0) {
		if(!preg_match("/^[\s]{0,5}$|^(0|January|February|March|April|May|June|July|August|September|October|November|December)$/", $field)) die("Improper month of birth detected. Please hit your browser back button and try again.");  
	}
	else {
		if(!preg_match("/^(January|February|March|April|May|June|July|August|September|October|November|December)$/", $field)) die("Improper month of birth detected. Please hit your browser back button and try again."); 
	}
}
// Spamcheck function
function spamcheck($field) {
	if(preg_match("/to:/i",$field) || preg_match("/cc:/i",$field) || preg_match("/\r/i",$field) || preg_match("/i\n/i",$field) || preg_match("/%0A/i",$field)){ 
		$possiblespam = TRUE;
	}else $possiblespam = FALSE;
	if ($possiblespam) {
		die("Possible spam attempt detected. If this is not the case, please edit the content of the contact form and try again.");
		return 1;
	}
}
// Spamcheck URL function
function spamcheckurl($field) {
	if(preg_match("/to:/i",$field) || preg_match("/cc:/i",$field) || preg_match("/\r/i",$field) || preg_match("/\n/i",$field)){ 
		$possiblespam = TRUE;
	}else $possiblespam = FALSE;
	if ($possiblespam) {
		die("Possible spam attempt detected. If this is not the case, please edit the content of the contact form and try again.");
		return 1;
	}
}
function strlencheck($field,$minlength,$maxlength,$minresponse,$maxresponse) {
	if (strlen($field) < $minlength){
		die($minresponse); 
		return 1;
	}
	if (strlen($field) > $maxlength){
		die($maxresponse); 
		return 1;
	}
}
function checkphone($field,$checkrequirephone,$warning) {
	if($checkrequirephone == 0) {
		if(!preg_match("/^([\s]{0,10})$|^(((\+)?[1-9]{1,2})?([-\s\.])?((\(\d{1,4}\))|\d{1,4})(([-\s\.])?)(((\d{1,12}){1})|((\d{3,4}([-\s\.])?){2,3})){1}([\s]{0,10}))$/", $field)) die($warning);
	}		
	else {
		if(!preg_match("/^((\+)?[1-9]{1,2})?([-\s\.])?((\(\d{1,4}\))|\d{1,4})(([-\s\.])?)(((\d{1,12}){1})|((\d{3,4}([-\s\.])?){2,3})){1}([\s]{0,10})$/", $field)) die($warning);
	}
}
function checkpriority($field,$checkrequirepriority) {
	if($checkrequirepriority == 0) {
		if(!preg_match("/^[\s]{0,10}$|^[\d]$/",$field)) die("Improper priority detected. Please hit your browser back button and try again.");
	}
	else {
		if(!preg_match("/^[\d]$/",$field)) die("Improper priority detected. Please hit your browser back button and try again.");
	}
}

	$name = $_REQUEST['name'];strlencheck($name,0,60,"You have not entered a proper name. Please hit your browser back button and check your name entry.","You have entered a name that is too long. Please hit your browser back button and check your name entry.");$phone = $_REQUEST['phone'];checkphone($phone,0,"Improper first phone number detected. Please hit your browser back button and try again."); if ($dontsendemail == 0) $dontsendemail = spamcheck($_REQUEST["htest"]);
if ($dontsendemail == 0) $dontsendemail = spamcheck($name);
if ($dontsendemail == 0) $dontsendemail = spamcheck($phone);

if ($dontsendemail == 0) $dontsendemail = checkemail($email);
if ($dontsendemail == 0) $dontsendemail = spamcheck($email);
if ($dontsendemail == 0) $dontsendemail = spamcheck($city);
if ($dontsendemail == 0) $dontsendemail = strlencheck($email,10,255,"The email address field is too short. Please hit your browser back button and check your entry.<br />","The email address you have entered is too long. Please hit your browser back button and check your entry."); 

if ($dontsendemail == 0) $dontsendemail = strlencheck($city,0,255,"The city field is too short. Please hit your browser back button and check your entry.<br />","The city you have entered is too long. Please hit your browser back button and check your entry.");

if ($dontsendemail == 0) $dontsendemail = strlencheck($message,10,10000,"The message field is too short. Please hit your browser back button and check your entry.<br />","Your message is limited to 10000 characters. Please hit your browser back button and shorten your message.");
if ($dontsendemail == 0) $dontsendemail = strlencheck($emailaddress,8,255,"You have not selected a recipient of your message. Please hit your browser back button and check your entry.<br />","Possible spam detected. Please hit your browser back button and choose a recipient for your email.");
if ($dontsendemail == 0) {
	$message="";
	$message.="Name: ".$name."\r\n";
	$message.="Phone Number: ".$phone."\r\n";
	$message.="City: ".$city."\r\n";
		
	$message=$message."\r\nMessage:\r\n".$_REQUEST['message'];
	mail($emailaddress,"$name",$message,"From: $email" ); include "email_sent.php";
}