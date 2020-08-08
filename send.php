<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$email=$_POST['email'];

if (($name=='') and ($phone=='') and ($message=='')) {
    // Формирование подписки на новости
    $title = "BestTourPlan - подписка на новости";
    $body = "
    <h2>Новая подписка на новости</h2>
    <b>e-mail:</b> $email<br>";
} else {

    // Формирование самого письма
    $title = "BestTourPlan - новое обращение";
    $body = "
    <h2>Новое обращение</h2>
    <b>Имя:</b> $name<br>
    <b>Телефон:</b> $phone<br><br>
    <b>Сообщение:</b><br>$message
    ";
}

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
    $mail->Username   = 'dmitriiwebstart@gmail.com'; // Логин на почте
    $mail->Password   = '~mn~kj8k'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('dmitriiwebstart@gmail.com', 'Дмитрий Коротов'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('ivptrvtv@yandex.ru');  
    
    // Отправка сообщения
    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $body;    

    // Проверяем отравленность сообщения
    if ($mail->send()) {$result = "success";} 
    else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

header('Location: thankyou.html');

