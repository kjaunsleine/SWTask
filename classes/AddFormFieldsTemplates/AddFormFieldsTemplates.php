<?php
namespace SWTask\AddFormFieldsTemplates;

/**
 * Creates form input fields and option tags
 */
abstract class AddFormFieldsTemplates
{
    /**
     * Creates input field with label and field for error messages
     * 
     * @param string $label Input field label
     * @param string $attribute Name Name of product's attribute, also name of the field
     * @param object $validation Validation object, which contains error messages and submitted values
     * 
     * @return void
     */
    protected function createAttributeField($label, $attributeName, $validation) {
            $value = isset($validation->$attributeName) ? $validation->getValue($attributeName) : "";
            $error = isset($validation->$attributeName) ? $validation->getFirstError($attributeName) : "";
        return sprintf('<div class="row row-cols-md-6 flex-column flex-sm-row">
                            <label class="col col-form-label">%1$s</label>
                            <div class="col col-md-6 col-lg-4">
                                <input id="%2$s" class="form-control formAttributes" type="number" name="%2$s" value="%3$s">
                                <label class="error" for="%2$s">%4$s</label>
                            </div>
                        </div>', 
                        $label, $attributeName, $value, $error
        );
    }

    /**
     * Creates <option> with defined value and/or 'selected' attribute
     * 
     * @param string $productType Type of the product
     * @param object $validation Validation object, which contains error messages and submitted values
     * 
     * @return string
     */
    protected function createProductTypeOption($productType, $validation)
    {
        $selected = (isset($validation) && $productType === $validation->getValue('productType')) ? 'selected' : '';
        $option = sprintf('<option value="%s" %s>%s</option>', 
                        $productType, $selected, $productType);
        return $option;
    }
}
