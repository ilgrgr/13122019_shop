<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Добавление товара</title>
  </head>
  <body>
    <div class="container">
        <h1>Добавление товара</h1>
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
                <form method="POST" enctype="multipart/form-data" action="/admin/heandlers/add_product.php">
                    <div class="form-group">
                        <label for="product_name">Название товара</label> <!-- активирует input -->
                        <input  type="text" name="product_name" class="form-control" id="product_name" placeholder="Куртка зимняя">
                    </div>
                    <div class="form-group">
                        <label for="sku">Артикул товара</label>
                        <input type="number" name="sku" class="form-control" id="sku" placeholder=123445>
                    </div>
                    <div class="form-group">
                        <label for="price">Стоимость</label>
                        <input type="text" name="price" class="form-control" id="price" placeholder="1000 руб.">
                    </div>
                    <div class="custom-file">
                        <input type="file" name="pic" class="custom-file-input" id="file" required >
                        <label class="custom-file-label" for="file">Выберите файл...</label>
                        
                     </div>
                    <div class="form-group">
                        <label for="discount">Скидка (если есть)</label>
                        <input type="text" name="discount" class="form-control" id="discount" placeholder="123456">
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="active" value="1" checked id="active">
                        <label class="custom-control-label" for="active">Товар активен (будет отображен в каталоге)</label>
                    </div>
                    <div class="form-group">
                        <label for="description">Описание товара</label>
                        <textarea name="description" class="form-control" id="description" placeholder="" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Отправить</button>
                    </div>
            
                   
                </form>
                </div>
            </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>