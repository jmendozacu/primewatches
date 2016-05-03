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
 * Slider admin edit tabs
 *
 * @category    Images & Media
 * @package     Ultimate_Slider
 * @author      Rajasingh and Manikandan D
 */
class Ultimate_Slider_Block_Adminhtml_Slider_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    /**
     * Initialize Tabs
     *
     * @access public
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('slider_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('ultimate_slider')->__('Slider'));
    }

    /**
     * before render html
     *
     * @access protected
     * @return Ultimate_Slider_Block_Adminhtml_Slider_Edit_Tabs
     */
    protected function _beforeToHtml()
    {
        $this->addTab(
            'form_slider_details',
            array(
                'label'   => Mage::helper('ultimate_slider')->__('Details'),
                'title'   => Mage::helper('ultimate_slider')->__('Details'),
                'content' => $this->getLayout()->createBlock(
                    'ultimate_slider/adminhtml_slider_edit_tab_form'
                )
                ->toHtml(),
            )
        );

        $this->addTab(
            'form_slider_media',
            array(
                'label'   => Mage::helper('ultimate_slider')->__('Media'),
                'title'   => Mage::helper('ultimate_slider')->__('Media'),
                'content' => $this->getLayout()->createBlock(
                    'ultimate_slider/adminhtml_slider_edit_tab_media'
                )
                ->toHtml(),
            )
        );
        return parent::_beforeToHtml();
    }

    /**
     * Retrieve slider entity
     *
     * @access public
     * @return Ultimate_Slider_Model_Slider
     */
    public function getSlider()
    {
        return Mage::registry('current_slider');
    }
}
