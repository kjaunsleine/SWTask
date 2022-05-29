<?php
namespace App\Controllers\Products;

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
     * @param string $attributes
     * 
     * @return string JSON
     */
    public function setProductAttributeJSON($data)
    {
        $productAttributes = ['size' => $data['size']];
        return json_encode($productAttributes, true);
    }
  
    /**
     * Gets 'size' as JSON and 
     * places it into a string
     * 
     * @return string
     */
    public function getProductAttributeHTML($attributes)
    {
        $productAttributes = json_decode($attributes, true);
        $text = "Size: " . $productAttributes['size'] . " MB";
        return $text;
    }
}
