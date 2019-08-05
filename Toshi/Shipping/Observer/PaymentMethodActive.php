<?php
namespace Toshi\Shipping\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use \Magento\Framework\App\Config\ScopeConfigInterface as ScopeConfig;
use \Magento\Sales\Api\Data\OrderInterface as Order;

class PaymentMethodActive implements ObserverInterface
{
    public function __construct(ScopeConfig $scopeConfig, Order $order) {
        $this->scopeConfig = $scopeConfig;
        $this->_order = $order;
    }

    /**
     * Below is the method that will fire whenever the event runs
     *
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        if ($observer->getEvent()->getQuote() != null) {
            $shippingMethod = $observer->getEvent()->getQuote()->getShippingAddress()->getShippingMethod();

            $paymentMethod = $observer->getEvent()->getMethodInstance();

            $result = $observer->getEvent()->getResult();

            // Show only the COD payment method if TOSHI was selected as the shipping option, otherwise show all
            // other payment methods except COD
            if(($paymentMethod->getCode() != 'cashondelivery' && $shippingMethod == 'toshi_toshi') || ($paymentMethod->getCode() == 'cashondelivery' && $shippingMethod != 'toshi_toshi') ){
                $result->setData('is_available', false);
            }
        }
    }
}
