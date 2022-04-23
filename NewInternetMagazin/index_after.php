<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link type="image/x-icon" href="/favicon.ico" rel="shortcut icon">
    <link type="Image/x-icon" href="/favicon.ico" rel="icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<!--plugins-->
	<link href="assets/plugins/OwlCarousel/css/owl.carousel.min.css" rel="stylesheet" />
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title>Интернет Магазин</title>
</head>
<body class="bg-theme bg-theme1">	<b class="screen-overlay"></b>
<?php
	require('connect.php');
	if (isset($_POST['username'])&& isset($_POST['password'])){
		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$query="INSERT INTO users (username, password, email) VALUES ('$username',  '$password', '$email')";
		$result=mysqli_query($connection,$query);
		if ($result){
			$msg="Регистрация прошла успешна!";
			echo "<script type='text/javascript'>alert('$msg');</script>";
		}else{
			$fsmsg="Error";
		}
	}

	?>
	<?php
	session_start();
	require('connect.php');
	
	if (isset($_POST['username'])&& isset($_POST['password'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$query="SELECT * FROM users WHERE username='$username' and  password='$password'";
		$result=mysqli_query($connection,$query) or die (mysqli_error($connection));
		$count=mysqli_num_rows($result);

		if ($count==1){
			$_SESSION['username'] = $username;
			$msg="Добро пожаловать! ".$username;
		}else{
			$fsmsg="Ошибка";
		}
	
	}
	if (isset($_SESSION['username'])){
		$username=$_SESSION['username'];		
	}
	?>


<div id="my-alert" class="alert alert-success alert-dismissible fade show" role="alert">
  Вы успешно вошли в систему. Добро пожаловать!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
			<div class="header-content pb-3 pb-md-0" id="header" > </div>
			<div id="shopping"></div>
			
			<div class="primary-menu border-top">
				<div class="container">
					<nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg">
						<div class="offcanvas-header">
							<button class="btn-close float-end"></button>
							<h5 class="py-2 text-white">Навигация</h5>
						</div>
						<ul class="navbar-nav">
							<li class="nav-item active"> <a class="nav-link" href="index.php">Главная страница</a> 
							</li>
							<li class="nav-item dropdown">	<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">Для вас<i class='bx bx-chevron-down'></i></a>
								<div class="dropdown-menu dropdown-large-menu">
									<div class="row">
										<div class="col-md-4">
											<h6 class="large-menu-title">Мужчины</h6>
											<ul class="">
												<li><a href="cart.php"onclick="men()">Футболки</a>
												</li>
												<li><a href="cart.php"onclick="men()">Шорты</a>
												</li>
												<li><a href="cart.php"onclick="men()">Джинсы</a>
												</li>
												<li><a href="cart.php"onclick="Shoes()">Кроссовки</a>
												</li>
												<li><a href="cart.php"onclick="Accessories()">Акссесуары</a>
												</li>
											</ul>
										</div>
										<!-- end col-3 -->
										<div class="col-md-4">
											<h6 class="large-menu-title">Женщины</h6>
											<ul class="">
												<li><a href="cart.php"onclick="Women()">Платья</a>
												</li>
												<li><a href="cart.php"onclick="Women()">Сорочки</a>
												</li>
												<li><a href="cart.php"onclick="Women()">Нижнее белье</a>
												</li>
												<li><a href="cart.php"onclick="Shoes()">Кроссовки</a>
												</li>
												<li><a href="cart.php"onclick="Accessories()">Акссесуары</a>
												</li>
											</ul>
										</div>
										<!-- end col-3 -->
										<div class="col-md-4">
											<div class="pramotion-banner1">
												<img src="assets/images/gallery/menu-img.jpg" class="img-fluid" alt="" />
											</div>
										</div>
										<!-- end col-3 -->
									</div>
									<!-- end row -->
								</div>
								<!-- dropdown-large.// -->
							</li>
							<li class="nav-item dropdown">	<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">Для детей <i class='bx bx-chevron-down'></i></a>
								<div class="dropdown-menu dropdown-large-menu">
									<div class="row">
										<div class="col-md-4">
											<h6 class="large-menu-title">Мальчики</h6>
											<ul class="">
												<li><a  href="cart.php"onclick="Children()">Футболки</a>
												</li>
												<li><a  href="cart.php"onclick="Children()">Шорты</a>
												</li>
												<li><a  href="cart.php"onclick="Children()">Джинсы</a>
												</li>
												</li>
											</ul>
										</div>
										<!-- end col-3 -->
										<div class="col-md-4">
											<h6 class="large-menu-title">Девочки</h6>
											<ul class="">
												<li><a  href="cart.php"onclick="Children()">Платья</a>
												</li>
												<li><a  href="cart.php"onclick="Children()">Сорочки</a>
												</li>
												<li><a  href="cart.php"onclick="Children()">Джинсы</a>
												</li>
												</li>
											</ul>
										</div>
										<!-- end col-3 -->
										<div class="col-md-4">
											<div class="pramotion-banner1">
												<img src="assets/images/gallery/12558705DN_14_f-depositphotos-bgremover.png" class="img-fluid" alt="" />
											</div>
										</div>
										<!-- end col-3 -->
									</div>
									<!-- end row -->
								</div>
								<!-- dropdown-large.// -->
							</li>
							<li class="nav-item"> <a class="nav-link" href="svyaz.php">Обратная связь</a> 
							</li>
							</li>
							<li class="nav-item dropdown">	<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">Мой аккаунт<i class='bx bx-chevron-down'></i></a> 
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#" id="show">Регистрация</a>
          <a class="dropdown-item" href="logouttt.php" action="index.php" >Выйти с аккаунта</a>
        </div>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>


<dialog class="registr">
	<form method="POST">
	<div class="container">
		<h2>Форма регистрации</h2>
		<div class="cl-btn-7" id="close"></div>
		
		<div class="input-container">
		  <i class="fa fa-user icon"></i>
		  <input class="input-field" type="text" placeholder="Name" name="username" required>
		</div>
	  
		<div class="input-container">
		  <i class="fa fa-envelope icon"></i>
		  <input class="input-field" type="email" placeholder="Email" name="email" required>
		</div>
	  
		<div class="input-container">
		  <i class="fa fa-key icon"></i>
		  <input class="input-field" type="password" placeholder="Пароль" name="password" required>
		</div>
	  
		<button type="submit" class="btn" value="Sign Up">Зарегистрироваться</button>
      </div>
	  </form>
	</dialog>

	<script type = text/javascript>
		var dialog = document.querySelector('.registr');
		document.querySelector('#show').onclick = function() {
			dialog.showModal();
		};
		document.querySelector('#close').onclick = function() {
		  dialog.close();
		};
	</script>

		

		<!--end top header wrapper-->
		<!--start slider section-->
		<section class="slider-section">
			<div class="first-slider">
				<div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
					<ol class="carousel-indicators">
						<li data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></li>
						<li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
						<li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active" >
							<div class="row d-flex align-items-center">
								<div class="col d-none d-lg-flex justify-content-center">
									<div class="" >
										<h3 class="h3 fw-light">Женские товары</h3>
										<h1 class="h1">Платье домашнее</h1>
										<p class="pb-3">Стильно, круто, по домашнему</p>
										<div class="" > <a class="btn btn-light btn-ecomm" href="cart.php"onclick="Women()" >Купить сейчас <i class='bx bx-chevron-right'></i></a>
										</div>
									</div>
								</div>
								<div class="col">
									<img src="assets/images/slider/02.png" class="img-fluid" alt="..."  >
								</div>
							</div>
						</div>
						<div class="carousel-item">
							<div class="row d-flex align-items-center">
								<div class="col d-none d-lg-flex justify-content-center">
									<div class="">
										<h3 class="h3 fw-light">Женские товары</h3>
										<h1 class="h1">Платье женское</h1>
										<p class="pb-3">Сказочно красивое, дешевое, подойдет на все случаи жизни...</p>
										<div class=""> <a class="btn btn-white btn-ecomm" href="cart.php" onclick="Women()">Купить сейчас <i class='bx bx-chevron-right'></i></a>
										</div>
									</div>
								</div>
								<div class="col">
									<img src="assets/images/slider/241.png" class="img-fluid" alt="...">
								</div>
							</div>
						</div>
						<div class="carousel-item">
							<div class="row d-flex align-items-center">
								<div class="col d-none d-lg-flex justify-content-center">
									<div class="">
										<h3 class="h3 fw-light">Акссесуары</h3>
										<h1 class="h1">Брендовые кроссовки</h1>
										<p class="pb-3">Стильные, крутые, все в школе будут завидовать</p>
										<div class=""> <a class="btn btn-dark btn-ecomm" href="cart.php" onclick="Shoes()">Купить сейчас <i class='bx bx-chevron-right'></i></a>
										</div>
									</div>
								</div>
								<div class="col">
									<img src="assets/images/slider/03.png" class="img-fluid" alt="...">
								</div>
							</div>
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">	<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</a>
				</div>
			</div>
		</section>
		<!--end slider section-->
				<section class="py-4">
					<div class="container">
						<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
							<div class="col">
								<div class="card rounded-0">
									<div class="row g-0 align-items-center">
										<div class="col">
											<img src="assets/images/promo/01.png" class="img-fluid" alt="" />
										</div>
										<div class="col">
											<div class="card-body">
												<h5 class="card-title text-uppercase">Мужская одежда</h5>
												<p class="card-text text-uppercase">От 200 руб.</p>	<a href="cart.php" class="btn btn-light btn-ecomm" onclick="men()">Купить сейчас</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="card rounded-0">
									<div class="row g-0 align-items-center">
										<div class="col">
											<img src="assets/images/promo/02.png" class="img-fluid" alt="" />
										</div>
										<div class="col">
											<div class="card-body">
												<h5 class="card-title text-uppercase">Женская одежда</h5>
												<p class="card-text text-uppercase">От 500 руб.</p>	<a href="cart.php" class="btn btn-light btn-ecomm" onclick="Women()">Купить сейчас</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="card rounded-0">
									<div class="row g-0 align-items-center">
										<div class="col">
											<img src="assets/images/promo/03.png" class="img-fluid" alt="" />
										</div>
										<div class="col">
											<div class="card-body">
												<h5 class="card-title text-uppercase">Детская одежда</h5>
												<p class="card-text text-uppercase">От 250 руб.</p>	<a href="cart.php" class="btn btn-light btn-ecomm" onclick="Children()">Купить сейчас</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--end row-->
					</div>
				</section>
				<!--end pramotion-->
				<!--start Featured product-->
				<section class="py-4">
					<div class="container">
						<div class="d-flex align-items-center">
							<h5 class="text-uppercase mb-0">Новое поступление</h5>
							<a href="cart.php" class="btn btn-light ms-auto rounded-0">Каталог товаров<i class='bx bx-chevron-right'></i></a>
						</div>
						<hr/>
						<div class="product-grid" id="products"></div>
					</div>
				</section>
				<!--end Featured product-->
				<!--start New Arrivals-->
				<section class="py-4">
					<div class="container">
						<div class="d-flex align-items-center">
							<h5 class="text-uppercase mb-0">Проверенная классика</h5>
							<a href="cart.php"class="btn btn-light ms-auto rounded-0">Посмотреть все<i class='bx bx-chevron-right'></i></a>
						</div>
						<hr/>
						<div class="product-grid" id="products_good">	
						</div>
					</div>
				</section>
				<!--end New Arrivals-->
				<!--start Advertise banners-->
				<section class="py-4">
					<div class="container">
					<h5 class="text-uppercase mb-0">Полезная информация</h5>
					<hr/>
						<div class="add-banner">
							<div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
								<div class="col d-flex">
									<div class="card rounded-0 w-100">
										<img src="assets/images/promo/04.png" class="card-img-top" alt="...">
										<div class="position-absolute top-0 end-0 m-3 product-discount"><span class=""></span>
										</div>
										<div class="card-body">
											<h5 class="card-title">Цвет сезона</h5>
											<p class="card-text">Читайте о самых трендовых цветах в данную эпоху</p> <a href="javascript:;" class="btn btn-light btn-ecomm">Читать</a>
										</div>
									</div>
								</div>
								<div class="col d-flex">
									<div class="card rounded-0 w-100">
										<div class="position-absolute top-0 end-0 m-3 product-discount"><span class=""></span>
										</div>
										<div class="card-body text-center mt-5">
											<h5 class="card-title">Наилучшие сочетания одежды</h5>
											<p class="card-text">Читайте об этом и не только в нашей рубрике "сочетания на каждый сезон" </p> <a href="javascript:;" class="btn btn-light btn-ecomm">Читать</a>
										</div>
										<img src="assets/images/promo/08.png" class="card-img-top" alt="...">
									</div>
								</div>
								<div class="col d-flex">
									<div class="card rounded-0 w-100">
										<img src="assets/images/promo/01.png" class="card-img h-100" alt="...">
										<div class="card-img-overlay text-center top-20">
											<div class="border border-white border-3 py-3 bg-dark-3">
												<h5 class="card-title">Как одеваются знаменитости </h5>
												<p class="card-text text-uppercase fs-1 text-white lh-1 mt-3 mb-2">Читайте о новинках ваших кумиров</p>
												<p class="card-text fs-5">Они вас поразят...</p>	<a href="javascript:;" class="btn btn-white btn-ecomm">Читать</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col d-flex">
									<div class="card rounded-0 w-100">
										<div class="position-absolute top-0 end-0 m-3 product-discount"><span class=""></span>
										</div>
										<div class="card-body text-center">
											<img src="assets/images/promo/02.png" class="card-img-top" alt="...">
											<h5 class="card-title fs-1 text-uppercase">Наши отзывы</h5>
											<p class="card-text text-uppercase fs-4 text-white lh-1 mb-2">Тысячи положительных отзывов</p>
											<p class="card-text">Каждую неделю</p> <a href="javascript:;" class="btn btn-light btn-ecomm">Читать</a>
										</div>
									</div>
								</div>
							</div>
							<!--end row-->
						</div>
					</div>
				</section>
				<!--end Advertise banners-->
				<!--start categories-->
				<section class="py-4">
					<div class="container">
						<div class="d-flex align-items-center">
							<h5 class="text-uppercase mb-0">Все категории</h5>
							<a href="shop-categories.html" class="btn btn-light ms-auto rounded-0">Посмотреть все<i class='bx bx-chevron-right'></i></a>
						</div>
						<hr/>
						<div class="product-grid">
							<div class="browse-category owl-carousel owl-theme">
								<div class="item">
									<div class="card rounded-0 product-card border">
										<div class="card-body">
											<img src="assets/images/categories/01.png" class="img-fluid" alt="...">
										</div>
										<div class="card-footer text-center">
											<h6 class="mb-1 text-uppercase">Брендовые вещи</h6>
											<p class="mb-0 font-12 text-uppercase">10 Вещей</p>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card border">
										<div class="card-body">
											<img src="assets/images/categories/02.png" class="img-fluid" alt="...">
										</div>
										<div class="card-footer text-center">
											<h6 class="mb-1 text-uppercase">Очки</h6>
											<p class="mb-0 font-12 text-uppercase">8 Вещей</p>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card border">
										<div class="card-body">
											<img src="assets/images/categories/03.png" class="img-fluid" alt="...">
										</div>
										<div class="card-footer text-center">
											<h6 class="mb-1 text-uppercase">Обувь</h6>
											<p class="mb-0 font-12 text-uppercase">14 Вещей</p>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card border">
										<div class="card-body">
											<img src="assets/images/categories/04.png" class="img-fluid" alt="...">
										</div>
										<div class="card-footer text-center">
											<h6 class="mb-1 text-uppercase">Сумки</h6>
											<p class="mb-0 font-12 text-uppercase">6 Вещей</p>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card border">
										<div class="card-body">
											<img src="assets/images/categories/people_2_man_jacket_front_white_500-depositphotos-bgremover.png" class="img-fluid" alt="...">
										</div>
										<div class="card-footer text-center">
											<h6 class="mb-1 text-uppercase">Джинс</h6>
											<p class="mb-0 font-12 text-uppercase">6 Вещей</p>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card border">
										<div class="card-body">
											<img src="assets/images/categories/09.png" class="img-fluid" alt="...">
										</div>
										<div class="card-footer text-center">
											<h6 class="mb-1 text-uppercase">Лето</h6>
											<p class="mb-0 font-12 text-uppercase">5 Вещей</p>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card border">
										<div class="card-body">
											<img src="assets/images/categories/07.png" class="img-fluid" alt="...">
										</div>
										<div class="card-footer text-center">
											<h6 class="mb-1 text-uppercase">Для дома</h6>
											<p class="mb-0 font-12 text-uppercase">20 Вещей</p>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card border">
										<div class="card-body">
											<img src="assets/images/categories/08.png" class="img-fluid" alt="...">
										</div>
										<div class="card-footer text-center">
											<h6 class="mb-1 text-uppercase">Украшения</h6>
											<p class="mb-0 font-12 text-uppercase">16 Вещей</p>
										</div>
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!--end categories-->
				<!--start News-->
				<section class="py-4">
					<div class="container">
						<div class="d-flex align-items-center">
							<h5 class="text-uppercase mb-0">Последние новости</h5>
							<a href="blog.html" class="btn btn-light ms-auto rounded-0">Посмотреть все новости<i class='bx bx-chevron-right'></i></a>
						</div>
						<hr/>
						<div class="product-grid">
							<div class="latest-news owl-carousel owl-theme">
								<div class="item">
									<div class="card rounded-0 product-card border">
										<div class="news-date">
											<div class="date-number">24</div>
											<div class="date-month">Oct</div>
										</div>
										<a href="javascript:;">
											<img src="assets/images/blogs/01.png" class="card-img-top border-bottom bg-dark-1" alt="...">
										</a>
										<div class="card-body">
											<div class="news-title">
												<a href="javascript:;">
													<h5 class="mb-3 text-capitalize">Невероятно!</h5>
												</a>
											</div>
											<p class="news-content mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non tellus sem. Aenean...</p>
										</div>
										<div class="card-footer border-top">
											<a href="javascript:;">
												<p class="mb-0"><small class="text-white">5 Comments</small>
												</p>
											</a>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card border">
										<div class="news-date">
											<div class="date-number">24</div>
											<div class="date-month">Oct</div>
										</div>
										<a href="javascript:;">
											<img src="assets/images/blogs/02.png" class="card-img-top border-bottom bg-dark-1" alt="...">
										</a>
										<div class="card-body">
											<div class="news-title">
												<a href="javascript:;">
													<h5 class="mb-3 text-capitalize">Поразительно</h5>
												</a>
											</div>
											<p class="news-content mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non tellus sem. Aenean...</p>
										</div>
										<div class="card-footer border-top">
											<a href="javascript:;">
												<p class="mb-0"><small class="text-white">0 Comments</small>
												</p>
											</a>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card border">
										<div class="news-date">
											<div class="date-number">25</div>
											<div class="date-month">Oct</div>
										</div>
										<a href="javascript:;">
											<img src="assets/images/blogs/03.png" class="card-img-top border-bottom bg-dark-1" alt="...">
										</a>
										<div class="card-body">
											<div class="news-title">
												<a href="javascript:;">
													<h5 class="mb-3 text-capitalize">Это нереально</h5>
												</a>
											</div>
											<p class="news-content mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non tellus sem. Aenean...</p>
										</div>
										<div class="card-footer border-top">
											<a href="javascript:;">
												<p class="mb-0"><small class="text-white">0 Comments</small>
												</p>
											</a>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card border">
										<div class="news-date">
											<div class="date-number">28</div>
											<div class="date-month">Nov</div>
										</div>
										<a href="javascript:;">
											<img src="assets/images/blogs/04.png" class="card-img-top border-bottom bg-dark-1" alt="...">
										</a>
										<div class="card-body">
											<div class="news-title">
												<a href="javascript:;">
													<h5 class="mb-3 text-capitalize">Лидеры продаж</h5>
												</a>
											</div>
											<p class="news-content mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non tellus sem. Aenean...</p>
										</div>
										<div class="card-footer border-top">
											<a href="javascript:;">
												<p class="mb-0"><small class="text-white">0 Comments</small>
												</p>
											</a>
										</div>
									</div>
								</div>
								
								
							</div>
						</div>
					</div>
				</section>			
		<!--start footer section-->
		<section class="py-4">
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-4">
						<div class="footer-text-main">Интернет-магазин</div>
					</div>
					<div class="col-4">						
						<div class="footer-text-main">Мы в соц. сетях</div>
					</div>
					<div class="col-4">
						<div class="footer-text-main">Инфо</div>
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<div class="footer-item">
						<div class="footer-text">Доставка</div>
					</div>
				</div>
					<div class="col-4">
						<div class="footer-item">
							<a class="footer-image" href="#"> 
						<i class="fa fa-vk fa-2x"></i>
							</a>
						<div class="footer-text">ВКонтакте</div>
					</div>
					</div>
					<div class="col-4">
						<div class="footer-item" >
						<div class="footer-text">Контакты</div>
					</div>
				</div>
				</div>
				<div class="row">
					<div class="col-4">
						<div class="footer-item" >
						<div class="footer-text">Оплата</div>
					</div>
				</div>
					<div class="col-4">
						<div class="footer-item">
							<a class="footer-image" href="#">
						<i class="fa fa-facebook-f fa-2x"></i>
							</a>		
						<div class="footer-text">Instagram</div>	
					</div>
				</div>
					<div class="col-4">
						<div class="footer-item">
						<div class="footer-text">Отзывы покупателей</div>
					</div>
				</div>
				</div>
				<div class="row">
					<div class="col-4">
						<div class="footer-item">
						<div class="footer-text">Возврат и обмен</div>
					</div>
				</div>
					<div class="col-4">
						<div class="footer-item">
							<a class="footer-image" href="#">
								<i class="fa fa-facebook-f fa-2x"></i>
							</a>
						<div class="footer-text">Facebook</div>
					</div>
				</div>
					<div class="col-4">
						<div class="footer-item">
						<div class="footer-text">Вопрос-Ответ</div>
					</div>
				</div>
				</div>
				<div class="row">
					<div class="col-4">
						<div class="footer-item">
						<div class="footer-text">Политика конфиденциальности</div>
					</div>
				</div>
					<div class="col-4" >
						<div class="footer-item" href="#">
							<a class="footer-image" href="#">
								<i class="fa fa-instagram fa-2x"></i>
							</a>
						<div class="footer-text">Twitter</div>
					</div>
				</div>
					</div>
					<div class="row">
					<div class="col-4">
						<div class="footer-item">
						<div class="footer-text">Правила</div>
					</div>
				</div>
			</div>
					</div>
					
			</div>
				<div class="last_info">
					<div class="copyright">© 2021 Olegg company  only fun by <span >KAmila and Oleggator </span></div>
				</div>
		</footer>
	</section>
		<!--end footer section-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
	</div>
	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 ">Выберите тему сайта</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<p class="mb-0">Плавная тема</p>
			<hr>
			<ul class="switcher">
				<li id="theme1"></li>
				<li id="theme2"></li>
				<li id="theme3"></li>
				<li id="theme4"></li>
				<li id="theme5"></li>
				<li id="theme6"></li>
			</ul>
			<hr>
			<p class="mb-0">Однотонная тема</p>
			<hr>
			<ul class="switcher">
				<li id="theme7"></li>
				<li id="theme8"></li>
				<li id="theme9"></li>
				<li id="theme10"></li>
				<li id="theme11"></li>
				<li id="theme12"></li>
				<li id="theme13"></li>
				<li id="theme14"></li>
				<li id="theme15"></li>
			</ul>
		</div>
	</div>
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/OwlCarousel/js/owl.carousel.min.js"></script>
	<script src="assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--app JS-->
	<script src="assets/js/root.js"></script>
	<script src="assets/js/LocalStorage.js"></script>
	<script src="assets/js/LocalStorage_nice.js"></script>
	<script src="assets/js/app.js"></script>
	<script src="assets/js/index.js"></script>
	<script src="assets/js/full_catalog.js"></script>
	<script src="assets/js/catalog.js"></script>
	<script src="assets/js/Products.js"></script>
	<script src="assets/js/good_Products.js"></script>
	<script src="assets/js/Header.js"></script>
	<script src="assets/js/Shoping.js"></script>
	<script src="assets/js/Shoping_nice.js"></script>
	<script src="assets/js/uvelichenie.js"></script>
	<script>
    var a = "<?php echo $username; ?>";
	console.log(a);
    document.getElementById("output").innerHTML = a;
	</script>

<script>
  $(function(){
    window.setTimeout(function(){
      $('#my-alert').alert('close');
    },3000);
  });
</script>
<script>
	function men(){
		localStorage.test = 'Men';
	}
</script>
<script>
	function Women(){
		localStorage.test = 'Woman';
	}
</script>
<script>
	function Children(){
		localStorage.test = 'Children';
	}
</script>
<script>
	function Shoes(){
		localStorage.test = 'Shoes';
	}
</script>
<script>
	function Accessories(){
		localStorage.test = 'Accessories';
	}
</script>
</body>

</html>