#!/usr/bin/php
<?php
if(in_array("--module", $_SERVER['argv'])&&in_array("--status", $_SERVER['argv'])&&count($_SERVER['argv'])==5)
{
	require_once('class.phpmailer.php');
	$module = $_SERVER['argv'][2];
	$status = $_SERVER['argv'][4];
	echo "Sending your mail!! $module, $status";
	
	$mail             = new PHPMailer(); // defaults to using php "mail()"
		$body             = "Hello , <br /><br /> We want to inform you that the module <i>$module</i> has changed it status to <i>$status</i>. <br /> <br /> Yours sincerely, <br /> <br />The Daemon";
		$body             = eregi_replace("[\]",'',$body);
		
		$mail->AddReplyTo('', 'Do Not Reply');
		$mail->SetFrom('', 'Daemon Master');
		
		$address = "";
		$mail->AddAddress($address, "");
		
		$mail->Subject    = "$module changed to $status";
		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
		$mail->MsgHTML($body);

		
		if(!$mail->Send()) {
		  echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		  echo "Message sent!";
		}

}
else
{
	echo "error";
}