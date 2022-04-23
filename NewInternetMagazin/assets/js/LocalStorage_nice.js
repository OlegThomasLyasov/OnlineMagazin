class LocalStorageUtil2 {
    constructor() {
        this.keyName = 'nice_products';
    }
    getProducts() {
        const productsLocalStorage = localStorage.getItem(this.keyName);
        if (productsLocalStorage !== null) {
            return JSON.parse(productsLocalStorage);
        }
        return [];
    }
    putProducts(id) {
        let products = this.getProducts();
        let pushProduct = false;
        const index = products.indexOf(id);

        if (index === -1) {
            products.push(id);
            pushProduct = true;
        } else {
            products.splice(index, 1);
        }

        localStorage.setItem(this.keyName, JSON.stringify(products));

        return { pushProduct, products };
    }
    delProducts(id){
        let products = this.getProducts();
        let pushProduct = false;
        const index = products.indexOf(id);
        products.splice(index, 1);
        localStorage.setItem(this.keyName, JSON.stringify(products));

        return { pushProduct, products };
    }

};

const localStorageUtil2 = new LocalStorageUtil2();
