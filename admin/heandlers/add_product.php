<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/db/connect.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/db/func.php');


    d($_FILES);


   if ($_SERVER['REQUEST_METHOD'] == POST) {

        if (!empty($_POST)) {

            if (!empty($_FILES)) {
                copy($_FILES['pic']['tmp_name'], '../../images/' . $_POST['sku'] . '-' . $_FILES['pic']['name']); //
            }
        }
            $active = 0;
            if ( isset($_POST['active']) ) {

                $active = 1;
            }

            $query = "INSERT INTO `products` ( 
                                                `name`, 
                                                `sku`, 
                                                `description`, 
                                                `price`, `photo`, 
                                                `active`, 
                                                `sale`) 
                                        VALUES ('{$_POST['product_name']}', 
                                                '{$_POST['sku']}', 
                                                '{$_POST['description']}', 
                                                '{$_POST['price']}', 
                                                '1.jpg', 
                                                '{$_POST['active']}', 
                                                '{$_POST['discount']}')
                                                ";
            $result = mysqli_query($db, $query);

            if ( $result ) {
                echo 'Товар добавлен';
            } else {
                echo 'Что-то пошло не так. Попробуйте ещё раз!';            }

        } else {
            echo 'Данные не указаны';
        }

   } else {

        echo 'А-та-та';
   }
?>