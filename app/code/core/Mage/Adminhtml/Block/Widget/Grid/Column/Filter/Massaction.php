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
 * Massaction grid column filter
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 */
class Mage_Adminhtml_Block_Widget_Grid_Column_Filter_Massaction extends Mage_Adminhtml_Block_Widget_Grid_Column_Filter_Checkbox
{
    #[\Override]
    public function getCondition()
    {
        if ($this->getValue()) {
            return ['in' => ($this->getColumn()->getSelected() ? $this->getColumn()->getSelected() : [0])];
        } else {
            return ['nin' => ($this->getColumn()->getSelected() ? $this->getColumn()->getSelected() : [0])];
        }
    }
}
