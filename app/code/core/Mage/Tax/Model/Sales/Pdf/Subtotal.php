<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Tax
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2023 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Class Mage_Tax_Model_Sales_Pdf_Subtotal
 *
 * @category   Mage
 * @package    Mage_Tax
 */
class Mage_Tax_Model_Sales_Pdf_Subtotal extends Mage_Sales_Model_Order_Pdf_Total_Default
{
    /**
     * Get array of arrays with totals information for display in PDF
     * array(
     *  $index => array(
     *      'amount'   => $amount,
     *      'label'    => $label,
     *      'font_size'=> $font_size
     *  )
     * )
     * @return array
     */
    #[\Override]
    public function getTotalsForDisplay()
    {
        $store = $this->getOrder()->getStore();
        $helper = Mage::helper('tax');
        $amount = $this->getOrder()->formatPriceTxt($this->getAmount());
        if ($this->getSource()->getSubtotalInclTax()) {
            $amountInclTax = $this->getSource()->getSubtotalInclTax();
        } else {
            $amountInclTax = $this->getAmount()
                + $this->getSource()->getTaxAmount()
                - $this->getSource()->getShippingTaxAmount();
        }

        $amountInclTax = $this->getOrder()->formatPriceTxt($amountInclTax);
        $fontSize = $this->getFontSize() ? $this->getFontSize() : 7;

        if ($helper->displaySalesSubtotalBoth($store)) {
            $totals = [
                [
                    'amount'    => $this->getAmountPrefix() . $amount,
                    'label'     => Mage::helper('tax')->__('Subtotal (Excl. Tax)') . ':',
                    'font_size' => $fontSize
                ],
                [
                    'amount'    => $this->getAmountPrefix() . $amountInclTax,
                    'label'     => Mage::helper('tax')->__('Subtotal (Incl. Tax)') . ':',
                    'font_size' => $fontSize
                ],
            ];
        } elseif ($helper->displaySalesSubtotalInclTax($store)) {
            $totals = [[
                'amount'    => $this->getAmountPrefix() . $amountInclTax,
                'label'     => Mage::helper('sales')->__($this->getTitle()) . ':',
                'font_size' => $fontSize
            ]];
        } else {
            $totals = [[
                'amount'    => $this->getAmountPrefix() . $amount,
                'label'     => Mage::helper('sales')->__($this->getTitle()) . ':',
                'font_size' => $fontSize
            ]];
        }

        return $totals;
    }
}
