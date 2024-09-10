<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Uploader
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2022-2023 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * @category   Mage
 * @package    Mage_Uploader
 *
 * @method $this setDomNodes(array $domNodesIds)
 *      Array of element browse buttons ids
 * @method $this setIsDirectory(bool $isDirectory)
 *      Pass in true to allow directories to be selected (Google Chrome only)
 * @method $this setSingleFile(bool $isSingleFile)
 *      To prevent multiple file uploads set this to true.
 *      Also look at config parameter singleFile (Mage_Uploader_Model_Config_Uploader setSingleFile())
 * @method $this setAttributes(array $attributes)
 *      Pass object of keys and values to set custom attributes on input fields.
 *      @see http://www.w3.org/TR/html-markup/input.file.html#input.file-attributes
 */
class Mage_Uploader_Model_Config_Browsebutton extends Mage_Uploader_Model_Config_Abstract
{
    /**
     * Set params for browse button
     */
    #[\Override]
    protected function _construct()
    {
        $this->setIsDirectory(false);
    }

    /**
     * Get MIME types from files extensions
     *
     * @param string|array $exts
     * @return string
     */
    public function getMimeTypesByExtensions($exts)
    {
        $mimes = array_unique($this->_getHelper()->getMimeTypeFromExtensionList($exts));

        // Not include general file type
        unset($mimes['application/octet-stream']);

        return implode(',', $mimes);
    }
}
