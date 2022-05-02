$(function(){
    'use strict';

    /* Delete product */
    const deleteProduct = () => {
        $('.delete-checkbox:checked').parent().remove();
    }
    $('#delete-product-btn').on('click', deleteProduct);
});
