<?php

namespace App\Controllers\Validation;

/**
 * Extends ProductValidation class
 * 
 * attributesValidation() validates 'height', 'length' and 'width' fields for product class Furniture
 * 
 */
class FurnitureValidation extends ProductValidation
{
    /**
     * @param array $data
     * 
     * @return void
     */
    public function attributesValidation($data)
    {
        $height = $data['height'];
        $length = $data['length'];
        $width = $data['width'];

        $heightError = '';
        $lengthError = '';
        $widthError = '';

        if (empty($height)) {
            $heightError = 'Field is required';
        } elseif (!preg_match("/^(\d+|\d+\.\d{1,2})$/", $height)) {
            $heightError = 'Max 2 digits after decimal point';
        } elseif ($height > 1000000) {
            $heightError = 'Number can not be larger than 1000000';
        } elseif ($height < 0) {
            $heightError = 'Number can not be smaller than 0';
        }

        if (empty($length)) {
            $lengthError = 'Field is required';
        } elseif (!preg_match("/^(\d+|\d+\.\d{1,2})$/", $length)) {
            $lengthError = 'Max 2 digits after decimal point';
        } elseif ($length > 1000000) {
            $lengthError = 'Number can not be larger than 1000000';
        } elseif ($length < 0) {
            $lengthError = 'Number can not be smaller than 0';
        }

        if (empty($width)) {
            $widthError = 'Field is required';
        } elseif (!preg_match("/^(\d+|\d+\.\d{1,2})$/", $width)) {
            $widthError = 'Max 2 digits after decimal point';
        } elseif ($width > 1000000) {
            $widthError = 'Number can not be larger than 1000000';
        } elseif ($width < 0) {
            $widthError = 'Number can not be smaller than 0';
        }
        
        if (!empty($heightError)) {
            $this->errors['heightError'] = $heightError;
        }

        if (!empty($lengthError)) {
            $this->errors['lengthError'] = $lengthError;
        }

        if (!empty($widthError)) {
            $this->errors['widthError'] = $widthError;
        }
    }
}
