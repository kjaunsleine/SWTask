<?php
namespace SWTask\AddFormFieldsTemplates;

/**
 * Contains methods which creates <formfields> for specific product types
 */
class AddFormFieldsTemplatesContr extends AddFormFieldsTemplates
{
    /**
     * @var object Validation object, which contains error messages and submitted values
     */
    private $validation;

    /**
     * @param object $validation
     * 
     * @return void
     */
    public function setValidation($validation)
    {
        $this->validation = $validation;
    }

    /**
     * Creates <option> tags for specific product types
     * 
     * @return string
     */
    public function getSelectOptions()
    {
        $options = $this->createProductTypeOption('Book', $this->validation);
        $options .= $this->createProductTypeOption('DVD', $this->validation);
        $options .= $this->createProductTypeOption('Furniture', $this->validation);
        return $options;
    }

    /**
     * Creates product type Book fields with attribute message
     * 
     * @param string $message
     * 
     * @return string
     */
    public function getBookFields($message)
    {
        $weightField = $this->createAttributeField('Weight (KG)', 'weight', $this->validation);
        return sprintf('<fieldset id="Book" class="row">
                            %s
                            <div class="form-text">%s</div>
                        </fieldset>', $weightField, $message);
    }

    /**
     * Creates product type DVD fields with attribute message
     * 
     * @param string $message
     * 
     * @return string
     */
    public function getDVDFields($message)
    {
        $sizeFields = $this->createAttributeField('Size (MB)', 'size', $this->validation);
        return sprintf('<fieldset id="DVD" class="row">
                            %s
                            <div class="form-text">%s</div>
                        </fieldset>', $sizeFields, $message);
    }

    /**
     * Creates product type Furniture fields with attribute message
     * 
     * @param string $message
     * 
     * @return string
     */
    public function getFurnitureFields($message)
    {
        $heightField = $this->createAttributeField('Height (CM)', 'height', $this->validation);
        $widthField = $this->createAttributeField('Width (CM)', 'width', $this->validation);
        $lengthField = $this->createAttributeField('Length (CM)', 'length', $this->validation);
        return sprintf('<fieldset id="Furniture" class="row">
                            <div class="col-12">
                            %s
                            %s
                            %s
                            <div>
                            <div class="form-text">%s</div>
                        </fieldset>', $heightField, $widthField, $lengthField, $message);
    }

    /**
     * Gets all product type fieldsets
     * 
     * @param string $message
     * 
     * @return string
     */
    public function getProductAttributeFields()
    {
        $fields = $this->getBookFields('Please provide weight in KG');
        $fields .= $this->getDVDFields('Please provide size in MB');
        $fields .= $this->getFurnitureFields('Please provide dimensions in CM');
        return $fields;
    }
}
