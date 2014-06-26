<?php
/*Jump to product_show.php, instead of haning out here*/
error_reporting(E_ALL);
ini_set('display_errors', 'On');
	header('Location:product_show.php');;
	//exit();
/*establishes connection*/

include 'include/db.inc.php';



/*get data from form*/
$company = mysqli_real_escape_string($link, $_GET['company']);
$type = mysqli_real_escape_string($link, $_GET['type']);
$roast = mysqli_real_escape_string($link, $_GET['roast']);
$description = mysqli_real_escape_string($link, $_GET['description']);
echo $company;
echo $type;
echo $roast;
echo $description;
/*need insert statement*/

$sql = " INSERT INTO product SET
company = '$company',
type = '$type',
roast = '$roast',
description = '$description'";

//echo $sql;
/*Check for errors*/
	if (!mysqli_query($link, $sql)){
		$error = 'Error adding submitted data: ' . mysqli_error($link);
		echo $error;
		exit();
	}

?>
