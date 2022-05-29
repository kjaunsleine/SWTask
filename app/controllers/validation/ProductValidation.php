<?php

namespace App\Controllers\Validation;

use App\Models\Product;
use App\Controllers\Products\ProductTypeSelection;

/**
 * Product validation class
 * 
 * In validate() common field input is validated and fields for set product type.
 * Errors are stored in an array. Validation is passed when error array is empty.
 * 
 */
class ProductValidation
{
    /**
     * @var object
     */
    protected $productSelection;
    /**
     * @var array
     */
    protected $errors = [];
    /**
     * @var array
     */
    protected $data;

    public function __construct() {
        $this->productModel = new Product();
        $this->productSelection = new ProductTypeSelection();
    }

    /**
     * Sets input data
     * 
     * @param array $data
     * 
     * @return void
     */
    public function setData($data)
    {
        $this->data = $data;
    }
    
    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Field validation
     * 
     * Validates common fields (sku, name, price, productType)
     * Depending on chosen productType, validation is done on corresponding product fields.
     * Both validation error arrays are merged together
     * Checks if error array is empty and returns result.
     * 
     * @return bool
     */
    public function validate()
    {
        $this->skuValidation($this->data['sku']);
        $this->nameValidation($this->data['name']);
        $this->priceValidation($this->data['price']);
        $this->productTypeValidation($this->data['productType']);

        if (!empty($this->data['productType'])) {
            $this->productType = $this->data['productType'];
            $productObj = $this->productSelection->getProductTypeValidation($this->data['productType']);
            $productObj->attributesValidation($this->data);
            $this->errors = array_merge($this->errors, $productObj->errors);
        }

        return empty($this->errors);
    }

    /**
     * Validates sku field and adds errors to error array if validation fails
     * 
     * @param mixed $sku
     * 
     * @return void
     */
    public function skuValidation($sku)
    {
        $skuError = '';

        if (empty($sku)) {
            $skuError = 'Field is required';
        } elseif (!preg_match("/^([0-9a-zA-Z])+$/", $sku)) {
            $skuError = 'SKU can contain only letters and numbers';
        } elseif (strlen($sku) > 100) {
            $skuError = 'Can contain less than 100 characters';
        } elseif ($this->productModel->findProductBySku($sku)) {
            $skuError = 'There is already a product with this SKU.';
        }

        if (!empty($skuError)) {
            $this->errors['skuError'] = $skuError;
        }
    }

    /**
     * Validates name field and adds errors to error array if validation fails
     * 
     * @param mixed $name
     * 
     * @return void
     */
    public function nameValidation($name)
    {
        $nameError = '';

        if (empty($name)) {
            $nameError = 'Field is required';
        } elseif (strlen($name) > 100) {
            $nameError = 'Can contain less than 100 characters';
        }
        
        if (!empty($nameError)) {
            $this->errors['nameError'] = $nameError;
        }
    }

    /**
     * Validates price field and adds errors to error array if validation fails
     * 
     * @param mixed $price
     * 
     * @return void
     */
    public function priceValidation($price)
    {
        $priceError = '';
        if (empty($price)) {
            $priceError = 'Field is required';
        } elseif (!preg_match("/^(\d+|\d+\.\d{1,2})$/", $price)) {
            $priceError = 'Max 2 digits after decimal point';
        } elseif ($price > 1000000) {
            $priceError = 'Number can not be larger than 1000000';
        } elseif ($price < 0) {
            $priceError = 'Number can not be smaller than 0';
        }

        if (!empty($priceError)) {
            $this->errors['priceError'] = $priceError;
        }
    }

    /**
     * Validates productType dropdown and adds errors to error array if validation fails
     * 
     * @param string $productType
     * 
     * @return void
     */
    public function productTypeValidation($productType)
    {
        $productTypeError = '';
        if (empty($productType)) {
            $productTypeError = 'Product type must be chosen';
        }

        if (!empty($productTypeError)) {
            $this->errors['productTypeError'] = $productTypeError;
        }
    }
}
