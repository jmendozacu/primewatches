<?php

class MagicToolbox_MagicSlideshow_Model_Observer {

    public function __construct() {

    }


    /*public function controller_action_predispatch($observer) {

    }*/

    /*public function beforeLoadLayout($observer) {

    }*/

    public function fixLayoutUpdates($observer) {
        //NOTE: to prevent an override of our templates with other modules
        //NOTE: also to sort the modules layout for displaying headers in the right order

        global $isLayoutUpdatesAlreadyFixed;
        if(isset($isLayoutUpdatesAlreadyFixed)) return;
        $isLayoutUpdatesAlreadyFixed = true;

        //$xml = Mage::app()->getConfig()->getNode('frontend/layout/updates')->asNiceXml();
        //debug_log($xml);

        //NOTE: default order (without sorting)
        //Magic360
        //MagicScroll
        //MagicSlideshow
        //MagicThumb
        //MagicZoom
        //MagicZoomPlus

        //NOTE: sort order
        $modules = array(
            'magicthumb' => false,
            'magic360' => false,
            'magiczoom' => false,
            'magiczoomplus' => false,
            'magicscroll' => false,
            'magicslideshow' => false,
        );

        $pattern = '#^(?:'.implode('|', array_keys($modules)).')$#';
        foreach(Mage::app()->getConfig()->getNode('frontend/layout/updates')->children() as $key => $child) {
            if(preg_match($pattern, $key)) {
                //NOTE: remember detected modules 
                $modules[$key] = array(
                    'module' => $child->getAttribute('module'),
                    'file' => (string)$child->file,
                );
            }
        }

        //NOTE: remove node to prevent dublicate
        $path = implode(' | ', array_keys($modules));
        $elements = Mage::app()->getConfig()->getNode('frontend/layout/updates')->xpath($path);
        foreach($elements as $element) {
            unset($element->{0});
        }

        //NOTE: add new nodes to the end
        foreach($modules as $key => $data) {
            if(empty($data)) continue;
            $child = new Varien_Simplexml_Element("<{$key} module=\"{$data['module']}\"><file>{$data['file']}</file></{$key}>");
            Mage::app()->getConfig()->getNode('frontend/layout/updates')->appendChild($child);
        }

    }

    /*public function controller_action_postdispatch($observer) {

    }*/


}
