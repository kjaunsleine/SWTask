<?php
namespace SWTask\GetProduct;

use SWTask\Products\ProductTypeSelection;

/**
 * Gets data from database and depending on product type
 * changes how additional attributes are displayed
 */
class GetProductContr extends GetProduct
{
    /**
     * @var string
     */
    private $productType;
    /**
     * @var object
     */
    private $typeFactory;

    public function __construct(ProductTypeSelection $typeFactory)
    {
        $this->typeFactory = $typeFactory; // chooses DVD, Book or Furniture
    }

    /**
     * Returns object representing product with all its properties
     * 
     * Makes an object corresponding to product type.
     * For example, productType 'Book' produces Book class object
     * 
     * @return object
     */
    public function returnProduct()
    {   
        $product = $this->typeFactory->getProductType($this->productType);
        return $product;        
    }

    /**
     * Sets product type
     * 
     * @param string $productType
     * 
     * @return object
     */
    public function setProductType($productType)
    {
        $this->productType = $productType;
        return $this;
    }
}
