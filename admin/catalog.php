<?php
 include($_SERVER['DOCUMENT_ROOT'] . '/db/connect.php');
 include($_SERVER['DOCUMENT_ROOT'] . '/db/func.php');

 $query = "SELECT * FROM `products`";
$result = mysqli_query($db, $query);


    $template = [];
    while ($row = mysqli_fetch_assoc($result)) {

        $template['item'][] = $row;
    }

    d( $template);
?>

<body>
<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Каталог товаров</title>
  </head>
    <div class="container">
        <h1>Каталог товаров</h1>
            <div class="row">
                <div class="col-4">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Добавить товар</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Каталог товаров</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Заказы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Клиенты</a>
                        </li>
                    </ul>
                   
                </div>
                <div class="col-9">
                    <?php foreach( $template['item'] as $key => $value):?>
                    <div class="card" style="width: 18rem;">
                        <img src="/images/<?=$value['photo']?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?=$value['name']?></h5>
                            <p class="card-text"><?=$value['description']?></p>
                            <a href="change_item.php?product_id=<?=$value['id']?>" class="btn btn-primary">Изменить товар</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                </div>
            
         
               
            
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>