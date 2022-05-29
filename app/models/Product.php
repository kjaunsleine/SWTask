<?php

namespace App\Models;

use App\Core\Database;
use App\Controllers\Products\ProductTypeSelection;

/**
 * Product model ensures queries to database and work with data
 */
class Product
{
    /**
     * Product types that will be added to the dropdown
     * 
     * @var array
     */
    protected $productTypes = ['Book', 'DVD', 'Furniture'];

    public function __construct()
    {
        $this->db = new Database();
        $this->productSelection = new ProductTypeSelection();
    }

    public function getProductTypes()
    {
        return $this->productTypes;
    }

    /**
     * Gets products from database
     * 
     * Gets products from database ordered by id.
     * Iterates through returned results and creates product object corresponding to the product type.
     * Product attributes are retrieved as JSON and then decoded to string.
     * 
     * @return array
     */
    public function getProducts()
    {
        $this->db->query('SELECT * FROM products ORDER BY id;');
        $products = $this->db->resultSet();

        foreach ($products as $product) {
            $productObj = $this->productSelection->getProductType($product->type);
            $attributes = $product->attributes;
            $product->attributes = $productObj->getProductAttributeHTML($attributes);
        }

        return $products;
    }

    /**
     * Adds product to the database
     * 
     * Creates product object corresponding to the product type.
     * Then encodes to JSON and replaces previous attributes with JSON.
     * Product properties are saved in a database
     * 
     * @param array $data
     * 
     * @return bool
     */
    public function addProduct($data)
    {
        $productObj = $this->productSelection->getProductType($data['productType']);
        $attributes = $productObj->setProductAttributeJSON($data);
        $data['attributes'] = $attributes;
        
        $this->db->query('INSERT INTO products (sku, name, price, type, attributes) VALUES (:sku, :name, :price, :type, :attributes);');

        $this->db->bind(':sku', $data['sku']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':type', $data['productType']);
        $this->db->bind(':attributes', $data['attributes']);

        return $this->db->execute();
    }

    /**
     * Deletes product by id
     * 
     * @param int $id
     * 
     * @return bool
     */
    public function deleteProduct($id)
    {
        $this->db->query('DELETE FROM products WHERE id = :id');
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }

    /**
     * Finds product by sku
     * 
     * @param string $sku
     * 
     * @return bool
     */
    public function findProductBySku($sku)
    {
        $this->db->query('SELECT * FROM products WHERE sku = :sku');
        $this->db->bind(':sku', $sku);

        $row = $this->db->single();
        
        return $this->db->rowCount() > 0;
    }
}
