class Shopping2 {

    handlerClear() {
        ROOT_SHOPPING.innerHTML = '';
        
    }

    render() {
        const productsStore = localStorageUtil2.getProducts();
        let htmlCatalog = '';
        let i=1;
        
        FULL_CATALOG.forEach(({ id, img, name, price }) => {
            if (productsStore.indexOf(id) !== -1) {
                htmlCatalog += `
                <div class="col">
                <div class="shopping-element__name-main"> ${name}</div>
                        <div class="shopping-element__name-nice" > 
                        <a href="" class="shopping-element__img">
                        <img  src="${img}" width="250" height="175" alt="..."> 
                        <button class="minus-goods-nice"data-id="${id}">X</button> 
                        <div class="shopping-element__price-nice">${price.toLocaleString()} руб.</div> 
                        </a>
                </div>
                </div>

                    
                `;
            }
            i+=1;
        
    });

        const html = `
        
            <div class="shopping-container">
                <div class="table_head">Сравнивайте товары, чтобы выбрать лучшее!</div>
                <div class="shopping__close" onclick="shoppingPage2.handlerClear();"></div>
                <div class="product-grid">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
              
              ${htmlCatalog}
              </div>
        </div>
        `;

        ROOT_SHOPPING.innerHTML = html;
        $('.minus-goods-nice').on('click', minusGoods2);
    }
    
};

function minusGoods2() {
    var id = $(this).attr('data-id');
    localStorageUtil2.delProducts(id);
    shoppingPage2.render();
}

const shoppingPage2 = new Shopping2();