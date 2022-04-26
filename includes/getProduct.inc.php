<?php
require 'vendor/autoload.php';

use SWTask\GetProduct\GetProductContr;
use SWTask\Products\{Book, DVD, Furniture, ProductTypeSelection};

/**
 * Displaying products
 * 
 * After loading of index.php, new GetProductContr object is made with a parameter of new ProductTypeSelection 
 * which will ensure object building depending on productType.
 * Product data is retrieved from database with getProducts() method
 */

$typeFactory = new GetProductContr(new ProductTypeSelection);
$productData = $typeFactory->getProducts();
