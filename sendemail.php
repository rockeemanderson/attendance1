<?php 
require 'vendor/autoload.php';

class sendEmail{

    public static function sendMail($to,$subject,$content){
        $key ='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';

        $email= new \SendGrid\Mail\Mail();
        $email->setFrom("anderson.rockeem@gmail.com", "Rockeem Anderson");
        $email->setSubject($subject);
        $email->addTo($to);
        $email->addContent("text/html", $content);

        $sendgrid = new \SendGrid($key);

        try{
            $response = $sendgrid->send($email);
            return $response;


        }catch(Exception $e){
            echo 'Email exception caught: '.$e->getMessage(). "\n";
        }

    }
}


?>