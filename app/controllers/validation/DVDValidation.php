<?php

namespace App\Controllers\Validation;

/**
 * Extends ProductValidation class
 * 
 * attributesValidation() validates 'size' field for product class DVD
 * 
 */
class DVDValidation extends ProductValidation
{
    /**
     * @param array $data
     * 
     * @return void
     */
    public function attributesValidation($data)
    {
        $size = $data['size'];
        $sizeError = ''; 
        if (empty($size)) {
            $sizeError = 'Field is required';
        } elseif (!preg_match("/^(\d+|\d+\.\d{1,2})$/", $size)) {
            $sizeError = 'Max 2 digits after decimal point';
        } elseif ($size > 1000000) {
            $sizeError = 'Number can not be larger than 1000000';
        } elseif ($size < 0) {
            $sizeError = 'Number can not be smaller than 0';
        }

        if (!empty($sizeError)) {
            $this->errors['sizeError'] = $sizeError;
        }
    }
}
