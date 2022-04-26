<?php
namespace SWTask\FormValidation;

class ProductFormValidation extends FormValidation
{
    /**
     * @var string
     */
    protected $sku;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var float
     */
    protected $price;
    /**
     * @var string
     */
    protected $productType;
    /**
     * @var int
     */
    protected $size;
    /**
     * @var float
     */
    protected $weight;
    /**
     * @var float
     */
    protected $width;
    /**
     * @var float
     */
    protected $length;
    /**
     * @var float
     */
    protected $height;

    /**
     * Get input value and set properties to 
     * corresponding attribute
     * 
     * @param mixed $attribute
     * 
     * @return mixed
     */
    public function getValue($attribute)
    {
        return $this->{$attribute};
    }

    /**
     * Establishes validation rules for attributes
     * 
     * @return array
     */
    public function rules()
    {
        return [
            'sku' => [self::RULE_REQUIRED, self::RULE_SKU, [self::RULE_CHARS_MAX, 'max' => 100]],
            'name' => [self::RULE_REQUIRED, [self::RULE_CHARS_MAX, 'max' => 100]],
            'price' => [self::RULE_REQUIRED, self::RULE_NUMBER, [self::RULE_MIN, 'min' => 0], [self::RULE_MAX, 'max' => 1000000]],
            'productType' => [self::RULE_REQUIRED],
            'size' => [self::RULE_REQUIRED, self::RULE_INT, [self::RULE_MIN, 'min' => 0], [self::RULE_MAX, 'max' => 1000000]],
            'weight' => [self::RULE_REQUIRED, self::RULE_NUMBER, [self::RULE_MIN, 'min' => 0], [self::RULE_MAX, 'max' => 1000000]],
            'width' => [self::RULE_REQUIRED, self::RULE_NUMBER, [self::RULE_MIN, 'min' => 0], [self::RULE_MAX, 'max' => 1000000]],
            'length' => [self::RULE_REQUIRED, self::RULE_NUMBER, [self::RULE_MIN, 'min' => 0], [self::RULE_MAX, 'max' => 1000000]],
            'height' => [self::RULE_REQUIRED, self::RULE_NUMBER, [self::RULE_MIN, 'min' => 0], [self::RULE_MAX, 'max' => 1000000]],
        ];
    }

    /**
     * Validates inputs
     * 
     * Iterates through validation rules array as attribute -> rules pairs.
     * Then iterates through rules array. Sets $ruleName as rule if it is a string.
     * If it is not a string, sets $ruleName as the first item of an array (the second item is additional parameter).
     * Then checks the rules with corresponding condition (if value is defined, checks with regex etc.)
     * If the condition of a rule is not met, an error is added to the errors array.
     * Returns bool after checking if errors array is empty.
     * 
     * @return bool
     */
    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            foreach ($rules as $rule) {
                $ruleName = $rule;
                if (!is_string($ruleName)) {
                    $ruleName = $rule[0];
                }

                if (isset($value)) {
                    if ($ruleName === self::RULE_REQUIRED && !$value) {
                        $this->addError($attribute, self::RULE_REQUIRED);
                    }
    
                    if ($ruleName === self::RULE_SKU && !preg_match("/^([0-9a-zA-Z])+$/", $value)) {
                        $this->addError($attribute, self::RULE_SKU);
                    }
    
                    if ($ruleName === self::RULE_CHARS_MAX && strlen($value) > $rule['max']) {
                        $this->addError($attribute, self::RULE_CHARS_MAX, $rule);
                    }
    
                    if ($ruleName === self::RULE_NUMBER && !preg_match("/^(\d+|\d+\.\d{1,2})$/", $value)) {
                        $this->addError($attribute, self::RULE_NUMBER);
                    }
    
                    if ($ruleName === self::RULE_INT && !filter_var($value, FILTER_VALIDATE_INT)) {
                        $this->addError($attribute, self::RULE_INT);
                    }
    
                    if ($ruleName === self::RULE_MIN && $value < $rule['min']) {
                        $this->addError($attribute, self::RULE_MIN, $rule);
                    }
    
                    if ($ruleName === self::RULE_MAX && $value > $rule['max']) {
                        $this->addError($attribute, self::RULE_MAX, $rule);
                    }
                }
                
            }

        }
        return empty($this->errors);
    }
}
