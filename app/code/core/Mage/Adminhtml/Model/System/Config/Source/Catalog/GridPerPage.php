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
 * Catalog products per page on Grid mode source
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 */
class Mage_Adminhtml_Model_System_Config_Source_Catalog_GridPerPage
{
    public function toOptionArray()
    {
        $result = [];
        $perPageValues = Mage::getConfig()->getNode('frontend/catalog/per_page_values/grid');
        $perPageValues = explode(',', $perPageValues);
        foreach ($perPageValues as $option) {
            $result[] = ['value' => $option, 'label' => $option];
        }
        //$result[] = array('value' => 'all', 'label' => Mage::helper('catalog')->__('All'));
        return $result;
    }
}
