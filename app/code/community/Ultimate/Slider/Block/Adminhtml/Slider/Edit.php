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
 * Slider admin edit form
 *
 * @category    Images & Media
 * @package     Ultimate_Slider
 * @author      Rajasingh and Manikandan D
 */
class Ultimate_Slider_Block_Adminhtml_Slider_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * constructor
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->_blockGroup = 'ultimate_slider';
        $this->_controller = 'adminhtml_slider';
        $this->_updateButton(
            'save',
            'label',
            Mage::helper('ultimate_slider')->__('Save Slider')
        );
        $this->_updateButton(
            'delete',
            'label',
            Mage::helper('ultimate_slider')->__('Delete Slider')
        );
        $this->_addButton(
            'saveandcontinue',
            array(
                'label'   => Mage::helper('ultimate_slider')->__('Save And Continue Edit'),
                'onclick' => 'saveAndContinueEdit()',
                'class'   => 'save',
            ),
            -100
        );
        $this->_formScripts[] = "
            function saveAndContinueEdit() {
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    /**
     * get the edit form header
     *
     * @access public
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry('current_slider') && Mage::registry('current_slider')->getId()) {
            return Mage::helper('ultimate_slider')->__("Edit Slider - '%s'",
                $this->escapeHtml(Mage::registry('current_slider')->getTitle())
            );
        } else {
            return Mage::helper('ultimate_slider')->__('Add Slider');
        }
    }
}
