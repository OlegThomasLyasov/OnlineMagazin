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
			
			<div class="header-content pb-3 pb-md-0" id="header" > 
			</div>
			
			<div id="shopping"></div>
			
			<div class="primary-menu border-top">
				<div class="container">
					<nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg">
						<div class="offcanvas-header">
							<button class="btn-close float-end"></button>
							<h5 class="py-2 text-white">Навигация</h5>
						</div>
						<ul class="navbar-nav">
							<li class="nav-item active"> <a class="nav-link" href="index_after.php">Главная страница</a> 
							</li>
							<li class="nav-item"> <a class="nav-link" href="svyaz.php">Обратная связь</a> 
							</li>
							</li>
							<li class="nav-item dropdown">	<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown" id="output" >Мой аккаунт<i class='bx bx-chevron-down'></i></a> 
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
		  <input class="input-field" type="text" placeholder="Имя пользователя" name="username" required>
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

				<section class="py-4">
					<div class="container">
						<div class="d-flex align-items-center">
							<h5 class="text-uppercase mb-0">Каталог товаров</h5>
						</div>
						<hr/>
						
						<div class="product-grid" id="products_full"></div>
					</div>
				</section>				
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
					</div>
			</div>
				<div class="last_info">
					<div class="copyright">© 2021 Olegg company  only fun by <span >Oleggator</span></div>
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
		<!--end footer section-->
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
	
	<script src="assets/js/full_root.js"></script>
	<script src="assets/js/LocalStorage.js"></script>
	<script src="assets/js/LocalStorage_nice.js"></script>
	<script src="assets/js/app.js"></script>
	<script src="assets/js/index.js"></script>
	<script src="assets/js/full_catalog.js"></script>
	<script src="assets/js/full_Products.js"></script>
	<script src="assets/js/Header.js"></script>
	<script src="assets/js/full_Shoping.js"></script>
	<script src="assets/js/Shoping_nice.js"></script>
	<script src="assets/js/uvelichenie.js"></script>
	<script src="assets/js/perehod.js"></script>
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


</body>

</html>