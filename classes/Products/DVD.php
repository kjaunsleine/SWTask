<?php
namespace SWTask\Products;

/**
 * Extends abstract class Product
 * 
 * setProductAttributeJSON() and getProductAttributeHTML() are abstract methods
 * 
 */
class DVD extends Product
{
    /**
     * Gets 'size' from input validation object and encodes it in JSON
     * 
     * @param object $validation
     * 
     * @return string JSON
     */
    public function setProductAttributeJSON($validation)
    {
        $productAttribute = ['size' => $validation->getValue('size')];
        return json_encode($productAttribute, true);
    }
  
    /**
     * Gets 'size' as JSON and 
     * places it into a string
     * 
     * @return string
     */
    public function getProductAttributeHTML()
    {
        $productAttribute = json_decode($this->productAttributes, true);
        $text = "Size: " . $productAttribute['size'] . " MB";
        return $text;
    }
}
