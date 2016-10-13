<?php

/**
 * ZOHO mail driver for Kirby CMS
 */
email::$services['zoho'] = function ($email) {
	var_dump($email);
	exit;
	require_once(__DIR__ . DS . 'phpmailer' . DS .'class.phpmailer.php');
	$mail = new PHPMailer;
	$mail->isSMTP();

	$mail->Host = 'smtp.zoho.com';
	$mail->Username = 'hello@gyu.nu';
	$mail->Password = 'Mab6lw12';

	$mail->SMTPSecure = 'ssl';
	$mail->port = 465;


	$mail->setFrom($email->from);
	$mail->addReplyTo($email->replyTo);
	$mail->addAddress($email->to);

	$mail->isHTML(true);

	$mail->Subject = $email->subject;
	$mail->Body = $email->body;

	if (!$mail->send()) {
		echo $mail->ErrorInfo;
		throw new Error('PHPMailer error: ' . $mail->ErrorInfo);
	}
};
