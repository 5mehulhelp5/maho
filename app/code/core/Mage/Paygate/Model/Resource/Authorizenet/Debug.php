<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Paygate
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2022-2023 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Resource authorizenet debug model
 *
 * @category   Mage
 * @package    Mage_Paygate
 */
class Mage_Paygate_Model_Resource_Authorizenet_Debug extends Mage_Core_Model_Resource_Db_Abstract
{
    #[\Override]
    protected function _construct()
    {
        $this->_init('paygate/authorizenet_debug', 'debug_id');
    }
}
