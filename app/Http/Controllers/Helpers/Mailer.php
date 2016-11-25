<?php
namespace App\Http\Controllers\Helpers;
//Capitalize Helper
trait mailer {
	public function sendEmail($subject,$content,$pdf)
	{
		$mail = new \PHPMailer();



	$current_user_name = "Mike";
	$current_user_email = "mikecornille@gmail.com";

	$mail->IsSMTP();
	$mail->Host       = env('MAIL_HOST');
	$mail->Port       = env('MAIL_PORT');
	$mail->SMTPAuth   = true;
	$mail->SMTPSecure = env('MAIL_ENCRYPTION');
	$mail->Username   = env('MAIL_USERNAME');
	$mail->Password   = env('MAIL_PASSWORD');
	$mail->SetFrom(env('MAIL_USERNAME'), "ITS Operations"); 
	$mail->AddReplyTo($current_user_email, $current_user_name);
	$mail->AddAddress($current_user_email, $current_user_name);
	$mail->isHTML(true);
	$mail->WordWrap = 50;
	$mail->AddAttachment($pdf);
	$mail->Subject    = $subject;
	$mail->Body       = $content;
	$mail->Send();
	}
	
}