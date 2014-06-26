<?php
/*Jump to product_show.php, instead of haning out here*/
error_reporting(E_ALL);
ini_set('display_errors', 'On');
	header('Location:product_show.php');;
	//exit();
/*establishes connection*/

include 'include/db.inc.php';
/* just get data from url and update*/
              
              $company = mysqli_real_escape_string($link, $_GET['company']);
		$type = mysqli_real_escape_string($link, $_GET['type']);
		$roast = mysqli_real_escape_string($link, $_GET['roast']);
		$description = mysqli_real_escape_string($link, $_GET['description']);
		$product_id = mysqli_real_escape_string($link, $_GET['product_id']);


              $sql = "UPDATE product SET
              company = '$company',
              type='$type',
              roast='$roast',
              description='$description'
              WHERE product_id=$product_id";//no quotes because it is an integer and not text
           


//2echo $sql;
              if(!mysqli_query($link, $sql)) {
              $error = 'error adding data: ';
              echo $error;
              exit();
          }

    	

?>



