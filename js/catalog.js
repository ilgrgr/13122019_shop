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
    renderPagination(allBlocks, currentBlock) {

        let paginationBlock = document.querySelector('.goods-pages');

        for (let i = 1; i <= allBlocks; i++) {
            let paginationItem = document.createElement('div');
            paginationItem.classList.add('goods-pages__item');

            if ( i == currentBlock ) paginationItem.classList.add('goods-pages__item_hover');
            
            paginationItem.innerHTML = i;

            paginationBlock.appendChild(paginationItem);
        }
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
        xhr.open('GET', `/heandlers/catalogHeandler.php${id}&pag=2`);
        xhr.send();

        
        xhr.addEventListener('load', () => {
            this.preloaderOff();
            let data = JSON.parse(xhr.responseText);
            console.log(data);
            data.items.forEach(function(value) {
                let newProduct = new Product (value.name, value.price, value.pic, value.id);
                newProduct.renderProduct();
            });
            this.renderPagination( data.pagination.allBlocks, data.pagination.currentActiveBlock );
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

