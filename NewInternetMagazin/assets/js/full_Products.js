class Products{
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
        
        if (pushProduct) {

            element.classList.add(this.classNameActive);
        } else {
            
            element.classList.remove(this.classNameActive); 
        }
        productsPage.render();
    }

   render(){
        const productsStore = localStorageUtil.getProducts();
        const productsStore2 = localStorageUtil2.getProducts();
        let htmlCatalog='';
        FULL_CATALOG.forEach(({id,kategory,name,price,sec_price,img})=>{
            let activeClass='';
            let activeText='';
            activeText=this.labelAdd;
            if (productsStore2.indexOf(id) === -1) {
                activeText = this.labelAdd;
            } else {
                activeClass = ' ' + this.classNameActive;
            }
            htmlCatalog+=` 
            <div class="cardd ${kategory}" data-price="${price}"> 
            <div class="col ">
            <div class="card rounded-0 product-card">
                <div class="card-header bg-transparent border-bottom-0">
                    <div class="d-flex align-items-center justify-content-end gap-3">
                        <a href="javascript:;" onclick="productsPage.handlerSetLocatStorage2(this, '${id}');">
                            <div class="product-wishlist${activeClass}"> <i class='bx bx-heart'></i>
                            </div>
                        </a>
                    </div>
                </div>
                <a >
                    <img src="${img}" class="card-img-top" alt="...">
                </a>
                <div class="card-body" data-id=${id}>
                    <div class="product-info">
                        <a href="javascript:;">
                            <p class="product-catergory font-13 mb-1 ">${kategory}</p>
                        </a>
                        <a href="javascript:;">
                            <h6 class="product-name mb-2">${name}</h6>
                        </a>
                        <div class="d-flex align-items-center">
                            <div class="mb-1 product-price">	<span class="me-1 text-decoration-line-through">${sec_price} руб.</span>
                                <span class="text-white fs-5">${price.toLocaleString()} руб.</span>
                            </div>
                            
                        </div>
                        <div class="product-action mt-2">
                            <div class="d-grid gap-2">
                                <button class="btn btn-light btn-ecomm" onclick="productsPage.handlerSetLocatStorage(this, '${id}');" <i class='bx bxs-cart-add'></i>${activeText}</button>	
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
            `;
        });

        const html =`
        <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn">Категории товаров</button>
        <div id="myDropdown" class="dropdown-content">
        <div class="filter">
        <div class="row">
        <div class="col col-md-auto order-2 order-md-4">
                <button class="button shine-button" data-filter="all">Все товары</button>
                <button class="button shine-button" data-filter="Men">Мужская одежда</button>
                <button class="button shine-button" data-filter="Woman">Женская одежда</button>
                <button class="button shine-button" data-filter="Children">Детская одежда</button>
                <button class="button shine-button" data-filter="Accessories" >Аксессуары</button>
                <button class="button shine-button" data-filter="Shoes">Обувь</button>
        </div>
        </div>
        </div>
        </div>
        <div class="dropdown">
        <button onclick="myFunction2()" class="dropbtn">Сортировка товаров</button>
        <div id="myDropdown2" class="dropdown-content">
        <div class="row">
        <div class="col col-md-auto order-2 order-md-4">
        <button onclick="sortListDir()" class="button shine-button" >По алфавиту</button>
        <button onclick="sortListDir2()" class="button shine-button" >По возрастанию цены</button>
        <button onclick="sortListDir22()" class="button shine-button" >По убыванию цены</button>
        <button onclick="sortListDir3()" class="button shine-button" >По категориям товаров</button>  
        </div>
        </div>
        </div>
        </div>
            <div class="product-grid">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                ${htmlCatalog}
                </div>
            </div>
        `;

        ROOT_PRODUCTS.innerHTML=html;
        app();
        
    }
    
}

const productsPage= new Products();
productsPage.render();

/* Когда пользователь нажимает на кнопку,
переключение между скрытием и отображением раскрывающегося содержимого */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Закройте выпадающее меню, если пользователь щелкает за его пределами
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }

  function myFunction2() {
    document.getElementById("myDropdown2").classList.toggle("show");
  }
  
  // Закройте выпадающее меню, если пользователь щелкает за его пределами
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }

function sortListDir(){

    FULL_CATALOG.sort(function(a, b){
    var nameA=a.name.toLowerCase(), nameB=b.name.toLowerCase()
    if (nameA < nameB) //сортировка по возрастанию
      return -1
    if (nameA > nameB)
      return 1
    return 0 
    })
    productsPage.render();
}

function sortListDir2(){
    FULL_CATALOG.sort(function(a, b){
        var nameA=a.price, nameB=b.price;
        if (nameA < nameB) //сортировка по возрастанию
          return -1
        if (nameA > nameB)
          return 1
        return 0 
        })
        productsPage.render();
    }

function sortListDir22(){
        FULL_CATALOG.sort(function(a, b){
            var nameA=a.price, nameB=b.price;
            if (nameA > nameB) //сортировка по убыванию
              return -1
            if (nameA < nameB)
              return 1
            return 0 
            })
            productsPage.render();
}


function sortListDir3(){
        FULL_CATALOG.sort(function(a, b){
            var nameA=a.kategory, nameB=b.kategory
            if (nameA < nameB) //сортировка по возрастанию
              return -1
            if (nameA > nameB)
              return 1
            return 0 
    
            })
            productsPage.render();
        }


function app(){
     const buttons = document.querySelectorAll('.button');
     const boxs = document.querySelectorAll('.cardd');
     function filter(category,items){
         items.forEach((item)=>{
             const isItemFilter = !(item.classList.contains(category));
             const isShowAll = category === 'all';
             
             if (isItemFilter && !isShowAll){
                 item.classList.add('hide');
                 
             }else{
                item.classList.remove('hide');
             }
         })
     }
     
     buttons.forEach((button)=>{
        button.addEventListener('click',()=>{
            const currentCategory = button.dataset.filter;
            filter(currentCategory,boxs);
        }

        )
     }) 
}
app();
