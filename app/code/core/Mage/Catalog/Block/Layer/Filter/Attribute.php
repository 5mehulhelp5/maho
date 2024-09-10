<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Catalog
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2023 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Catalog attribute layer filter
 *
 * @category   Mage
 * @package    Mage_Catalog
 */
class Mage_Catalog_Block_Layer_Filter_Attribute extends Mage_Catalog_Block_Layer_Filter_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_filterModelName = 'catalog/layer_filter_attribute';
    }

    /**
     * @return $this|Mage_Catalog_Block_Layer_Filter_Abstract
     */
    #[\Override]
    protected function _prepareFilter()
    {
        $this->_filter->setAttributeModel($this->getAttributeModel());
        return $this;
    }
}
