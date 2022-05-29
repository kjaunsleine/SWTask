<?php
namespace App\Controllers\Products;

/**
 * Extends abstract class Product
 * 
 * setProductAttributeJSON() and getProductAttributeHTML() are abstract methods
 * 
 */
class Furniture extends Product
{
    public function setProductAttributeJSON($data)
    {
        /**
         * Gets 'height', 'width' and 'length' from input validation object and encodes them in JSON
         * 
         * @param string $height, $width, $length
         * 
         * @return string JSON
         */
        $productAttributes = ['height' => $data['height'], 'width' => $data['width'], 'length' => $data['length']];
        return json_encode($productAttributes, true);
    }
  
    /**
     * Gets 'height', 'width' and 'length' as JSON and 
     * places them into a string
     * 
     * @return string
     */
    public function getProductAttributeHTML($attributes)
    {
        $productAttributes = json_decode($attributes, true);
        $text = "Dimensions: " . $productAttributes['height'] . "x" . $productAttributes['width'] . "x" . $productAttributes['length'] . " CM";
        return $text;
    }
}
