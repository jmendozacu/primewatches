<?php

class MagicToolbox_MagicSlideshow_Block_Header extends Mage_Core_Block_Template {

    protected $pageType = '';

    public function _construct() {
        $this->setTemplate('magicslideshow/header.phtml');
    }

    public function setPageType($pageType = '') {
        $this->pageType = $pageType;
    }

    public function getPageType() {
        return $this->pageType;
    }

}
