<?php
namespace SWTask\GetProducts;

use SWTask\DatabaseConnection\DbConnect;

/**
 * Gets product data from database
 */
class GetProducts extends DbConnect
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

   /**
    * Checks if product with entered SKU exists in the database
    * 
    * @param string $sku
    * 
    * @return bool
    */
   public function checkSku($sku)
   {
       $stmt = $this->connect()->prepare('SELECT sku FROM products WHERE sku = ?');

       if (!$stmt->execute([$sku])) {
           $stmt = null;
           header('Location: ../../index.php?error=stmtfailed');
           exit();
       }

       return $stmt->rowCount() > 0;
    }     
}
