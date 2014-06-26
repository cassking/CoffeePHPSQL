<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="assets/style.css" type="text/css" rel="stylesheet"/>
        <title>PHP Class 2 Show Company Cassandra</title>
    </head>

    <body>

        <div class="wrapper">
          <div class="headline"></div>
            <div class="header"><h1>Show Company</h1></div>
            <div class="navbar">
                <a href="product_show.php" class="navcurr">Show Product</a>
                <a href="product_insert.php" class="nav">Insert Product</a>
                <a href="company_show.php" class="nav">Show Company</a>
                <a href="company_insert.html" class="nav">Insert Company</a>
            </div>
            <div class="content">

          <?php

            //establishes connection

            include 'include/db.inc.php';

            $sql = 'SELECT company_id, name, country, website FROM companies ORDER BY name ASC';
            // echo $sql;
            $result = mysqli_query($link, $sql);

            if (!$result) {
              $error = 'error establishing connection' . mysqli_query($link);
              echo $error;
              exit();
            }

        //While there are products in our database, get and display the company, the type, the roast and description of each*/

            while($recording=mysqli_fetch_array($result)){
            $company = htmlspecialchars($recording['company_id'], ENT_QUOTES, 'UTF--8');
            $name = htmlspecialchars($recording['name'], ENT_QUOTES, 'UTF--8');
            $country = htmlspecialchars($recording['country'], ENT_QUOTES, 'UTF--8');
            $website = htmlspecialchars($recording['website'], ENT_QUOTES, 'UTF--8');




          // show results on page

            echo "<div class='company'>" . $company . "--" ."</div>";
            echo "<span class='name'> " . $name . "</span>";
            echo "<div class='country'>COUNTRY: " . $country . "</div>";
            echo "<div class='website'>WEBSITE " . $website . "</div>";
           echo "<div class='delete'>
           <a href='company_delete.php?company_id='>" . $company_id . "delete company" . "</a></div>";


            }
            ?>


            </div>
            <div class="footer">
                <img src="assets/cc_by.png" alt="Creative Commons Licensed By" title="Creative Commons Licensed By"  height="45"/>
                Izzy Johnston, in conjunction with Girl Develop It!
            </div>
        </div>

    </body>

</html>
