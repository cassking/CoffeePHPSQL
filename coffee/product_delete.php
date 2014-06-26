<?php

include
'include/db.inc.php';
 /*Jump to product_show.php, instead of haning out here*/
error_reporting(E_ALL);
ini_set('display_errors', 'On');
    header('Location:product_show.php');;
    //exit();
/*establishes connection*/

$product_id = $_GET['product_id'];


$sql = "DELETE FROM product WHERE product_id='$product_id'";
//echo $sql;

        $result= mysqli_query($link, $sql);
        if(!$result) {
            $error = 'error establishing connection' . mysqli_query($link);
            echo $error;
            exit();

        };

            
            ?>
