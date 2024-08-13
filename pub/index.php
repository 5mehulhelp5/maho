<?php
/**
 * OpenMage
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available at https://opensource.org/license/osl-3-0-php
 *
 * @category   Mage
 * @package    Mage
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://www.magento.com)
 * @copyright  Copyright (c) 2018-2023 The OpenMage Contributors (https://www.openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

define('MAGENTO_ROOT', dirname(__DIR__));

$maintenanceFile = 'maintenance.flag';
$maintenanceIpFile = 'maintenance.ip';

if (file_exists(MAGENTO_ROOT . DIRECTORY_SEPARATOR . 'app/bootstrap.php')) {
    require MAGENTO_ROOT . '/app/bootstrap.php';
    require MAGENTO_ROOT . '/app/Mage.php';
} else {
    require MAGENTO_ROOT . '/vendor/mahocommerce/maho/app/bootstrap.php';
    require MAGENTO_ROOT . '/vendor/mahocommerce/maho/app/Mage.php';
}

#Varien_Profiler::enable();

umask(0);

/* Store or website code */
$mageRunCode = $_SERVER['MAGE_RUN_CODE'] ?? '';

/* Run store or run website */
$mageRunType = $_SERVER['MAGE_RUN_TYPE'] ?? 'store';

if (file_exists($maintenanceFile)) {
    $maintenanceBypass = false;

    if (is_readable($maintenanceIpFile)) {
        /* Use Mage to get remote IP (in order to respect remote_addr_headers xml config) */
        Mage::init($mageRunCode, $mageRunType);
        $currentIp = Mage::helper('core/http')->getRemoteAddr();
        $allowedIps = preg_split('/[\ \n\,]+/', file_get_contents($maintenanceIpFile), 0, PREG_SPLIT_NO_EMPTY);
        $maintenanceBypass = in_array($currentIp, $allowedIps, true);
    }
    if (!$maintenanceBypass) {
        include_once Mage::findFileInIncludePath('errors/503.php');
        exit;
    }

    // remove config cache to make the system check for DB updates
    $config = Mage::app()->getConfig();
    $config->getCache()->remove($config->getCacheId());
}

Mage::run($mageRunCode, $mageRunType);
