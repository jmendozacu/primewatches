<?php

class MagicToolbox_MagicSlideshow_Block_Adminhtml_Catalog_Product_Edit_Tab_Images extends Mage_Adminhtml_Block_Widget_Form implements Mage_Adminhtml_Block_Widget_Tab_Interface {

    protected function _prepareForm() {
        $form = new Varien_Data_Form();
        $fieldset = $form->addFieldset('group_fields_magicslideshow_images', array('legend' => Mage::helper('magicslideshow')->__('Images'), 'class' => 'magicslideshowFieldset'));
        $fieldset->addType('magicslideshow_gallery', 'MagicToolbox_MagicSlideshow_Block_Adminhtml_Settings_Edit_Tab_Form_Element_Gallery');
        $fieldset->addField('magicslideshow_gallery', 'magicslideshow_gallery', array(
            'label'     => Mage::helper('magicslideshow')->__('${too.id} gallery'),
            'name'      => 'magicslideshow[gallery]',
        ));
        $this->setForm($form);
        return parent::_prepareForm();
    }

    public function getTabLabel() {
        return $this->__('Magic Slideshow&#8482; Images');
    }

    public function getTabTitle() {
        return $this->__('Magic Slideshow&#8482; Images');
    }

    public function canShowTab() {
        return true;
    }

    public function isHidden() {
        return false;
    }

    public function getHtmlId() {
        return $this->getId();
    }

    public function getJsObjectName() {
        return $this->getHtmlId().'JsObject';
    }

}

