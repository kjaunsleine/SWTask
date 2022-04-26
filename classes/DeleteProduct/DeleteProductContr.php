<?php
namespace SWTask\DeleteProduct;

/**
 * Gets data from form and deletes checked products
 */
class DeleteProductContr extends DeleteProduct
{
    /**
     * @var array
     */
    private $ids = [];

    /**
     * Gets data from form
     * 
     * Gets data from form if and which checkboxes are checked.
     * Iterate through data and set product ids in an array $ids.
     * 
     * @return void
     */
    public function getCheckedProducts()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Check if checkboxes are set
            if (isset($_POST["mass_delete"])) {
                // Check which checkboxes are set
                if (isset($_POST["delete"])) {
                    foreach ($_POST['delete'] as $productId) {
                        $this->ids[] = $productId;
                    }
                }
            }
        }
    }

    /**
     * Deletes selected products from database
     * 
     * Iterates through ids array and deletes products 
     * with matching ids from database
     * and redirects to index.php with success message
     * 
     * @return void
     */
    public function deleteProducts()
    {
        foreach ($this->ids as $productId) {
            $this->deleteProductData($productId);
        }

        header("Location: ../index.php?success=productsdeleted");
    }
}
