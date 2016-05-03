<?php

class Mango_Attributeswatches_PriceController extends Mage_Core_Controller_Front_Action {

    public function indexAction() {
        echo "";
        exit;
    }

    public function getAjaxPriceAction() {
        $_id = $this->getRequest()->getParam("productid");
        if ($_id)
            $_product = Mage::getModel('catalog/product')->load($_id);
        $productBlock = $this->getLayout()->createBlock('catalog/product_price');
        $_price_html = $productBlock->getPriceHtml($_product);
        $_json_response = array(
            'result' => 'success',
            'price_html' => $_price_html
                );
        $this->getResponse()
                ->clearHeaders()
                ->setHeader('Content-Type', 'application/json')
                ->setHeader('Access-Control-Allow-Origin', '*')
                ->setBody(json_encode($_json_response))
                ->sendResponse();
        exit;
    }

}
