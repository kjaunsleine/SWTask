<?php
namespace App\Controllers\Products;

/**
 * Abstract class on which other product classes will be extended
 */
abstract class Product
{

    /**
     * Transforms additional product attributes from JSON to
     * string which then can be echoed
     * 
     * @return string
     */
    abstract public function getProductAttributeHTML($attributes);

    /**
     * Takes validated values from valdiation object of additional product attributes
     * and encodes them in JSON
     * 
     * @param object $param
     * 
     * @return string JSON
     */
    abstract public function setProductAttributeJSON($data);
}
