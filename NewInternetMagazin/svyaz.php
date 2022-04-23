<!doctype html>
<html lang="ru">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Оформление заказа</title>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/css/style2.css">
</head>
<body>
    <div class="container"> 

    <div class="main-text"> Форма обратной связи</div>
<a class="again "href="index_after.php">
            Вернуться за покупками!
 </a>
 <br></br>
<form action='svyaz.php' method="post">
<p> Ваше имя: *</p>
<input type="text" name="fnm" value="">
<p> Сообщение: </p>
<textarea name="text"></textarea>
<p> E-Mail: *</p>
<input type="text" name="email" value="">
<p> Контактный телефон: *</p>
<input type="text" name="phone" value="">
<p> Введите сумму 16+15: *</p>
<input type="text" name="summa" id='summa' value=""><br>
<input type="hidden" name="hidden" value="ok">
<input type="submit" value="Отправить" name="Submit" onClick="return Formdata(this.form)">
                    <div id="alert-validation" class="alert alert-danger hidden">
                        <button type="button" class="close js-close-alert">&times;</button>
                        <strong>Ошибка!</strong> Заполните обязательные поля, отмеченные *
                    </div>
                    <div id="alert-order-done" class="alert alert-success hidden">
                        <button type="button" class="close js-close-alert">&times;</button>
                        <strong>Спасибо, что делаете нас лучше!</strong> Скоро мы с Вами свяжемся.
                    </div>
                    <img src="assets/images/protect.svg" class="img-top" alt="...">
</form>


									


    <script src="assets/js/otpravka.js"></script>
	<script src="assets/js/root.js"></script>
	<script src="assets/js/LocalStorage.js"></script>
	<script src="assets/js/LocalStorage_nice.js"></script>
	<script src="assets/js/catalog.js"></script>
	<script src="assets/js/Shoping.js"></script>
	<script src="assets/js/Shoping_nice.js"></script>
    
</body>
</html>


<?php
if(@$_POST["hidden"])
{
$dt=date("d F Y, H:i:s"); // дата и время
$mail="oleg.kamilab@gmail.com"; // e-mail куда уйдет письмо
$title="Мы получили ваш отзыв. Служба поддержки свяжется с вами в ближайшее время"; // заголовок(тема) письма

$fnm=$_POST["fnm"];
$fnm=htmlspecialchars($fnm); // обрабатываем

$text=$_POST["text"];
$text=htmlspecialchars($text); // обрабатываем
$text=str_replace("\r\n","<br>",$text); // обрабатываем

$email=$_POST["email"];
$phone=$_POST["phone"];

$mess="<b>Имя:</b> $fnm<br>";
$mess.="<b>Сообщение:</b> $text<br>";
// ссылка на e-mail
$mess.="<b>E-Mail:</b> <a href='mailto:$email'>$email</a><br>";
$mess.="<b>Телефон:</b> $phone<br>";
$mess.="<b>Дата и Время:</b> $dt";

$headers="MIME-Version: 1.0\r\n";
$headers.="Content-type: text/html; charset=UTF-8\r\n"; //кодировка
$headers.="From: oursite.ru\r\n"; // откуда письмо (необязательнакя строка)

mail($email, $title, $mess, $headers); // отправляем письмо
mail($mail, $title, $mess, $headers); // отправляем письмо

// выводим уведомление и перезагружаем страничку
print"
<script language='Javascript' type='text/javascript'>
alert ('Ваше сообщение отправлено! Спасибо!');
function reload()
{location = \"index_after.php\"};
setTimeout('reload()', 0);
</script>";
}
?>
