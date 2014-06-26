<?php

	/*Jump to company_show.php, instead of haning out here*/
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
	  header('Location:company_show.php');
	  //exit();
	/*establishes connection*/

	include 'include/db.inc.php';



	/*get data from form*/

	$name = mysqli_real_escape_string($link, $_GET['name']);
	$country = mysqli_real_escape_string($link, $_GET['country']);
	$website = mysqli_real_escape_string($link, $_GET['website']);
	echo $company_id;
	echo $name;
	echo $country;
	echo $website;
	/*need insert statement*/

	$sql = " INSERT INTO companies SET

	name = '$name',
	country = '$country',
	website = '$website'";

	//echo $sql;
	/*Check for errors*/
		if (!mysqli_query($link, $sql)){
			$error = 'Error adding submitted data: ' . mysqli_error($link);
			echo $error;
			exit();
		}



?>
