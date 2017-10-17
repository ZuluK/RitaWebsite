<?php
session_start();

		/****SET THE MAX CHARS FOR EACH MESSAGE***************/
			
			//it is recommended not to set the max too high, to prevent extremely long messages
			// from stalling your server
			
			$EMAIL_MAX = 2500;
		
		/*****************************************************/

		//function for stripping whitespace and some chars
		function cleanUp($str_to_clean, $newlines, $spaces){
		
			//build list of whitespace chars to be removed
			$bad_chars = array('\r', '\t', ';');
		
			//if newlines are false, add that to the list of bad chars
			if(!$newlines){array_push($bad_chars, '\n');}
			
			//if spaces are false, strip them too
			if(!$spaces){array_push($bad_chars, ' ');}
			
			$str_to_clean_a = str_replace($bad_chars, '', $str_to_clean);
			$str_to_clean_b = strip_tags($str_to_clean_a);
			return $str_to_clean_b;
		}
		
		//function to check for valid email address pattern
		function checkEmail($email) {
			if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {return false;}
			return true;
		}
		//function to check for valid url pattern
		function checkURL($url) {
			if(!eregi("^http:\/\/", $url)) {return false;}
			return true;
		}

$EMAIL_MAX = 2500;	

if( $_SESSION['captcha_code'] == $_REQUEST['captcha'] && !empty($_SESSION['captcha_code'] ) ) {
		
		$_name = cleanUp($_POST["name"], false, true);

		$_email = cleanUp($_POST["email"], false, false);

		$_message = cleanUp($_POST["message"], true, true);

		$_phone = cleanUp($_POST["phone"], false, true);
		
		$_body = "Hi Rita, Hi Roxana, $_name requested you to contact them at your convenience. Here are their contact details:\n\n";
		
		if($_name){
			$_body .= "NAME: $_name\n\n";
		}
		
		if($_email){
			$_body .= "EMAIL: $_email\n\n";
		}
		
		if($_phone){
			$_body .= "PHONE: $_phone\n\n";
		}
		
		if($_message){
		
			//check length of body, reduce to max chars
			if(strlen($_message) > $EMAIL_MAX){$_message= substr($_message, 0, $EMAIL_MAX);}else{$_message = $_message;}
		}			
		$_text = $_body . $_message;

//removed unnecessary code here

		//now get the recipient(s)
		$_to = "scottc@on3.us";
		
		
		//define the subject
		if(!$_subject){$_subject = "E-Mail from your contact form";}

		
		if(!$_name){$_name = "CONTACT FORM";}
		if(!$_email){$_email = $_name;}
		
		//set the headers
	
		    
    $headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();  
		
					
			//send the email(s)
			mail($_to, $_subject, $_text, $_header);
			
//message returned to calling page upons success
			echo "Email sent. Thank you";

}
else
	{
		//message returned if codes don't match. Also prevents unauthorized use of form.
		echo "Not a valid code"; // invalid code
	}
	?>
