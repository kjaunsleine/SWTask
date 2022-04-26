<?php

namespace SWTask\AddProduct;

use SWTask\FormValidation\ProductFormValidation;
use SWTask\Products\ProductTypeSelection;

/**
 * Gets product attributes from form and saves in a database
 */
class AddProductContr extends AddProduct
{
    /**
     * @var string
     */
    private $sku;
    /**
     * @var string
     */
    private $name;
    /**
     * @var float
     */
    private $price;
    /**
     * @var string
     */
    private $productType;
    /**
     * @var string JSON
     */
    private $productAttribute;

    /**
     * Sets properties
     * 
     * Sets properties from validation object.
     * Sets product attribute depending on product type by making a ProductTypeSelection object 
     * when its product type is set and makes an object from class of corresponding product type. 
     * For example, product type 'Book' makes instance of class Book.
     * Attribute is retrieved as JSON in format specific to product class and set.
     * 
     * @param object $validation
     * 
     * @return void
     */
    private function setProductAttributes($validation)
    {
        $this->sku = $validation->getValue('sku');
        $this->name = $validation->getValue('name');
        $this->price = $validation->getValue('price');
        $this->productType = $validation->getValue('productType');
        $this->typeFactory = new ProductTypeSelection;
        $product =  $this->typeFactory->getProductType($this->productType);
        $attribute = $product->setProductAttributeJSON($validation);
        $this->productAttribute = $attribute;
    }

    /**
     * Gets product attributes from form as $_POST,
     * validates and saves in database
     * 
     * Gets data from $_POST array and sets it in ProductFormValidation object.
     * Validates it.
     * If validation is succesful, properties of this object is set with setProductAttributes()
     * and product data is added to database with addProduct().
     * If validation fails, ProductFormValidation object is returned (which contains errors array)
     * 
     * @return void|object
     */
    public function saveProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $validation = new ProductFormValidation();
            $validation->getData($_POST);

            if ($validation->validate()) {
                $this->setProductAttributes($validation);
                $this->addProduct();
            } else {
                return $validation;
            }
        }
    }

    /**
     * Saves validated data to database and redirects to index.php
     * 
     * @return void
     */
    private function addProduct()
    {
        $this->setProduct($this->sku, $this->name, $this->price, $this->productType, $this->productAttribute);
        header("Location: ../index.php");
    }
}
