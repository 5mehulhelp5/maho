<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Eav
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2023 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * EAV Entity Attribute Date time Data Model
 *
 * @category   Mage
 * @package    Mage_Eav
 */
class Mage_Eav_Model_Attribute_Data_Datetime extends Mage_Eav_Model_Attribute_Data_Date
{
    /**
     * Return Data Form Input/Output Filter
     *
     * @return Varien_Data_Form_Filter_Interface|false
     */
    #[\Override]
    protected function _getFormFilter()
    {
        $filterCode = $this->getAttribute()->getInputFilter();
        if ($filterCode) {
            $filterClass = 'Varien_Data_Form_Filter_' . ucfirst($filterCode);
            if ($filterCode == 'datetime') {
                $filter = new $filterClass(
                    $this->_getLocale()->getDateTimeFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
                    $this->_getLocale()->getLocale()
                );
            } else {
                $filter = new $filterClass();
            }
            return $filter;
        }
        return false;
    }

    /**
     * Get Locale
     *
     * @return Mage_Core_Model_Locale
     */
    protected function _getLocale()
    {
        return Mage::app()->getLocale();
    }
}
