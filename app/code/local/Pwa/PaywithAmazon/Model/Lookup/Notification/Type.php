<?php

/**
 * This file is part of The Official Amazon Payments Magento Extension
 * (c) Pay with Amazon
 * All rights reserved
 *
 * Reuse or modification of this source code is not allowed
 * without written permission from Pay with Amazon
 *
 * @category   Pwa
 * @package    Pwa_PaywithAmazon
 * @copyright  Pay with Amazon
 * @author     Pay with Amazon
 */
class Pwa_PaywithAmazon_Model_Lookup_Notification_Type extends Pwa_PaywithAmazon_Model_Lookup_Abstract {

    public function toOptionArray() {
        if (null === $this->_options) {
            $this->_options = array(
                array(
                    'value' => 'NewOrderNotification',
                    'label' => 'NewOrderNotification'
                ),
                array(
                    'value' => 'OrderCancelledNotification',
                    'label' => 'OrderCancelledNotification'
                ),
                array(
                    'value' => 'OrderReadyToShipNotification',
                    'label' => 'OrderReadyToShipNotification'
                )
            );
        }
        return $this->_options;
    }
}
