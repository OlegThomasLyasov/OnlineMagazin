class Products3{
    constructor(){
        this.labelAdd='Добавить в корзину';
        this.labelRemove='Удалить из корзины';
        this.classNameActive = 'product-wishlist_active';

    }
  
    handlerSetLocatStorage(element, id) {
        const { pushProduct, products } = localStorageUtil.putProducts(id);

        if (pushProduct) {
            alert("Товар успешно добавлен!");

        } else {
            alert("Товар исключен.");   
        }

        headerPage.render(products.length);
    }

    handlerSetLocatStorage2(element, id) {
        const { pushProduct, products2 } = localStorageUtil2.putProducts(id);
        let activeClass='';
        if (pushProduct) {
            element.classList.add(this.classNameActive);
            

        } else {
            element.classList.remove(this.classNameActive); 
        } 
        productsPage3.render();
    }

    render(){
        const productsStore = localStorageUtil.getProducts();
        const productsStore2 = localStorageUtil2.getProducts();
        let htmlCatalog='';
        FULL_CATALOG.forEach(({id,kategory,name,price,img})=>{
            let activeClass='';
            let activeText='';
            activeText=this.labelAdd;
            if (productsStore2.indexOf(id) === -1) {
                activeText = this.labelAdd;
            } else {
                activeClass = ' ' + this.classNameActive;
            }
            htmlCatalog+=`
                                <div class="item" >
									<div class="card rounded-0 product-card">
										<div class="card-header bg-transparent border-bottom-0">
											<div class="d-flex align-items-center justify-content-end">
												<a onclick="productsPage3.handlerSetLocatStorage2(this, '${id}');">
													<div class="product-wishlist${activeClass}"> <i class='bx bx-heart'></i>
													</div>
												</a>
											</div>
										</div>
										<a >
											<img src="${img}" class="card-img-top" alt="...">
										</a>
										<div class="card-body">
											<div class="product-info">
												<a >
													<p class="product-catergory font-13 mb-1">${kategory}</p>
												</a>
												<a >
													<h6 class="product-name mb-2">${name}</h6>
												</a>
												<div class="d-flex align-items-center">
													<div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">700 руб.</span>
														<span class="text-white fs-5">${price.toLocaleString()} руб.</span>
													</div>
													<div class="cursor-pointer ms-auto">	<span>5.0</span>  <i class="bx bxs-star text-white"></i>
													</div>
												</div>
												<div class="product-action mt-2">
													<div class="d-grid gap-2">
														<button href="javascript:;" class="btn btn-light btn-ecomm " onclick="productsPage3.handlerSetLocatStorage(this, '${id}');"> <i class='bx bxs-cart-add'></i>${activeText}</button> <a href="javascript:;" class="btn btn-link btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class='bx bx-zoom-in'></i>Увеличить</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
            `;
        });

        const html =`
        <div class="new-arrivals owl-carousel owl-theme">
                ${htmlCatalog}
            </div>
        `;

        ROOT_PRODUCTS2.innerHTML=html;
        
    }
}

const productsPage3= new Products3();
productsPage3.render();