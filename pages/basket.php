<?php 
    include($_SERVER['DOCUMENT_ROOT'] . "/db/connect.php");
    include($_SERVER['DOCUMENT_ROOT'] . "/heandlers/chooseCategory.php");
    
    $title = 'Корзина';
    include($_SERVER['DOCUMENT_ROOT'] . "/heandlers/head.php");
?>
<body>
    <div class="wrapper">
    <?=include($_SERVER['DOCUMENT_ROOT'] . "/heandlers/header.php")?>
    <main>
        <section  class="address">
            <h1 class="title">Адрес доставки</h1>
            <div class="choose-text choose-text_address">Все поля обязательны для заполнения</div>
            <form class="address__data">
                <div class="address__data__item address__data__item_full">
                    <div class="address__data__item__text">Выберите вариант доставки</div>
                    <select name="delivery-option" class="categories__items categories__items_address">
                        <option value="courier">Курьерская служба - 500 руб.</option>
                        <option value="pickup">Самовывоз - бесплатно</option>
                        <option value="mail delivery">Доставка по почте (сумма зависит от адреса)</option>
                    </select>
                </div>
                <div class="address__data__flex">
                    <div class="address__data__item address__data__item_half">
                        <div class="address__data__item__text">Имя</div>
                        <input type="text" class="address__data__input">
                    </div>
                    <div class="address__data__item address__data__item_half">
                        <div class="address__data__item__text">Фамилия</div>
                        <input type="text" class="address__data__input">
                    </div>
                </div>
                <div class="address__data__item address__data__item_full">
                    <div class="address__data__item__text">Адрес</div>
                    <input type="text" class="address__data__input">
                </div>
                <div class="address__data__flex">
                    <div class="address__data__item address__data__item_half">
                        <div class="address__data__item__text">Город</div>
                        <input type="text" class="address__data__input">
                    </div>
                    <div class="address__data__item address__data__item_half">
                        <div class="address__data__item__text">Индекс</div>
                        <input type="text" class="address__data__input">
                    </div>
                </div>
                <div class="address__data__flex">
                    <div class="address__data__item address__data__item_half">
                        <div class="address__data__item__text">Телефон</div>
                        <input type="text" class="address__data__input">
                    </div>
                    <div class="address__data__item address__data__item_half">
                        <div class="address__data__item__text">E-mail</div>
                        <input type="text" class="address__data__input">
                    </div>
                </div>
            </form>
        </section>
    </main>
    <?=include($_SERVER['DOCUMENT_ROOT'] . "/heandlers/footer.php")?>
    </div>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/basket.js"></script>
</body>
</html>