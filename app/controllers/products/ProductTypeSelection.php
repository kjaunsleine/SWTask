<?php
namespace App\Controllers\Products;

/**
 * Object factory class
 * 
 * Makes objects depeneding on set product type
 * For example, productType 'Book' makes object of class Book or BookValidation
 */
class ProductTypeSelection
{
    /**
     * Returns product object depending on parameter string
     * 
     * @param string $productType
     * 
     * @return object
     */
    public function getProductType($productType)
    {
        $className = __NAMESPACE__ . '\\' . $productType;
        return new $className();
    }

    /**
     * Returns product validation object depending on parameter string
     * 
     * @param string $productType
     * 
     * @return object
     */
    public function getProductTypeValidation($productType)
    {
        $className = 'App\\Controllers\\Validation\\' . $productType . 'Validation';
        return new $className();
    }
}
