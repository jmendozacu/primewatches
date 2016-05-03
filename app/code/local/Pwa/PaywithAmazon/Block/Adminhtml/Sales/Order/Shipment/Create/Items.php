<?php 
	// override canCreateShippingLabel() showing error isShippingLabelsAvailable() not define
class Pwa_PaywithAmazon_Block_Adminhtml_Sales_Order_Shipment_Create_Items extends Mage_Adminhtml_Block_Sales_Order_Shipment_Create_Items
{	
	public function canCreateShippingLabel()
	    {	 
            $carrier = $this->getOrder()->getShippingCarrier();
            if(method_exists($carrier, 'isShippingLabelsAvailable')) {
                return $carrier->isShippingLabelsAvailable();
            } else {
                return false;
            }
	    } 
}