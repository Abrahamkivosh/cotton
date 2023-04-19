<?php
/**
* PHP Mikrotik Billing (www.phpmixbill.com)
* Ismail Marzuqi <iesien22@yahoo.com>
* @version		5.0
* @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
* @license		GNU General Public License version 2 or later; see LICENSE.txt
* @donate		PayPal: iesien22@yahoo.com / Bank Mandiri: 130.00.1024957.4
**/
       
        
require 'system/vendors/phpmail/Exception.php';
require 'system/vendors/phpmail/PHPMailer.php';
require 'system/vendors/phpmail/SMTP.php'; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

Class EmailSend{

    public static function _smtp($_c,$to,$subject,$message,$attached=""){
        
        
        
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        
        try {
           
            //Server settings
          //  $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = $_c['smtp'] ;                    //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $_c['email'];                    //SMTP username
            $mail->Password   = $_c['password'];                            //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = $_c['port'];                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
                $address = $to;
                $mail->SetFrom($_c['email'], "");
                $mail->AddAddress($address, "");
                $mail->AddReplyTo($_c['email'],"");
                
        
            //Attachments
             if(!empty($attached)) {
                    $mail->AddAttachment($attached);
             }
        
          
            $body='<html><body>'.$message.'</body></html>';
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
            
            $mail->send();
       
        } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
       
    }
}
