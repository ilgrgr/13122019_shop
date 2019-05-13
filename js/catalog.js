class Product {
    constructor (name, price, pic, id) {
        this.name = name;
        this.price = price;
        this.pic = pic;
        this.id = id;
        this.el = document.querySelector('.goods');
    }
    renderProduct() {
        let newProductBlock = document.createElement('a');
        newProductBlock.classList.add('goods__item');
        newProductBlock.href = `/description/productdescription.php?id=${this.id}`;//?product = ${id}
        newProductBlock.innerHTML = `
        <div class="goods__item-photo" style="background-image: url(../images/catalog/${this.pic})"></div>
        <div class="goods__item-name">${this.name}</div>
        <div class="goods__item-price">${this.price} руб.</div>
        `;
        this.el.appendChild(newProductBlock)
    }
}

class Catalog {
    constructor () {
        this.el = document.querySelector('.goods');
    }
    clearCatalog() {
        this.el.innerHTML = '';
    }
    preloaderOn() {
        this.el.innerHTML = `<div class="preloder"></div>`;
    }   
    preloaderOff() {
        this.clearCatalog();
    }
    renderCatalog(id) {
        this.clearCatalog();
        this.preloaderOn();

        if (id != undefined) {
            id = `?id=${id}`;
        } else {
            id = window.location.search;
        }

        let xhr = new XMLHttpRequest;
        xhr.open('GET', `/heandlers/catalogHeandler.php${id}`);
        xhr.send();

        
        xhr.addEventListener('load', () => {
            this.preloaderOff();
            let data = JSON.parse(xhr.responseText);
            
            data.forEach(function(value) {
                let newProduct = new Product (value.name, value.price, value.pic, value.id);
                newProduct.renderProduct();
            });
        })
    }
}

let catalog = new Catalog();
catalog.renderCatalog();

// обработчик change

let catalogCategories = document.getElementById('cat_name');

catalogCategories.addEventListener('change', () => {
    let catID = catalogCategories.value;
    catalog.renderCatalog(catID);
});