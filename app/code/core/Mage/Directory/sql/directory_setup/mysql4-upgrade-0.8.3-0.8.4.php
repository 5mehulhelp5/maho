<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Directory
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2022 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;
$installer->startSetup();

$installer->run("
INSERT INTO `{$installer->getTable('directory_country')}` (`country_id`, `iso2_code`, `iso3_code`) VALUES
('GG', 'GG', 'GGY'),('IM', 'IM', 'IMN'),('JE', 'JE', 'JEY'),('ME', 'ME', 'MNE'),
('BL', 'BL', 'BLM'),('MF', 'MF', 'MAF'),('RS', 'RS', 'SRB'),('TL', 'TL', 'TLS');
");

$installer->endSetup();
