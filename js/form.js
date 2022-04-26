/* Form validation with jQuery validation */

$(function(){

    'use strict';

    const $productForm = $('#product_form');

    /* Validation */

    // validate SKU against regex
    $.validator.addMethod('skuRegex', function(value, element){
    return this.optional(element) || /^([0-9a-zA-Z])+$/.test(value);
    }, 'SKU can contain only letters or numbers');

    // validate numerical attributes against regex
    $.validator.addMethod('productAttributeRegex', function(value, element){
    return this.optional(element) || /^(\d+|\d+\.\d{1,2})$/.test(value);
    }, 'Decimal number in format X.XX with max two digits after decimal point');

    $.validator.addClassRules('formAttributes', {
        required: true,
        min: 0,
        max: 1000000,
        productAttributeRegex: true
    });

    $productForm.validate({
    rules: {
        sku: {required: true, maxlength: 100, skuRegex: true },
        name: {required: true, maxlength: 100},
        productType: 'required',
        size: {required: true, digits: true, min: 0, max: 1000000},
    },
    messages: {
        productType: {required: 'Product type must be chosen'}
    }
    });

    /* Submit form */

    $('#save-btn').click(function() {
        $productForm.validate({
            submitHandler: function(form) {
                $(form).submit();
            }
        });
    }); 

});
