<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2022-2023 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Product form MSRP field helper
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 */
class Mage_Adminhtml_Block_Catalog_Product_Helper_Form_Msrp_Price extends Varien_Data_Form_Element_Select
{
    /**
     * Retrieve Element HTML fragment
     *
     * @return string
     */
    #[\Override]
    public function getElementHtml()
    {
        if (is_null($this->getValue())) {
            $this->setValue(Mage_Catalog_Model_Product_Attribute_Source_Msrp_Type_Price::TYPE_USE_CONFIG);
        }
        return parent::getElementHtml();
    }
}
