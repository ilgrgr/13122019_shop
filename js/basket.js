// console.log($_SESSION);

class ProductCart {
    constructor (name, price, pic, id, count) {
        this.name = name;
        this.price = price*count;
        this.pic = pic;
        this.id = id;
        this.count = count;
        this.el = document.querySelector('.cart-list');
        
    }
    addProduct() {
        let xhr = new XMLHttpRequest;
        xhr.open('GET', `/heandlers/addToCart.php?upProduct=${this.id}`);
        xhr.send();

        xhr.addEventListener('load', () => {

            let dataUp = JSON.parse(xhr.responseText);
            if (dataUp) {
                let cartL = new CartList();
                cartL.rednerCartList(); 
            }
        });
    }

    reduceProduct() {
        let xhr = new XMLHttpRequest;
        xhr.open('GET', `/heandlers/addToCart.php?reduceProduct=${this.id}`);
        xhr.send();

        xhr.addEventListener('load', () => {

            let dataReduce = JSON.parse(xhr.responseText);
            if (dataReduce) {

                let cartL = new CartList();
                cartL.rednerCartList();  
            }
        });
    }

    deletProduc() {
        let xhr = new XMLHttpRequest;
        xhr.open('GET', `/heandlers/addToCart.php?deletProduct=${this.id}`);
        xhr.send();

        xhr.addEventListener('load', () => {

            let dataDelet = JSON.parse(xhr.responseText);
            if(dataDelet) {
                new CartList().rednerCartList();  
                // cartL.rednerCartList();  
            }
        });
    }

    renderCartProduct() {
        let newProductCartBlock = document.createElement('section');
        newProductCartBlock.classList.add('choose-text-format');
        newProductCartBlock.id = `cartListId${this.id}`;
        newProductCartBlock.innerHTML = `
            <div class="formatting">
                <div class="formatting__photo" style="background-image: url(../images/catalog/${this.pic});"></div>
                <div class="formatting__text">
                    <div class="choose-text-format-2">${this.name}</div>
                    <div class="choose-text-format-3">арт.0000.${this.id}</div>
                </div>
            </div>
            <div class="formatting">
            <span>XL</span>
            <div class="formatting__quantity">
                <div class="product-quantity">${this.count}</div>
                <div>
                    <div class="formatting__quantity-change formatting__quantity-change-up">+</div>
                    <div class=" formatting__quantity-change formatting__quantity-change-down">-</div>
                </div>
            </div>
            <span class="choose-text-format-3">${this.price} руб.</span>
            <div class="popup-button3" style="background-image: url(../images/icons/multiply.svg);"></div>
        </div>
        `;

        let elcountUp = newProductCartBlock.querySelector('.formatting__quantity-change-up');
        elcountUp.addEventListener('click' , () => {

            this.addProduct();
        });

        let elcountDown = newProductCartBlock.querySelector('.formatting__quantity-change-down');
        elcountDown.addEventListener('click' , () => {

            this.reduceProduct();
        });

        let deletproductCart = newProductCartBlock.querySelector('.popup-button3');
        deletproductCart.addEventListener('click' , () => {

            this.deletProduc();
        });    

        this.el.appendChild(newProductCartBlock);
        
    }
}

class CartList {
    constructor() {
        this.el = document.querySelector('.cart-list');
    }

    clearCatalog() {
        this.el.innerHTML = '';
    }
  
    counterBasket(counter) {
        let counterBasketEl = document.querySelector('.bascet-count');
        counterBasketEl.innerText = `Корзина (${counter})` ;
        console.log(counter);
    }

    totalPrice(totalPrice) {
        let totalPriceEl = document.querySelector('.total-price');
        totalPriceEl.innerText = `${totalPrice} руб.` ;

        console.log(totalPrice);
        
    }

    rednerCartList() {

        this.clearCatalog();

        let xhr = new XMLHttpRequest;
        xhr.open('GET', `/heandlers/addToCart.php`);
        xhr.send();

        xhr.addEventListener('load', () => {

            let data = JSON.parse(xhr.responseText);
            console.log(data);
            
            if(data) {
                let totalprice = 0;

                data.cartlist.forEach((value) => {

                    let newProductCart = new ProductCart (value.name, value.price, value.pic, value.id, value.count);
                    totalprice = totalprice +( value.price * value.count );
                    newProductCart.renderCartProduct();
                });

                this.counterBasket(data.cartCount);
                this.totalPrice(totalprice);
            }

        });
    }
}
// console.log(data);
let cartL = new CartList();
cartL.rednerCartList();


$('input').keyup(function(event){
    
    if ($(this).val() == '') {
        $(this).css('border', '2px solid red');
        
    }
    else {
        $(this).css('border', '2px solid  grey');
    }

})