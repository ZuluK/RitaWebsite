<?php
session_start();
//checks form value of code against session variable set by captcha_code_file.php and against empty session.
if( $_SESSION['captcha_code'] == $_REQUEST['captcha'] && !empty($_SESSION['captcha_code'] ) ) {

	echo "true";// submitted 
		
	}
	else
	{
		//header("Location: contact.php?not sent");
		echo "false"; // invalid code
	}
?>