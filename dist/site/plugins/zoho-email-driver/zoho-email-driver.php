<?php

/**
 * ZOHO mail driver for Kirby CMS
 */
email::$services['zoho'] = function ($email) {
	require_once(__DIR__ . DS . 'phpmailer' . DS .'PHPMailerAutoload.php');
	$mail = new PHPMailer;
	$mail->isSMTP();

	$mail->Host = c::get('email.host');
	$mail->Username = c::get('email.username');
	$mail->Password = c::get('email.password');

	$mail->SMTPSecure = 'ssl';
	$mail->port = 465;


	$mail->setFrom($email->from);
	$mail->addReplyTo($email->replyTo);
	$mail->addAddress($email->to);

	$mail->isHTML(true);

	$mail->Subject = $email->subject;
	$mail->Body = $email->body;

	if (!$mail->send()) {
		var_dump($mail->ErrorInfo);
		//throw new Error('PHPMailer error: ' . $mail->ErrorInfo);
	}
};
