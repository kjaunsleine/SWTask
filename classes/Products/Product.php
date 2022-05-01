<?php
namespace SWTask\Products;

/**
 * Abstract class on which other product classes will be extended
 */
abstract class Product
{
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $sku;
    /**
     * @var float
     */
    protected $price;
    /**
     * @var string
     */
    protected $productAttributes;

    /**
     * Transforms additional product attributes from JSON to
     * string which then can be echoed
     * 
     * @return string
     */
    abstract public function getProductAttributeHTML();

    /**
     * Takes validated values from valdiation object of additional product attributes
     * and encodes them in JSON
     * 
     * @param object $param
     * 
     * @return string JSON
     */
    abstract public function setProductAttributeJSON($param);

    /**
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string $sku
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @return float $price
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * @param int $id
     * 
     * @return object
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $name
     * 
     * @return object
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $sku
     * 
     * @return object
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @param float $price
     * 
     * @return object
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @param string $productAttributes
     * 
     * @return object
     */
    public function setProductAttributes($productAttributes)
    {
        $this->productAttributes= $productAttributes;
        return $this;
    }
}
