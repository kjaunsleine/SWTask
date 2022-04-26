<?php
namespace SWTask\DeleteProduct;

use SWTask\DatabaseConnection\DbConnect;

/**
 * Deletes products from the database
 */
class DeleteProduct extends DbConnect
{
    /**
     * Connects to database and deletes products with selected ids
     * 
     * @param int $id
     * 
     * @return void
     */
    protected function deleteProductData($id)
    {
        $stmt = $this->connect()->prepare('DELETE FROM products WHERE id=?;');

        if (!$stmt->execute([$id])) {
            $stmt = null;
            header("location: ../add-product.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
}
