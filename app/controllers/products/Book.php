<?php
namespace App\Controllers\Products;

/**
 * Extends abstract class Product
 * 
 * setProductAttributeJSON() and getProductAttributeHTML() are abstract methods
 * 
 */
class Book extends Product
{
    /**
     * Gets 'weight' as JSON and places it into a string
     * 
     * @return string
     */
    public function getProductAttributeHTML($attributes)
    {
        $productAttributes = json_decode($attributes, true);
        $text = "Weight: " . $productAttributes['weight'] . " KG";
        return $text;
    }

    /**
     * Gets 'weight' from input validation object and encodes it in JSON
     * 
     * @param string $attributes
     * 
     * @return string JSON
     */
    public function setProductAttributeJSON($data)
    {
        $productAttributes = ['weight' => $data['weight']];
        return json_encode($productAttributes, true);
    }   
}
