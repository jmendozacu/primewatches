<?php

/**
 * Amazon Marketplace Orders API: OrderStatusList data type model
 *
 * Fields:
 * <ul>
 * <li>Status: Array<OrderStatusEnum></li>
 * </ul>
 *
 * This file is part of The Official Amazon Payments Magento Extension
 * (c) Pay with Amazon
 * All rights reserved
 *
 * Reuse or modification of this source code is not allowed
 * without written permission from Pay with Amazon
 *
 * @category   Pwa
 * @package    Pwa_PaywithAmazon
 * @copyright  Copyright (c) Pay with Amazon
 * @author     Pay with Amazon
*/
class Pwa_PaywithAmazon_Model_Api_Model_Marketplace_Orders_OrderStatusList extends Pwa_PaywithAmazon_Model_Api_Model_Marketplace_Orders_Abstract {

    public function __construct($data = null) {
        $this->_fields = array(
            'Status' => array('FieldValue' => null, 'FieldType' => array('OrderStatusEnum'))
        );
        parent::__construct($data);
    }

}
