<?php

class Atom_Paynetz_Model_Cron{   
	public function cronTest() {
		$tableName = Mage::getSingleton('core/resource')->getTableName('sales/order');
		$resource = Mage::getSingleton('core/resource');
		$readConnection = $resource->getConnection('core_read');

		Mage::log("Cron Test First Second",null,"mageCronll.log");

		$query = "SELECT increment_id,grand_total,created_at FROM $tableName WHERE status = 'pending'";

		$sql = $readConnection->fetchAll($query);      
		$url='http://paynetzuat.atomtech.in/paynetz/vfts';

		$param = Mage::getStoreConfig('payment/paynetz_standard');

		/*
		$fields = array(
						'login'		=> $param['Atompg_login_id'],
                        'txnid'		=> $order->getIncrementId(),
						'date'		=> $encodedDate,
						'custacc'   => '123456789012',					
					);
		*/

		$response_URL 	=	"http://paynetzuat.atomtech.in/paynetz/vfts";
		
		foreach($sql as $res){
			$pa='?merchantid='.$param['Atompg_login_id'].'&merchanttxnid='.$res['increment_id'].'&amt='.$res['grand_total'].'&tdate='.$res['created_at'];
			
			$sendurl=$url.$pa;

			Mage::log("Cron Test ".$sendurl,null,"mageCronll.log");
			
			$ch = curl_init();
			$useragent = 'Atom plugin';
			curl_setopt($ch, CURLOPT_URL, $response_URL);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_PORT , 443);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $pa);
			curl_setopt($ch, CURLOPT_USERAGENT, $useragent);;
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			//information received from gateway is stored in $response.
			$response = curl_exec($ch);

			if(curl_errno($ch))
			{	

				echo '<div class="">Curl error: "'. curl_error($ch).". Error in gateway credentials.</div>";
				die;
			}
			curl_close($ch);
			
			//$test_response = '<VerifyOutput MerchantID="160 " MerchantTxnID="57" AMT="18.00" VERIFIED="SUCCESS" BID="2835321" bankname="Atom Bank" atomtxnId="283532" discriminator="NB" surcharge="0.00" CardNumber="" TxnDate="2015-08-22 17:46:53"/>';
			
			$parser = xml_parser_create('');
			xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, "UTF-8");
			xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
			xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
			xml_parse_into_struct($parser, trim($response), $xml_values);
			xml_parser_free($parser);

			Mage::log("Cron Test Response".print_r($xml_values),null,"mageCronll.log");
			
			$result_resp=$xml_values[0]['attributes']['VERIFIED'];
			
			$query = "UPDATE sales_flat_order_grid SET satatus='complete' WHERE increment_id = $res['increment_id']";

			$query = "UPDATE sales_flat_order_grid SET satatus='complete' WHERE increment_id = $res['increment_id']";

			Mage::log("Cron Test ".$result_resp,null,"mageCronll.log");
		}
	}
}