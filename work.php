<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ANS qgg webserver</title>
<link href="/css/web.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
?>

<!-- check&save data -->
<?php
$user_email = $_POST['user_email'];
if (!empty ($_FILES['inputfile']['name'])){
    $fileinfo=$_FILES['inputfile'];
    $type=strstr($fileinfo['name'],'.');
    if($type!=".txt" and $type!=".TXT"){
        echo "<script type=\"text/javascript\"> alert ('Input file type is not allowed!'); window.location.href='/index.php'; </script>";
    }else{
        $tmp_file = $_FILES ['inputfile']['tmp_name'];
        $savePath = 'uploads/';
        $str = date('Ymdhis').rand(10,99); 
        $inputfile = $savePath.$str;
        copy($tmp_file,$inputfile);
    }
};
?>

<!-- run imputation asynchronously-->
<?php
$outPath = 'output/';
$outputfile = $outPath.$str;
copy($inputfile,$outputfile);
?>

<!-- email the result file link -->
<?php
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.exmail.qq.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'zhangf@mail.sustech.edu.cn';                     // SMTP username
    $mail->Password   = 'jngoU3SMDK6vkW75';                               // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('zhangf@mail.sustech.edu.cn', 'qgg-webserver');
    $mail->addAddress('zhangf37@msu.edu', 'Fei Zhang');     // Add a recipient
//    $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('zhangf@mail.sustech.edu.cn', 'qgg-webserver');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

    // Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Genotype imputation result';
    $mail->Body    = '<a href=http://35.10.104.178/'.$outputfile.'> http://35.10.104.178/'.$outputfile.'</a></br><a href=http://35.10.104.178/'.$inputfile.'> http://35.10.104.178/'.$inputfile.'</a>';
    $mail->AltBody = 'http://35.10.104.178/'.$outputfile;

    $mail->send();
    echo 'Message has been sent';
	echo "<script type=\"text/javascript\">alert ('Your job has been scheduled.'); window.location.href='/index.php'; </script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
};

?>


</body>
</html>
