<?php
require '../vendor/autoload.php';

use SWTask\DeleteProduct\DeleteProductContr;

/**
 * Deleting product from the database
 * 
 * When delete_form in index.php is submitted, new DeleteProductContr object is made.
 * Using getCheckedProducts() method, data from $_POST is retrieved, saving ids of products from checked checkboxes in an array.
 * After saving the ids, using deleteProducts() method they are deleted from the database
 */

$deleteProducts = new DeleteProductContr();
$deleteProducts->getCheckedProducts();
$deleteProducts->deleteProducts();
