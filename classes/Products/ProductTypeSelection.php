<?php
namespace SWTask\Products;

/**
 * Object factory
 * 
 * Makes objects depeneding on set product type
 * For example, productType 'Book' makes object of class Book
 */
class ProductTypeSelection
{
    public function getProductType ($productType)
    {
        $className = __NAMESPACE__ . '\\' . $productType;
        return new $className;
    }
}
