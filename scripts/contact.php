<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function contactMail($name, $email, $subject, $msg){
    

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPSecure='ssl';
    $mail->Port = 465;
    $mail->SMTPAuth=true;

    $mail->Username='company@gmail.com';
    $mail->Password='company'; 

    $mail->addAddress($email);
    $mail->setFrom('company@gmail.com');
    

    $mail->isHTML(true);
    $mail->Subject="$subject - Message From Portfolio Site"; 
    $mail->Body="
    Sent by $name .<br>
    $subject <br><br>
    $msg <br>
    <br><br><br>";

    if(!$mail->send()){
        return $mail->ErrorInfo;
    }else{
        return "We got your message. Thanks again for reaching out!";
    }
}
