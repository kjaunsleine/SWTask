<?php

namespace SWTask\AddProduct;

use SWTask\DatabaseConnection\DbConnect;

/**
 * Adds product to the database 
 */
class AddProduct extends DbConnect
{
    /**
     * Adds product to the database with 5 attributes
     * 
     * @param string $sku
     * @param string $name
     * @param float $price
     * @param string $type
     * @param string JSON $attribute
     * 
     * @return void
     */
    protected function setProduct($sku, $name, $price, $type, $attribute)
    {
        $stmt = $this->connect()->prepare('INSERT INTO products(sku, name, price, type, attributes) values (?, ?, ?, ?, ?);');

        if (!$stmt->execute([$sku, $name, $price, $type, $attribute])) {
            $stmt = null;
            header("location: ../../add-product.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
}
