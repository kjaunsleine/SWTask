<?php
namespace SWTask\FormValidation;

/**
 * Establishes validation rules and validation error handling
 */
abstract class FormValidation
{
    // Validation rules as constants
    public const RULE_REQUIRED = 'required';
    public const RULE_SKU = 'sku';
    public const RULE_CHARS_MAX = 'max characters';
    public const RULE_NUMBER = 'number';
    public const RULE_INT = 'int';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    
    // Array of errors
    /**
     * @var array
     */
    protected $errors = [];

    /**
     * Gets data from form and sets properties
     * 
     * Gets data as array from $_POST and iterates through it, 
     * sets property that is named as key with associated value
     * 
     * @param array $data
     * 
     * @return void
     */
    public function getData($data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = htmlspecialchars($value);
        }
    }
    
    /**
     * Adds an error to error array.
     *  
     * Gets error message from errorMessages array with associated rule if there is one
     * Iterates through params array and replaces placeholders 
     * in message with the value in params array.
     * Adds error to errors array as attribute => message pair.
     * 
     * @param string $attribute
     * @param string $rule
     * @param array $params
     * 
     * @return void
     */
    public function addError($attribute, $rule, $params = [])
    {
        $message = $this->errorMessages()[$rule] ?? '';

        foreach ($params as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }

        $this->errors[$attribute][] = $message;
    }

    /**
     * Defines error messages with associated rules
     * 
     * @return array
     */
    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_SKU => 'SKU can contain only letters and numbers',
            self::RULE_CHARS_MAX => 'Can contain less than {max} characters',
            self::RULE_NUMBER => 'Max 2 digits after decimal point',
            self::RULE_INT =>'Number has to be a whole number',
            self::RULE_MIN => 'Number can not be smaller than {min}',
            self::RULE_MAX => 'Number can not be larger than {max}'
        ];
    }

    
    /**
     * Returns first error
     * 
     * Returns first error to the corresponding attribute 
     * from errors array if it exists else returns nothing
     * 
     * @param string $attribute
     * 
     * @return string|void
     */
    public function getFirstError($attribute)
    {
        return $this->errors[$attribute][0] ?? "";
    }

    
    /**
     * Returns errors array with all error messages to associated attributes
     * 
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
