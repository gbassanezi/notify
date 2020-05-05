<?php

namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Email
{
   private $mail = \stdClass::class;

   public function __construct()
   {  
      /* $this faz referencia a classe, o objeto da classe */
      $this->mail = new PHPMailer(true);
      //Server settings
      $this->mail->SMTPDebug = 1; //SMTP::DEBUG_SERVER;                      // Enable verbose debug output
      $this->mail->isSMTP();                                            // Send using SMTP
      $this->mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
      $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $this->mail->Username   = 'meuemail@gmail.com';                     // SMTP username
      $this->mail->Password   = 'minhasenha';                               // SMTP password
      $this->mail->SMTPSecure = 'tls';    //PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $this->mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
      $this->mail->CharSet = 'utf-8';
      $this->mail->setLanguage('br');
      $this->mail->isHTML(true);
      //Quem está enviado o e-mail
      $this->mail->setFrom('meuemail@gmail.com', 'Teste de envio');

   }

   public function sendmail($subject, $body, $replyEmail, $replyName, $addressEmail, $addressName)
   {
      $this->mail->Subject = (string)$subject;
      $this->mail->Body = $body;

      /*  */
      $this->mail->addReplyTo($replyEmail, $replyName);
      $this->mail->addAddress($addressEmail, $addressName);

      try{
         $this->mail->send();
      }catch(Exception $exception){
         echo "Erro ao enviar e-mail : {$this->mail->ErrorInfo} {$exception->getMessage()}";
         var_dump($exception);
      }

      echo "E-mail enviado!";
   }
}
