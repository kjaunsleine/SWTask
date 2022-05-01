<?php
namespace SWTask\Products;

/**
 * Extends abstract class Product
 * 
 * setProductAttributeJSON() and getProductAttributeHTML() are abstract methods
 * 
 */
class Book extends Product
{
    /**
     * Gets 'weight' from input validation object and encodes it in JSON
     * 
     * @param object $validation
     * 
     * @return string JSON
     */
    public function setProductAttributeJSON($validation)
    {
        $productAttribute = ['weight' => $validation->getValue('weight')];
        return json_encode($productAttribute, true);
    }

    /**
     * Gets 'weight' as JSON and places it into a string
     * 
     * @return string
     */
    public function getProductAttributeHTML()
    {
        $productAttribute = json_decode($this->productAttributes, true);
        $text = "Weight: " . $productAttribute['weight'] . " KG";
        return $text;
    }
}
