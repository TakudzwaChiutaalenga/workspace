<?php
    $feedback="";
    
    if(isset($_POST['submit'])){
        require 'forms/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port= 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure ='tls';
        $mail->Username = 'takudzwachiutaalenga@gmail.com';
        $mail->Password= '*****************';

        $mail->setFrom($_POST['email'],$_POST['name']);
        $mail->addAddress('takudzwachiutaalenga@gmail.com');

        $mail->Subject = 'Subject: '.$_POST['subject'];
        $mail->Body = 'Message from: '.$_POST['name'].'\nEmail: '.$_POST['email'].'\n\nMessage: '.$_POST['message'];

        if(!$mail->send()){
            $feedback = "<h3 style='color: red'>Something went wrong. Please try again</h3>";
            
        }else{
            $feedback = "<h3 style='color: green'>Thank you ".$_POST['name']." for contacting us. We'll get back to you soon!</h3>";
            $_POST['subject']='';
            $_POST['name']='';
            $_POST['email']='';
            $_POST['message']='';

        }
    }
?>