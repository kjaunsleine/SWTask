<?php
    require 'includes/getProduct.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Fauna+One&display=swap" rel="stylesheet"> 
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
        <!-- JS and CSS? -->
        <link rel="stylesheet" href="./css/style.css" type="text/css">
        <script type="text/javascript" src="./js/app.js" defer></script>
        <title>Product List</title>
    </head>
    <body>
    <header class="w-100 d-flex justify-content-between align-items-center flex-column flex-sm-row">
        <h1 class="header-headline mb-2 mb-sm-0 ">Product List</h1>
        <div class="header-btn-container">
            <a id="add-product-btn" class="header-btn btn btn-outline-dark text-uppercase me-3" href="./add-product.php">Add</a>
            <input id="delete-products-btn" class="header-delete-btn btn btn-outline-dark text-uppercase me-3" type="submit" name="mass_delete" value="Mass delete" form="delete_form">
        </div>
    </header>
    <main class="w-100">
        <form id="delete_form" action="includes/deleteProduct.inc.php" method="post">
        <div class="product-list mx-auto d-flex flex-wrap">
        <!-- Gets products from database and adds product divs  -->
        /**
         * Displays products depending on type
         * 
         * Iterates through productData array, setting type property of typeFactory and then
         * using returnProduct() instance of corresponding class is created.
         * Then its corresponding properties and methods can be used to display products.
         */
        <?= $productsHTML; ?>
        </div>
        </form>
    </main>
    <footer class="w-100">
        <p class="footer-text text-uppercase text-center">Scandiweb Test assignment</p>
    </footer>
    </body>
</html>
