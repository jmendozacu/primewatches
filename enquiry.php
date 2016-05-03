<?php
	require_once "app/Mage.php";
	Mage::app();
?>

<!-- Google Code for form fill up Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 958835991;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "fbcHCIHholoQl9qayQM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript"  
src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt=""  
src="//www.googleadservices.com/pagead/conversion/958835991/?label=fbcHCIHholoQl9qayQM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<?php

        $post = Mage::app()->getRequest()->getParams();
		

        $resource   = Mage::getSingleton('core/resource');
        $write      = Mage::getSingleton('core/resource')->getConnection('core_write');

        $table      = $resource->getTableName('contact_forms');
       // $subject    = $post['subject'];
        $cust_name  = $post['cust_name'];
        $email      = $post['email'];
        $phone      = $post['ext'].' '.$post['phone'];
	    $pname      = $post['pname'];	
		$city       = $post['city'];
        $comments   = $post['comment'];
		//print(filter_var($email, FILTER_VALIDATE_EMAIL)); exit;
		//if($cust_name == '' || $email == '' || $phone == '' || strlen($cust_name) < 2 || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($phone) < 10 )
		if($cust_name == '' || $email == '' || $phone == '')
		  {
?>
  <script>
   window.history.back();
  </script>
<?php 		  
		  exit;   
		  }

        $query      =  "Insert Into {$table} (cust_name,email,phone,pname,city,comments,modified_at) values ('$cust_name','$email','$phone','$pname','$city','Customer: $comments', NOW())";
        $write->query($query);

	

		
	
			$to	 		= 'fb@primewatchworld.com';
			//$to	 		= 'subikar.web@gmail.com';
			$subject	=  "Product Enquiry From :".$email;
			$massege_body 		= "
			<table width='100%' border='0' cellspacing='0' cellpadding='0'>
			<tr><td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
			<tr><td>Enquiry For product</td><td>:</td><td>".$pname."</td></tr>
			<tr><td>Full Name</td><td>:</td><td>".$cust_name."</td></tr>
			<tr><td>Email</td><td>:</td><td>".$email."</td></tr>
			<tr><td>Phone</td><td>:</td><td>".$phone."</td></tr>
			<tr><td>City</td><td>:</td><td>".$city."</td></tr>
			<tr><td>Comments</td><td>:</td><td>".$comment."</td></tr>
					
			
				<tr><td>&nbsp;</td></tr>";
				$massege_body .= "</table></td></tr></table>";
			
			$my_message 		= $massege_body;
		
				
				$headers = "Content-Type: text/html; charset=iso-8859-1";
				$headers.= "Content-Transfer-Encoding: 8bit";
				$headers.= $subject;
				$body	 = $my_message;
				$send 	 = mail($to,$subject,$body,$headers);
				if($send){
					  echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
							<html xmlns="http://www.w3.org/1999/xhtml">
							<head>
							<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
							<title>Thankyou</title>
							<script language="javascript">
							
								top.location = "'.Mage::getBaseUrl().'thank-you";
							
							</script>
							</head>
							</html>' ;
				}else{
					  echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
							<html xmlns="http://www.w3.org/1999/xhtml">
							<head>
							<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
							<title>Contact Form Submission</title>
							<script language="javascript">
								top.location = "'.Mage::getBaseUrl().'";
							</script>
							</head>
							</html>' ;
					}
					
			


?>