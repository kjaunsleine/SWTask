import Fields from '../js/fields.js';

$(function(){

    'use strict';

    const productFields = new Fields();

    /* Change form depending on type */
    const $productFields = $('#productFields');
    $('#productType').change(function() {
        $('#productType option').each(function() {
            let typeOption = $(this).attr('value');
            if (!typeOption) {
                return;
            } else {
                $productFields.html('');
            }
        });
        let typeSelected = $('#productType option:selected').attr('value');
        if (!typeSelected) {
        return;
        } else {
            $productFields.html(productFields[typeSelected + 'Fields']);
        }
    }).change();

    const $productForm = $('#product_form');


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

    $productForm.validate({
    rules: {
        sku: {required: true, maxlength: 100, skuRegex: true },
        name: {required: true, maxlength: 100},
        productType: 'required',
    },
    messages: {
        productType: {required: 'Product type must be chosen'}
    }
    });

    /* Submit form with AJAX*/

    const getFirstError = (attribute, errors) => {
        let error = errors[attribute][0] ? errors[attribute][0] : '';
        let attributeIdError = $(`#${attribute}-error`);
        $(attributeIdError).show().html(error);
    }

    $productForm.submit(function(event){
        event.preventDefault();
        if($productForm.valid()){
            const dataString = $(this).serialize();
            console.log(dataString);
            $.ajax({
                type: 'POST',
                url: 'includes/addProduct.inc.php',
                data: dataString,
                dataType: 'json',
                success: function(data){
                    let errors = data['errors'];
                    if (errors !== 0) {
                        for (let attribute in errors) {
                            getFirstError(attribute, errors);
                        }
                    } else {
                        window.location.href = 'index.php';
                    }
                }
            });
        }
    });
});
