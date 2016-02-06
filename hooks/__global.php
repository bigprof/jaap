<?php
	/**
	 * @file
	 * This file contains hook functions that get called when a new member signs up, 
	 * when a member signs in successfully and when a member fails to sign in.
	*/

	/**
	 * This hook function is called when a member successfully signs in. 
	 * It can be used for example to redirect members to specific pages rather than the home page, 
	 * or to save a log of members' activity, ... etc.
	 * 
	 * @param $memberInfo
	 * An array containing logged member's info
	 * @see http://bigprof.com/appgini/help/working-with-generated-web-database-application/hooks/memberInfo
	 * 
	 * @param $args
	 * An empty array that is passed by reference. It's currently not used but is reserved for future uses.
	 * 
	 * @return
	 * A string containing the URL to redirect the member to. It can be a relative or absolute URL. 
	 * If the return string is empty, the member is redirected to the homepage (index.php).
	*/
	
	/* define mail constants */
	define("SMTP_SERVER","smtp.gmail.com");
	define("SMTP_USER","workappgini@gmail.com");
	define("SMTP_PASSWORD","123456789app");
	define("SMTP_SECURE","ssl");
	define("SMTP_PORT",465);
	define("SMTP_FROM","workappgini@gmail.com");
	
	/* include phpmailer library */
	require("phpmailer/PHPMailerAutoload.php");


    /**
	 * This hook function is called when send mail.
	 **/
	function smtp_mail($to, $subject, $message){
		$mail = new PHPMailer();

		$mail->IsSMTP();  // telling the class to use SMTP
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->SMTPDebug = 3;                               // Enable verbose debug output

		
		$mail->Username = SMTP_USER;                 				// SMTP username
		$mail->Password = SMTP_PASSWORD;                           // SMTP password

		$mail->SMTPSecure = SMTP_SECURE;                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = SMTP_PORT;                                    // TCP port to connect to


		$mail->Host     = SMTP_SERVER; // SMTP server
		$mail->setFrom     = SMTP_FROM;
		
		/* send to */
		$mail->AddAddress($to);
		

		$mail->Subject  = $subject;
		$mail->Body     = $message;
	
		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
			return FALSE;
		} 
		
		echo 'Message has been sent';
		return TRUE;
		
	}
	
	function login_ok($memberInfo, &$args){

		return '';
	}

	/**
	 * This hook function is called when a login attempt fails.
	 * It can be used for example to log login errors.
	 * 
	 * @param $attempt
	 * An associative array that contains the following members:
	 * $attempt['username']: the username used to log in
	 * $attempt['password']: the password used to log in
	 * $attempt['IP']: the IP from wihich the login attempt was made
	 * 
	 * @param $args
	 * An empty array that is passed by reference. It's currently not used but is reserved for future uses.
	 * 
	 * @return
	 * None.
	*/

	function login_failed($attempt, &$args){

	}

	/**
	 * This hook function is called when a new member signs up.
	 * 
	 * @param $memberInfo
	 * An array containing logged member's info
	 * @see http://bigprof.com/appgini/help/working-with-generated-web-database-application/hooks/memberInfo
	 * 
	 * @param $activity
	 * A string that takes one of the following values:
	 * 'pending': 
	 *     Means the member signed up through the signup form and awaits admin approval.
	 * 'automatic':
	 *     Means the member signed up through the signup form and was approved automatically.
	 * 'profile':
	 *     Means the member made changes to his profile.
	 * 'password':
	 *     Means the member changed his password.
	 * 
	 * @param $args
	 * An empty array that is passed by reference. It's currently not used but is reserved for future uses.
	 * 
	 * @return
	 * None.
	*/

	function member_activity($memberInfo, $activity, &$args){
		switch($activity){
			case 'pending':
				break;

			case 'automatic':
				break;

			case 'profile':
				break;

			case 'password':
				break;

		}
	}
