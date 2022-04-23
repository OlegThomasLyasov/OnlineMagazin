class Header {
	
    handlerOpenShoppingPage() {
        shoppingPage.render();
    }

	handlerOpenShoppingPage2() {
        shoppingPage2.render();
    }

    render(count) {
        const html = `
        <div class="container">
					<div class="row align-items-center">
						<div class="col col-md-auto">
							<div class="d-flex align-items-center">
								<div class="mobile-toggle-menu d-lg-none px-lg-2" data-trigger="#navbar_main"><i class='bx bx-menu'></i>
								</div>
								<div class="logo d-none d-lg-flex">
									<a href="index.html">
										<img src="assets/images/pngegg.png" class="logo-icon" alt="" />
									</a>
								</div>
							</div>
						</div>
						<div class="col-12 col-md order-4 order-md-2">
							<div class="input-group flex-nowrap px-xl-4">
								<input type="text" class="form-control w-100" placeholder="Поиск товаров">
							</div>
						</div>
						
						<div class="col col-md-auto order-3 d-none d-xl-flex align-items-center">
							<div class="fs-1 text-white"><i class='bx bx-headphone'></i>
							</div>
							<div class="ms-2">
							<p class="mb-0 font-13"><a href="svyaz.php">Свяжитесь с нами!</a></p>
								<h5 class="mb-0">+7 919 14 16 206</h5>
							</div>
						</div>
						
						<div class="col col-md-auto order-2 order-md-4">
							<div class="top-cart-icons">
								<nav class="navbar navbar-expand">
									<ul class="navbar-nav ms-auto">
										<li class="nav-item"><a href="javascript:;" class="nav-link cart-link"><i class='bx bx-user' id="show2"></i></a>
										</li>
										<li class="nav-item"><a href="javascript:;" onclick="headerPage.handlerOpenShoppingPage2();" class="nav-link cart-link"><i class='bx bx-heart'></i></a>
										</li>
										<li class="nav-item " >
                                        <a class="nav-link position-relative cursor-pointer cart-link"  onclick="headerPage.handlerOpenShoppingPage();"><span class="alert-count">${count}</span>
                                        <i class='bx bx-shopping-bag'></i></a>
										<div class="dropdown-menu dropdown-menu-end">
												
												<div class="cart-list">	
												</div>
												
											</div>
										</li>
									</ul>
								</nav>
							</div>
						</div>
                        
					</div>
				</div>
        
        `;

        ROOT_HEADER.innerHTML = html;
    }
};

const headerPage = new Header();
const productStore=localStorageUtil.getProducts();
headerPage.render(productStore.length);


var dialog = document.querySelector('.registr');
document.querySelector('#show2').onclick = function() {
			dialog.showModal();
		};
		document.querySelector('#close').onclick = function() {
		  dialog.close();
		};
