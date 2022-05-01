<?php
require 'vendor/autoload.php';

use SWTask\GetProducts\GetProductsContr;
use SWTask\Products\{Book, DVD, Furniture, ProductTypeSelection};

/**
 * Displaying products
 * 
 * After loading of index.php, new GetProductContr object is made with a parameter of new ProductTypeSelection 
 * which will ensure object building depending on productType.
 * Product data is retrieved from database and saved as string with HTML 
 * using getProductsFromDatabaseToHTML() method.
 * Products are further displayed in index.php page.
 */

$objectFactory = new GetProductsContr(new ProductTypeSelection);
$productsHTML = $objectFactory->getProductsFromDatabaseToHTML();