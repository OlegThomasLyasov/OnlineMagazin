class Shopping {

    handlerClear() {
        const productStore=localStorageUtil.getProducts();
        ROOT_SHOPPING.innerHTML = '';
        headerPage.render(productStore.length);
    }

    render() {
        const productsStore = localStorageUtil.getProducts();
        let htmlCatalog = '';
        let sumCatalog = 0;
        let i=1;
        var ks=[];
        for(var value of productsStore){
                ks[value] = (ks[value]||0)+1;
            }
        console.log(ks);
        

        FULL_CATALOG.forEach(({ id, name, price }) => {
            if (productsStore.indexOf(id) !== -1) {
                htmlCatalog += `
                    <tr>
                        <td class="shopping-element__name"> ${name}</td>
                        <td class="shopping-element__price">${price.toLocaleString()} руб.</td>
                        <td class="shopping-element__price">${ks[id]} <button class="plus-goods" data-id="${id}">+</button><button class="minus-goods"data-id="${id}">-</button> </td>
                        <td class="shopping-element__price">${ks[id]*price}</td>
                    </tr>
                `;
                sumCatalog += price*ks[id];
            }
            i+=1;
        
            
        });


        const html = `
        <form action="oform.php">
            <div class="shopping-container">
                <div class="shopping__close" onclick="shoppingPage.handlerClear();"></div>
                <table class="table">
                <thead class="table_head">
                <tr>
                  <th scope="col">Наименование продукта</th>
                  <th scope="col">Цена продукта</th>
                  <th scope="col">Количество</th>
                  <th scope="col">Стоимость</th>
                </tr>
              </thead>
              <tbody>
              ${htmlCatalog}
              <th scope="row">${i}</th>
              <tr>
                        <td class="shopping-element__name"> Сумма:</td>
                        <td class="shopping-element__price" style="text-align:right">${sumCatalog.toLocaleString()} руб.</td>
                    </tr>
                </tbody>
                <th scope="row">${i}</th>      
            </table>
            <button type="submit" class="shopping__button">
            <a class="shopping__text" >Оформить заказ</a>
            </button>
        </div>
        </form>
        `;

        ROOT_SHOPPING.innerHTML = html;
        $('.plus-goods').on('click', plusGoods);
        $('.minus-goods').on('click', minusGoods);
    }
    
};
function plusGoods() {
    const productsStore = localStorageUtil.getProducts();
    var id = $(this).attr('data-id');
    localStorageUtil.putProducts(id);
    shoppingPage.render();
}

function minusGoods() {
    var id = $(this).attr('data-id');
    localStorageUtil.delProducts(id);
    shoppingPage.render();
}

const shoppingPage = new Shopping();