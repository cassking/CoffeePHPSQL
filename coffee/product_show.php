<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="assets/style.css" type="text/css" rel="stylesheet"/>
        <title>PHP Class 2 Show Product Cassandra</title>
    </head>

    <body>

        <div class="wrapper">
        	<div class="headline"></div>
            <div class="header"><h1>Show Product</h1></div>
            <div class="navbar">
                <a href="product_show.php" class="navcurr">Show Product</a>
                <a href="product_insert.php" class="nav">Insert Product</a>
                <a href="company_show.php" class="nav">Show Company</a>
                <a href="company_insert.html" class="nav">Insert Company</a>
            </div>
            <div class="content">

          <?php
            error_reporting(E_ALL);
            ini_set('display_errors', 'On');
    
            //exit();
            //establishes connection

            include 'include/db.inc.php';

            /* we want to get the company from the companies table, not the product table*/
            /*need new sql statment to query company table*/

            $sql_company = 'SELECT company_id, name, website FROM companies, product WHERE name=company ORDER BY name ASC';
            $result_company = mysqli_query($link, $sql_company);
            //echo $sql_company;

             if (!$result_company) {
              $error = 'error establishing connection' . mysqli_query($link);
              echo $error;
              exit();
            }

            $companies_list =array();
            while($recording_comp=mysqli_fetch_array($result_company)){
            $comp_company_id = $recording_comp['company_id'];
            $comp_name= htmlspecialchars($recording_comp['name'], ENT_QUOTES, 'UTF-8');
            $comp_website = htmlspecialchars($recording_comp['website'], ENT_QUOTES, 'UTF-8');
            $companies_list[$comp_company_id]['name'] = $comp_name;
            $companies_list[$comp_company_id]['website'] = $comp_website;

        }
            
            $sql = 'SELECT product_id, company, type, roast, description FROM product ORDER BY company ASC';
            //echo $sql;
            $result = mysqli_query($link, $sql);

            if (!$result) {
              $error = 'error establishing connection' . mysqli_query($link);
              echo $error;
              exit();
            }

    		//While there are products in our database, get and display the company, the type, the roast and description of each*/

            while($recording=mysqli_fetch_array($result)){
            $product_id = $recording['product_id'];
            $type = htmlspecialchars($recording['type'], ENT_QUOTES, 'UTF-8');
           $company = htmlspecialchars($recording['company'], ENT_QUOTES, 'UTF-8');
            $roast = htmlspecialchars($recording['roast'], ENT_QUOTES, 'UTF-8');
            $description = htmlspecialchars($recording['description'], ENT_QUOTES, 'UTF-8');
               echo "<div class='product'>";
                echo "<div class='company'>" . $comp_name . ":" ."</div>";
                echo "<span class='type'> " . $type . "</span>";
                echo "<div class='roast'>Roast: " . $roast . "</div>";
                echo "<div class='description'>DESCRIPTION " . $description . "</div>";
                echo "<a href='product_delete.php?product_id=$product_id'>" . " delete product " . "</a>";
                echo "<a href='product_edit.php?product_id=$product_id'>" . " edit product " . "</a>";
                echo "</div>";
                //echo $comp_name;
           }
            // show results on page
            //echo $comp_name
            ?>


            </div>
            <div class="footer">
                <img src="assets/cc_by.png" alt="Creative Commons Licensed By" title="Creative Commons Licensed By"  height="45"/>
                Izzy Johnston, in conjunction with Girl Develop It!
            </div>
        </div>

    </body>

</html>
