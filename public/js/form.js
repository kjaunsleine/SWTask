$(function(){

    'use strict';

    const url = 'http://localhost:8000';
    const addFieldsUrl = url + '/add/fields';

    $('#productType').on('change', function(){
        const dataString = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: addFieldsUrl,
            data: dataString,
            success: function(data){
                    $('#productFields').html(data);
            }
        });
    });

    /* Form validation with jQuery validation */

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

    $('#product_form').validate({
        rules: {
            sku: {required: true, maxlength: 100, skuRegex: true },
            name: {required: true, maxlength: 100},
            productType: 'required',
        },
        messages: {
            productType: {required: 'Product type must be chosen'}
        }
    });
});
