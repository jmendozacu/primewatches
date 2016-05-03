<?php

class MagicToolbox_MagicSlideshow_Helper_Params extends Mage_Core_Helper_Abstract {

    public function __construct() {


    }

    public function getBlocks() {
		return array(
			'default' => 'Defaults',
			'customslideshowblock' => 'Homepage or custom block',
			'product' => 'Product page',
			'recentlyviewedproductsblock' => 'Recently Viewed Products block'
		);
	}

	public function getDefaultValues() {
		return array(
			'customslideshowblock' => array(
				'enable-effect' => 'No',
				'thumb-max-width' => '500',
				'thumb-max-height' => '500',
				'arrows' => 'Yes',
				'caption' => 'Yes',
				'show-message' => 'No',
			),
			'product' => array(
				'enable-effect' => 'Yes',
				'arrows' => 'Yes',
				'caption' => 'Yes',
				'fullscreen' => 'Yes',
			),
			'recentlyviewedproductsblock' => array(
				'enable-effect' => 'No',
				'thumb-max-width' => '135',
				'thumb-max-height' => '135',
				'show-message' => 'No',
			)
		);
	}

	public function getParamsMap($block) {
		$blocks = array(
			'default' => array(
				'General' => array(
					'include-headers-on-all-pages'
				),
				'Positioning and Geometry' => array(
					'thumb-max-width',
					'thumb-max-height',
					'selector-max-width',
					'selector-max-height',
					'square-images'
				),
				'Common settings' => array(
					'width',
					'height',
					'orientation',
					'arrows',
					'loop',
					'effect',
					'effect-speed'
				),
				'Autoplay' => array(
					'autoplay',
					'slide-duration',
					'shuffle',
					'kenburns',
					'pause'
				),
				'Selectors' => array(
					'selectors',
					'selectors-style',
					'selectors-eye'
				),
				'Caption' => array(
					'caption',
					'caption-effect'
				),
				'Other settings' => array(
					'fullscreen',
					'preload',
					'keyboard',
					'loader'
				),
				'Miscellaneous' => array(
					'link-to-product-page',
					'show-message',
					'message'
				)
			),
			'customslideshowblock' => array(
				'General' => array(
					'enable-effect',
					'block-title'
				),
				'Positioning and Geometry' => array(
					'thumb-max-width',
					'thumb-max-height',
					'selector-max-width',
					'selector-max-height',
					'square-images'
				),
				'Common settings' => array(
					'width',
					'height',
					'orientation',
					'arrows',
					'loop',
					'effect',
					'effect-speed'
				),
				'Autoplay' => array(
					'autoplay',
					'slide-duration',
					'shuffle',
					'kenburns',
					'pause'
				),
				'Selectors' => array(
					'selectors',
					'selectors-style',
					'selectors-eye'
				),
				'Caption' => array(
					'caption',
					'caption-effect'
				),
				'Other settings' => array(
					'fullscreen',
					'preload',
					'keyboard',
					'loader'
				),
				'Miscellaneous' => array(
					'show-message',
					'message'
				)
			),
			'product' => array(
				'General' => array(
					'enable-effect'
				),
				'Positioning and Geometry' => array(
					'thumb-max-width',
					'thumb-max-height',
					'selector-max-width',
					'selector-max-height',
					'square-images'
				),
				'Common settings' => array(
					'width',
					'height',
					'orientation',
					'arrows',
					'loop',
					'effect',
					'effect-speed'
				),
				'Autoplay' => array(
					'autoplay',
					'slide-duration',
					'shuffle',
					'kenburns',
					'pause'
				),
				'Selectors' => array(
					'selectors',
					'selectors-style',
					'selectors-eye'
				),
				'Caption' => array(
					'caption',
					'caption-effect'
				),
				'Other settings' => array(
					'fullscreen',
					'preload',
					'keyboard',
					'loader'
				),
				'Miscellaneous' => array(
					'show-message',
					'message'
				)
			),
			'recentlyviewedproductsblock' => array(
				'General' => array(
					'enable-effect'
				),
				'Positioning and Geometry' => array(
					'thumb-max-width',
					'thumb-max-height',
					'selector-max-width',
					'selector-max-height',
					'square-images'
				),
				'Common settings' => array(
					'width',
					'height',
					'orientation',
					'arrows',
					'loop',
					'effect',
					'effect-speed'
				),
				'Autoplay' => array(
					'autoplay',
					'slide-duration',
					'shuffle',
					'kenburns',
					'pause'
				),
				'Selectors' => array(
					'selectors',
					'selectors-style',
					'selectors-eye'
				),
				'Caption' => array(
					'caption',
					'caption-effect'
				),
				'Other settings' => array(
					'fullscreen',
					'preload',
					'keyboard',
					'loader'
				),
				'Miscellaneous' => array(
					'link-to-product-page',
					'show-message',
					'message'
				)
			)
		);
		return $blocks[$block];
	}

}
