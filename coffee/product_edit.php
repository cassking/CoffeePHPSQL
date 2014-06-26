<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="assets/style.css" type="text/css" rel="stylesheet"/>
        <title>PHP Class 2 EDIT Product Cassandra</title>
    </head>

    <body>

        <div class="wrapper">
        	<div class="headline"></div>
            <div class="header"><h1>Create a form to EDIT Product</h1></div>
            <div class="navbar">
                <a href="product_show.php" class="nav">Show Product</a>
                <a href="product_insert.php" class="navcurr">Insert Product</a>
                <a href="company_show.php" class="nav">Show Company</a>
                <a href="company_insert.html" class="nav">Insert Company</a>
            </div>

            <div class="content">
              <?php

              include 'include/db.inc.php';
              $product_id = $_GET['product_id'];

              $sql = 'SELECT * FROM product WHERE product_id =' . $product_id;
              //echo $sql;

              $result= mysqli_query($link, $sql);
              if(!$result) {
              $error = 'error establishing connection' . mysqli_query($link);
              echo $error;
              exit();
            }

              //get arrays
               $recording=mysqli_fetch_array($result);
               $product = htmlspecialchars($recording['session_name()'], ENT_QUOTES, 'UTF--8');
                print_r($recording);

              $company = htmlspecialchars($recording['company'], ENT_QUOTES, 'UTF--8');
             $type = htmlspecialchars($recording['type'], ENT_QUOTES, 'UTF--8');
              $roast = htmlspecialchars($recording['roast'], ENT_QUOTES, 'UTF--8');
             $description = htmlspecialchars($recording['description'], ENT_QUOTES, 'UTF--8');


              ?>
            	<!--reference script here-->
              <form action="product_edit_result.php" method="get">

              <label>edit your coffee here : </label> <br /><br />

              Company: <input ="text" name="company" value="<?php echo $company;?>" /> <br />

<!--               Product:<input type="text" name="product" value="<?php echo $type; ?> "/> <br />
 -->             

              Type:<input type="text" name="type"  value="<?php echo $type; ?>" /> <br />
              Roast:<br />
               
              <input type="radio" name="roast"  value="Light"  
             <?php if ($roast=="light") echo "checked ='checked'" ?> >Light: </input>

              <input type="radio" name="roast"  value="Medium"  
              <?php if ($roast=="medium") echo "checked ='checked'" ?> >Medium: </input>

               <input type="radio" name="roast"  value="Dark"  
                <?php if ($roast=="dark") echo "checked ='checked'" ?> >Dark: </input>

              Description: <input type="textarea" name="description" value ="<?php echo $description; ?>"  /> <br />

              EDIT: <input type="submit" value="submit to edit coffee product info" />


              <input type="hidden" value ="<?php echo $product_id ?>" name="product_id">


              </form>

             </div>

            <div class="footer">
                <img src="assets/cc_by.png" alt="Creative Commons Licensed By" title="Creative Commons Licensed By"  height="45"/>
                Izzy Johnston, in conjunction with Girl Develop It!
            </div>
        </div>
    </body>
</html>
