<?php
namespace SWTask\GetProducts;

use SWTask\Products\ProductTypeSelection;

/**
 * Gets data from database and depending on product type
 * changes how additional attributes are displayed
 */
class GetProductsContr extends GetProducts
{
    /**
     * @var string
     */
    private $productType;
    /**
     * @var object
     */
    private $typeFactory;

    /**
     * @var array
     */
    private $productHTMLs = '';

    public function __construct(ProductTypeSelection $typeFactory)
    {
        $this->typeFactory = $typeFactory; // chooses DVD, Book or Furniture
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

    /**
     * @return string
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * Returns object representing product with all its properties
     * 
     * Makes an object corresponding to product type.
     * For example, productType 'Book' produces Book class object
     * 
     * @return object
     */
    public function getProductObject()
    {   
        $product = $this->typeFactory->getProductType($this->productType);
        return $product;        
    }

    /**
     * Creates an object depending on product type and sets it's properties
     * then returns the object.
     * 
     * @param array $productDataArray
     * 
     * @return object
     */
    public function setProductObjectProperties($productDataArray)
    {
        //$productsFromDatabase = $this->getProducts();
        $this->setProductType($productDataArray['type']);
        $productObject = $this->getProductObject();
        $productObject
        ->setId($productDataArray['id'])
        ->setSku($productDataArray['sku'])
        ->setName($productDataArray['name'])
        ->setPrice($productDataArray['price'])
        ->setProductAttributes($productDataArray['attributes']);
        return $productObject;
    }

    /**
     * Gets properties from object representing product and
     * places them in an HTML snippet
     * 
     * @param object $productObject
     * 
     * @return string
     */
    public function setProductHTML($productObject)
    {
        return sprintf('<div class="product">
                            <input class="delete-checkbox" type="checkbox" name="delete[]" value="%d">
                            <p class="product-sku">%s</p>
                            <p class="product-name">%s</p>
                            <p class="product-price">%f $</p>
                            <p class="product-attr">%s</p>
                        </div>', 
                        $productObject->getId(), 
                        $productObject->getSku(), 
                        $productObject->getName(),
                        $productObject->getPrice(),
                        $productObject->getProductAttributeHTML()
                    );
    }

    /**
     * Retrieves data from database and places data in HTML snippet
     * 
     * Data is retrieved using getProducts() method which returns an array of products.
     * Iterating through it a product object is made to it's corresponding
     * product type and it's properties are set (method setProductObjectProperties()).
     * Objects properties are placed in HTML and concatenated to string.
     * Method returns HTML of all the products in the database as a string.
     * 
     * @return string
     */
    public function getProductsFromDatabaseToHTML()
    {   
        $html = '';
        $productsFromDatabase = $this->getProducts();
        foreach ($productsFromDatabase as $product) {
            $productObject = $this->setProductObjectProperties($product);
            $html .= $this->setProductHTML($productObject);
        }
        return $html;
    }

}
