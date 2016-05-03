<html>
<head>
<title>All Enquiry</title>
</head>
<body>
<?php 
	require_once "../app/Mage.php";
	Mage::app();
	$post = Mage::app()->getRequest()->getParams();
    $password = "liveitcs";
	if(isset($post['password']) && $post['password'] == $password)
	  { 

 	$resource = Mage::getSingleton('core/resource');
	$readConnection = $resource->getConnection('core_read');	
	$table      = $resource->getTableName('contact_forms');
	$query = 'SELECT * FROM '.$table.' WHERE 1 order by modified_at desc';
	$results = $readConnection->fetchAll($query);
?>
<table cellpadding="10" cellpadding="10" width="100%">
<?php 	
	foreach($results as $key => $result)
	  {
   if($key == 0)
     {
?>
<thead>
<?php 	 
	 foreach($result as $mkey=>$value)
	  {
?>
<th><?php echo $mkey; ?></th>
<?php 	
       }
?>
</thead>
<?php 	 
      
	 }
?>
<tr>
<?php 	 
	 foreach($result as $mkey=>$value)
	  {
?>
<td><?php echo $value; ?></td>
<?php 	
       }
?>
</tr>
<?php 
	  }

?>
</table>
<?php }
  else
    {
 ?>
   <form name="OpenRestrictedArea" action="" method="post" >
   Type Your Password <input type="password" name="password" value="" placeholder="Type your password" />
   <input type="submit" name="Login" value="Login" />
   </form>
 <?php }?>
</body>
</html>