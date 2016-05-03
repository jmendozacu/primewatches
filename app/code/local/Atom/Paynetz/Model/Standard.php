<?php

class Atom_Paynetz_Model_Standard extends Mage_Payment_Model_Method_Abstract
{
    protected $_code  = 'paynetz_standard';
    protected $_formBlockType = 'paynetz/standard_form';
    protected $_isGateway               = false;
    protected $_canAuthorize            = true;
    protected $_canCapture              = true;
    protected $_canCapturePartial       = false;
    protected $_canRefund               = false;
    protected $_canVoid                 = false;
    protected $_canUseInternal          = false;
    protected $_canUseCheckout          = true;
    protected $_canUseForMultishipping  = false;

    protected $_order = null;

    public function getConfig()
    {
        return Mage::getSingleton('paynetz/config');
    }

    public function validate()
    {
        parent::validate();
        $paymentInfo = $this->getInfoInstance();
        if ($paymentInfo instanceof Mage_Sales_Model_Order_Payment) {
            $currency_code = $paymentInfo->getOrder()->getBaseCurrencyCode();
        } else {
            $currency_code = $paymentInfo->getQuote()->getBaseCurrencyCode();
        }

        return $this;
    }

    public function capture (Varien_Object $payment, $amount)
    {
        $payment->setStatus(self::STATUS_APPROVED)
            ->setLastTransId($this->getTransactionId());

        return $this;
    }

    public function getSecurePaynetzUrl ($server)
    {
		//return  "https://paynetzuat.atomtech.in/paynetz/epi/fts";
		return  "https://payment.atomtech.in/paynetz/epi/fts";
    }

    protected function getSuccessURL ()
    {
        return Mage::getUrl('paynetz/standard/success', array('_secure' => true));
    }

    protected function getFailureURL ()
    {
        return Mage::getUrl('paynetz/standard/failure', array('_secure' => true));
    }

    public function createFormBlock($name)
    {
        $block = $this->getLayout()->createBlock('paynetz/form_standard', $name);
        $block->setMethod($this->_code);
        $block->setPayment($this->getPayment());

        return $block;
    }

    public function getOrderPlaceRedirectUrl()
    {
        return Mage::getUrl('paynetz/standard/redirect');
    }

    public function getStandardCheckoutFormFields ()
    {
        $order = $this->getOrder();
		
        if (!($order instanceof Mage_Sales_Model_Order)) {
            Mage::throwException($this->_getHelper()->__('Cannot retrieve order object'));
        }

        $billingAddress = $order->getBillingAddress();

        $streets = $billingAddress->getStreet();
        $street = isset($streets[0]) && $streets[0] != ''
                  ? $streets[0]
                  : (isset($streets[1]) && $streets[1] != '' ? $streets[1] : '');

        if ($this->getConfig()->getDescription()) {
            $transDescription = $this->getConfig()->getDescription();
        } else {
            
			//$transDescription = Mage::helper('hdfc')->__('Order #%s', $order->getRealOrderId());
        }

        if ($order->getCustomerEmail()) {
            $email = $order->getCustomerEmail();
        } elseif ($billingAddress->getEmail()) {
            $email = $billingAddress->getEmail();
        } else {
            $email = '';
        }
		
		$amount = round($order->getBaseGrandTotal(),2);
		
		$cust_name = $billingAddress['firstname']." ".$billingAddress['lastname'];
		//$add1 = $billingAddress['street']." ".$billingAddress['city'];
		

		$shipAddress = $order->getShippingAddress();
		$countryCode = $shipAddress['country_id'];
		$countryModel = Mage::getModel('directory/country')->loadByCode($countryCode);
		$countryName = $countryModel->getName();

		$add2 = $shipAddress['street']." ".$shipAddress['city']." ".$shipAddress['region']." ".$countryName." ".$shipAddress['postcode'];
		
		//$state='state';
		//$postcode = $shipAddress['postcode'];
        /*$fields = array(
						'id'       		=> $this->getConfig()->getAccountId(),
						'password'      => $this->getConfig()->getPassword(),
						'currencycode'  => '356',
                       	//'responseURL'   => Mage::getUrl('hdfc/standard/success',array('_secure' => true)),
						'responseURL'   => $this->getSuccessURL(),
                        'udf1'     		=> $order->getRealOrderId(),
						'action'     	=> '1',
                        'amt'    		=> $amount,
                        'langid'        => 'USA',
                        'errorURL'      => $this->getSuccessURL(),
                      	//'trackid'       => $this->getConfig()->getDescription());
						'trackid'       => $order->getRealOrderId());
						 //round(5.055, 2)
						 */
						 /*$fields = array(
						'login'		=> $this->getConfig()->getAtomLogin,
						'pass'      => $this->getConfig()->getAtomPassword,
						'ttype'		=> 'NBfundTransfer',
						'prodid'    => $this->getConfig()->getAtomProductId,
                        'amt'     	=> $amount,
						'txncurr'   => 'INR',
                        'txnscamt'  => $amount,
                        'clientcode'=> urlencode(base64_encode('Magento')),
                        'txnid'		=> rand(0,999999),                      	
						'date'		=> $encodedDate,
						'custacc'   => '123456789012',
						'udf1'		=> urlencode($email),
						'udf2'		=> '9258741236',
						'udf4'		=> $billingAddress
					);
				*/
		$datenow = date("d/m/Y h:m:s");
		$encodedDate = str_replace(" ", "%20", $datenow);
		$param = Mage::getStoreConfig('payment/paynetz_standard');
		$country = $billingAddress->getStreet();
		$fields = array(
						'login'		=> $param['Atompg_login_id'],
						'pass'      => $param['Atompg_password'],
						'ttype'		=> 'NBfundTransfer',
						'prodid'    => $param['Atompg_prodId'],
                        'amt'     	=> $amount,
						'txncurr'   => 'INR',
                        'txnscamt'  => '0',
                        'clientcode'=> urlencode(base64_encode('Magento')),
                        'txnid'		=> $order->getIncrementId(),                      	
						'date'		=> $encodedDate,
						'custacc'   => '123456789012',
						'udf1'		=> urlencode($cust_name),	
						'udf2'		=> urlencode($email),
						'udf3'		=> $billingAddress['telephone'],
						'udf4'		=> urlencode($add2)						
					);
				

        if ($this->getConfig()->getDebug()) {
            $debug = Mage::getModel('paynetz/api_debug')
                ->setRequestBody($this->getSecurePaynetzUrl()."\n".print_r($fields,1))
                ->save();
            $fields['cs2'] = $debug->getId();
        }	
        return $fields;
    }

}