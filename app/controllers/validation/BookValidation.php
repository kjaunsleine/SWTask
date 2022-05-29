<?php

namespace App\Controllers\Validation;

/**
 * Extends ProductValidation class
 * 
 * attributesValidation() validates 'weight' field for product class Book
 * 
 */
class BookValidation extends ProductValidation
{
    /**
     * @param array $data
     * 
     * @return void
     */
    public function attributesValidation($data)
    {
        $weight = $data['weight'];
        $weightError = '';
        if (empty($weight)) {
            $weightError = 'Field is required';
        } elseif (!preg_match("/^(\d+|\d+\.\d{1,2})$/", $weight)) {
            $weightError = 'Max 2 digits after decimal point';
        } elseif ($weight > 1000000) {
            $weightError = 'Number can not be larger than 1000000';
        } elseif ($weight < 0) {
            $weightError = 'Number can not be smaller than 0';
        }
        if (!empty($weightError)) {
            $this->errors['weightError'] = $weightError;
        }
    }
}
