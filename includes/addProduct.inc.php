<?php
require 'vendor/autoload.php';

use SWTask\AddProduct\AddProductContr;

/**
 * Saving product to the database
 * 
 * When product_form in add-product.php is submitted, new AddProductContr object is made.
 * Using saveProduct() method, data from $_POST object is validated.
 * If validation fails, validation errors are displayed in add-product.php.
 * If validation is succesful, validated values are saved in the database,
 * page is redirected to index.php and products are displayed.
 */

$newProduct = new AddProductContr();
$validation = $newProduct->saveProduct();
