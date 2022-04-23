<!doctype html>
<html lang="ru">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Оформление заказа</title>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<section class="oformlenie">
    <div class="container">        
        <form class="form_body" action="#" id="form" class="form-horizontal ">
            <h2 class="oformlen">Оформление покупки</h2>
            <br></br>
            <a class="again "href="index_after.php">
            Вернуться за покупками!
            </a>
            <br></br>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Ваше имя *</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control _req" id="name" name="name" placeholder="Ваше имя">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email *</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control _req _email" id="email" name="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="col-sm-2 control-label">Телефон *</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control _req" id="phone" name="phone" placeholder="Телефон">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Способ доставки</label>

                <div class="col-sm-4">
                    <div class="radio">
                        <label><input type="radio"  class="js-delivery-type" data-type="Самовывоз" data-summa="0" id="sam" checked>Самовывоз</label>
                    </div>
                </div>
                    <div class="radio">
                        <label><input type="radio"  class="js-delivery-type" data-type="Почта России" data-summa="300" id="pochta">Доставка почтой </label>
                    </div>
            </div>
            <div class="form-group">
                <label for="address" class="col-sm-2 control-label">Адрес доставки</label>
                <div class="col-sm-6">
                    <textarea class="form-control" id="address" name="address" placeholder="Адрес доставки" row="3"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="message" class="col-sm-2 control-label">Сообщение</label>
                <div class="col-sm-6">
                    <textarea class="form-control" id="message" name="message" placeholder="Дополнительная информация" row="3"></textarea>

                    <div id="alert-validation" class="alert alert-danger hidden">
                        <button type="button" class="close js-close-alert">&times;</button>
                        <strong>Ошибка!</strong> Заполните обязательные поля, отмеченные *
                    </div>
                    <div id="alert-order-done" class="alert alert-success hidden">
                        <button type="button" class="close js-close-alert">&times;</button>
                        <strong>Спасибо за заказ!</strong> Скоро мы с Вами свяжемся
                    </div>
                </div>
            </div>
            <div class="form-group">
            <div class="col-sm-offset-2 col-sm-6">
                    Сумма заказа:    
                    </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <button type="submit" class="btn  btn-light">Отправить заказ</button>
                </div>
                
            </div>
            
        </form>
    </div>
</section>
	<script src="assets/js/root.js"></script>
	<script src="assets/js/LocalStorage.js"></script>
	<script src="assets/js/LocalStorage_nice.js"></script>
	<script src="assets/js/catalog.js"></script>
	<script src="assets/js/Shoping.js"></script>
	<script src="assets/js/Shoping_nice.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>