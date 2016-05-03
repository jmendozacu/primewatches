<?php
class Atom_Paynetz_Model_Observer
{
	public function doSomething(Varien_Event_Observer $observer)
    {
    	Mage::log("Cron Test ".now(),null,"mageCron.log");
    }

}