<header class="header">
    <div class="header__flex">
        <div class="logo logo_margin-right"></div>
        <nav class="navigation">
            <?php foreach($template['cats'] as $key => $value):?>
            <a href="/pages/catalog.php?id=<?=$value['id']?>" class="navigation__item"><?=$value['name']?></a>
            <?php endforeach;?>
            <a href="#" class="navigation__item">Новинки</a>
            <a href="#" class="navigation__item">О нас</a>
        </nav>
    </div>
    <div class="header__flex">
        <div class="icon-text">
            <div class="icon-text__icon icon-text__icon_photo"></div>
            <div class="icon-text__text">Привет, Пользователь (<a class="main-link main-link_orange" href="#">выйти</a>)</div>
        </div>
        <div class="icon-text">
            <div class="icon-text__icon icon-text__icon_basket"></div>
            <a href='/pages/basket.php' class="icon-text__text bascet-count"><?= 'Корзина (' . $_SESSION['cartCount'].')';?></a>
        </div>
    </div>
</header>