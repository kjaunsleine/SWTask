<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Product;
use App\Controllers\Validation\ProductValidation;

/**
 * Products controller
 * 
 * Outputs 'index' and 'add product' pages
 * Changes form fields depending on chosen product type
 * Mass deletes and adds products (input data is validated)
 */
class Products extends Controller
{
    /**
     * @var object
     */
    protected $productModel;
    /**
     * @var object
     */
    protected $validation;

    public function __construct()
    {
        $this->productModel = $this->model('Product');
        $this->validation = new ProductValidation();
    }

    /**
     * Gets index page and product list in it
     * 
     * @return void
     */
    public function indexPage()
    {
        $products = $this->productModel->getProducts();
        
        $data = [
            'title' => 'Products',
            'products' => $products
        ];

        $this->view('products/index', $data);
    }

    /**
     * Gets 'Add product' page
     * 
     * Product type array in productModel is retrieved to put values in dropdown
     * then passed to the view in an array.
     * 
     * @return void
     */
    public function addProductPage()
    {
        $productTypes = $this->productModel->getProductTypes();

        $data = [
            'title' => 'Add product',
            'productTypes' => $productTypes,
            'inputData' => ['productType' => '']
        ];

        $this->view('products/add', $data);
    }

    /**
     * Mass deletes products when checkboxes are checked depending on id in database
     * 
     * @param int $ids
     * 
     * @return void
     */
    public function delete($ids)
    {
        foreach ($ids as $id) {
            $this->productModel->deleteProduct($id);
        }
        header('Location:' . URLROOT . '/');
    }

    /**
     * Adds product fields via AJAX depending on chosen product type.
     * If no productType is chosen, empty string is returned.
     * 
     * @param array $selectedProductType
     * @param array $data
     * 
     * @return mixed
     */
    public function addFields($selectedProductType, $data = [])
    {
        if (empty($selectedProductType['productType'])) {
            return '';
        } else {
            $product = 'inc/select/' . $selectedProductType['productType'];
            $this->view($product, $data);
        }
    }

    /**
     * Adds product data
     * 
     * Product type array in productModel is retrieved to put values in dropdown
     * then passed to the view in an array.
     * Data from field input is passed in validation object and validated.
     * Errors are retrieved as an array. Input data and errors are passed to the view in an array.
     * If error array is empty, validation is passed and data is put in the database and user is redirected to index page.
     * If validation fails, add page is rendered with errors and input data. 
     * 
     * 
     * @param array $inputData
     * 
     * @return void
     */
    public function add($inputData)
    {
        $productTypes = $this->productModel->getProductTypes();

        $this->validation->setData($inputData);
        $validationResult = $this->validation->validate();
        $errors = $this->validation->getErrors();

        $data = [
            'title' => 'Add product',
            'productTypes' => $productTypes,
            'errors' => $errors,
            'inputData' => $inputData

        ];

        if ($validationResult) {
            if ($this->productModel->addProduct($data['inputData'])) {
                header('Location: ' . URLROOT);
                exit();
            }
        } else {
            $this->view('products/add', $data);
        }
    }
}
