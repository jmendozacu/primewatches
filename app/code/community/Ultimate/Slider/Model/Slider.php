<?php
/**
 * Ultimate_Slider extension
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 * 
 * @category       Images & Media
 * @package        Ultimate_Slider
 * @copyright      Copyright (c) 2015
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Slider model
 *
 * @category    Images & Media
 * @package     Ultimate_Slider
 * @author      Rajasingh and Manikandan D
 */
class Ultimate_Slider_Model_Slider extends Mage_Core_Model_Abstract
{   
    /**
     * constructor
     *
     * @access public
     */
    public function _construct()
    {
        parent::_construct();
        $this->_init('ultimate_slider/slider');
    }

    /**
     * before save get current timestamp
     *
     * @access protected
     */
    protected function _beforeSave()
    {
        parent::_beforeSave();
        if ($this->isObjectNew()) {
            $this->setData('created_at', Varien_Date::now());
        }
        return $this;
    }    
}
