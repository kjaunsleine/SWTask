<?php
namespace SWTask\GetProduct;

use SWTask\DatabaseConnection\DbConnect;

/**
 * Gets product data from database
 */
class GetProduct extends DbConnect
{
   /**
    * Connects to database and fetches data about all of the products
    * 
    * @return array
    */
   public function getProducts()
   {
       $data = $this->connect()->query('SELECT * FROM products ORDER BY id;')->fetchAll(\PDO::FETCH_ASSOC);
       return $data;
   }
}
