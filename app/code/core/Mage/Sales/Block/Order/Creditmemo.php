<?php
/**
 * OpenMage
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available at https://opensource.org/license/osl-3-0-php
 *
 * @category   Mage
 * @package    Mage_Sales
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://www.magento.com)
 * @copyright  Copyright (c) 2020-2023 The OpenMage Contributors (https://www.openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Sales order view block
 *
 * @category   Mage
 * @package    Mage_Sales
 */
class Mage_Sales_Block_Order_Creditmemo extends Mage_Sales_Block_Order_Creditmemo_Items
{
    #[\Override]
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('sales/order/creditmemo.phtml');
    }

    /**
     * @inheritDoc
     */
    #[\Override]
    protected function _prepareLayout()
    {
        /** @var Mage_Page_Block_Html_Head $headBlock */
        $headBlock = $this->getLayout()->getBlock('head');
        if ($headBlock) {
            $headBlock->setTitle($this->__('Order # %s', $this->getOrder()->getRealOrderId()));
        }

        /** @var Mage_Payment_Helper_Data $helper */
        $helper = $this->helper('payment');
        $this->setChild(
            'payment_info',
            $helper->getInfoBlock($this->getOrder()->getPayment())
        );

        return parent::_prepareLayout();
    }

    /**
     * @return string
     */
    public function getPaymentInfoHtml()
    {
        return $this->getChildHtml('payment_info');
    }

    /**
     * Retrieve current order model instance
     *
     * @return Mage_Sales_Model_Order
     */
    #[\Override]
    public function getOrder()
    {
        return Mage::registry('current_order');
    }

    /**
     * Return back url for logged in and guest users
     *
     * @return string
     */
    public function getBackUrl()
    {
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            return Mage::getUrl('*/*/history');
        }
        return Mage::getUrl('*/*/form');
    }

    /**
     * Return back title for logged in and guest users
     *
     * @return string
     */
    public function getBackTitle()
    {
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            return Mage::helper('sales')->__('Back to My Orders');
        }
        return Mage::helper('sales')->__('View Another Order');
    }

    /**
     * @param Mage_Sales_Model_Order $order
     * @return string
     */
    public function getInvoiceUrl($order)
    {
        return Mage::getUrl('*/*/invoice', ['order_id' => $order->getId()]);
    }

    /**
     * @param Mage_Sales_Model_Order $order
     * @return string
     */
    public function getShipmentUrl($order)
    {
        return Mage::getUrl('*/*/shipment', ['order_id' => $order->getId()]);
    }

    /**
     * @param Mage_Sales_Model_Order $order
     * @return string
     */
    public function getViewUrl($order)
    {
        return Mage::getUrl('*/*/view', ['order_id' => $order->getId()]);
    }

    /**
     * @param Mage_Sales_Model_Order_Creditmemo $creditmemo
     * @return string
     */
    #[\Override]
    public function getPrintCreditmemoUrl($creditmemo)
    {
        return Mage::getUrl('*/*/printCreditmemo', ['creditmemo_id' => $creditmemo->getId()]);
    }

    /**
     * @param Mage_Sales_Model_Order $order
     * @return string
     */
    #[\Override]
    public function getPrintAllCreditmemosUrl($order)
    {
        return Mage::getUrl('*/*/printCreditmemo', ['order_id' => $order->getId()]);
    }
}
