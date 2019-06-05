<?php
include($_SERVER['DOCUMENT_ROOT'] . '/db/connect.php');
session_start();


    // echo '<pre>';
    // print_r($_GET);
    // echo '</pre>';

// проверяем GET параметр на пустоту
if (!isset($_GET['addCartId']) ) {

    if (isset($_GET['upProduct']) ) {
        $idUp = $_GET['upProduct'];
        foreach ($_SESSION['cartlist'] as $key => $value) {

            if ($value['id'] == $idUp ) {
                $_SESSION['cartlist'][$key]['count']++;
                $_SESSION['cartCount']++;
                
            }
        }
    }

    if (isset($_GET['reduceProduct']) ) {
        $idReduce = $_GET['reduceProduct'];
        foreach ($_SESSION['cartlist'] as $key => $value) {
            if ($value['id'] == $idReduce ) {
                 
                if( $_SESSION['cartlist'][$key]['count'] >= 2) {
                    $_SESSION['cartlist'][$key]['count']--;
                    $_SESSION['cartCount']--;
                    
                }
                
            }
        }
    }

    if ( isset($_GET['deletProduct']) ) {
        $deletProduct = $_GET['deletProduct'];

        foreach ($_SESSION['cartlist'] as $key => $value) {

            if ($value['id'] == $deletProduct ) {
                $_SESSION['cartCount'] = $_SESSION['cartCount'] - $value['count'];
                array_splice($_SESSION['cartlist'], $key, 1);
            }
        }
    }
    
    echo json_encode($_SESSION);
    die();
}


$id = $_GET['addCartId'];
// проверяем  счетчик товаров в карзине
if (isset($_SESSION['cartCount'])) {
    $_SESSION['cartCount']++;                    
} else {
    $_SESSION['cartCount'] = 1;
}

$query = "SELECT * FROM `catalog` WHERE `id` IN ($id)";
    $result = mysqli_query($db, $query);
    
    while($row = mysqli_fetch_assoc($result) ) {

        $row['count'] =1;  

        if (!isset($_SESSION['cartlist'])) {                  
            $_SESSION['cartlist'] = [];
                                  
            array_push($_SESSION['cartlist'], $row);
        } 
            else {
        
                $goal = false;
                // проверяем на уникальность товара в массиве
                foreach($_SESSION['cartlist'] as $key => $value) {
                    
                    if ($value['id'] == $id) {
                        $_SESSION['cartlist'][$key]['count']++;
                        $goal = true; 
                    }
                }
        
                if ( $goal == false) {
                    
                    array_push($_SESSION['cartlist'], $row);  
                }
            }
 
    }

    echo json_encode($_SESSION);

    // echo '<pre>';
    // print_r($_SESSION);
    // echo '</pre>';


    // session_destroy();
?>