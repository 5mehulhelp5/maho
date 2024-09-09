<?php
/**
 * OpenMage
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available at https://opensource.org/license/osl-3-0-php
 *
 * @category   Mage
 * @package    Mage_Payment
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://www.magento.com)
 * @copyright  Copyright (c) 2019-2023 The OpenMage Contributors (https://www.openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * @category   Mage
 * @package    Mage_Payment
 */
class Mage_Payment_Block_Info_Purchaseorder extends Mage_Payment_Block_Info
{
    #[\Override]
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('payment/info/purchaseorder.phtml');
    }

    /**
     * @return string
     */
    #[\Override]
    public function toPdf()
    {
        $this->setTemplate('payment/info/pdf/purchaseorder.phtml');
        return $this->toHtml();
    }
}
