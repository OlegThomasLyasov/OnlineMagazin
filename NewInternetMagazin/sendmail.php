<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/Exception.php';
    
    $mail = new PHPMailer(true);
    $mail->CharSet = "UTF-8";
    $mail->setLanguage('ru', 'phpmailer/language/');
    $mail->isHTML(true);


    $mail->setFrom('oleg.kamilab@gmail.com', 'oleg.kamilab@gmail.com'); // Адрес самой почты и имя отправителя

    $mail->Subject = 'Здравствйте!';
    
    // Формирование самого письма
    $body = '<h1>Новое письмо! Здравствуйте, ваш заказ успешно оформлен. Скоро с вами свяжутся для уточнения деталей</h1>';
    
    if (trim(!empty($_POST['name']))){
        $body.='<p><strong>Имя: </strong> '.$_POST['name']. '</p>';
    }
    if (trim(!empty($_POST['email']))){
        $body.='<p><strong>E-mail: </strong> '.$_POST['email']. '</p>';
    }
    if (trim(!empty($_POST['message']))){
        $body.='<p><strong>Сообщение: </strong> '.$_POST['message']. '</p>';
    }
    if (trim(!empty($_POST['phone']))){
        $body.='<p><strong>Контактный телефон: </strong> '.$_POST['phone']. '</p>';
    }
    if (trim(!empty($_POST['address']))){
        $body.='<p><strong>Адрес доставки: </strong> '.$_POST['address']. '</p>';
    }

    $mail->addAddress($_POST['email']);  

    $mail->addAddress('oleg.kamilab@gmail.com'); 

    $mail ->Body =$body;

    if (!$mail->send()){
        $message = 'Ошибка';
    }else{
        $message = 'Данные успешно отправлены. Спасибо за заказ!';
    }

    $response = ['message'=>$message];

    header('Content-type: application/json');
    echo json_encode($response);

?>