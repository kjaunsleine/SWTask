<?php
namespace SWTask\Products;

/**
 * Extends abstract class Product
 * 
 * setProductAttributeJSON() and getProductAttributeHTML() are abstract methods
 * 
 */
class Furniture extends Product
{
    public function setProductAttributeJSON($validation)
    {
        /**
         * Gets 'height', 'width' and 'length' from input validation object and encodes them in JSON
         * 
         * @param object $validation
         * 
         * @return string JSON
         */
        $productAttribute = ['height' => $validation->getValue('height'), 'width' => $validation->getValue('width'), 'length' => $validation->getValue('length')];
        return json_encode($productAttribute, true);
    }
  
    /**
     * Gets 'height', 'width' and 'length' as JSON and 
     * places them into a string
     * 
     * @return string
     */
    public function getProductAttributeHTML()
    {
        $productAttribute = json_decode($this->productAttributes, true);
        $text = "Dimensions: " . $productAttribute['height'] . "x" . $productAttribute['width'] . "x" . $productAttribute['length'] . " CM";
        return $text;
    }
}
