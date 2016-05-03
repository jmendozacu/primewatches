<?php

if(!defined('MagicSlideshowModuleCoreClassLoaded')) {

    define('MagicSlideshowModuleCoreClassLoaded', true);

    require_once(dirname(__FILE__).'/magictoolbox.params.class.php');

    /**
     * MagicSlideshowModuleCoreClass
     *
     */
    class MagicSlideshowModuleCoreClass {

        /**
         * MagicToolboxParamsClass class
         *
         * @var   MagicToolboxParamsClass
         *
         */
        var $params;

        /**
         * Tool type
         *
         * @var   string
         *
         */
        var $type = 'category';

        /**
         * Constructor
         *
         * @return void
         */
        function MagicSlideshowModuleCoreClass() {
            $this->params = new MagicToolboxParamsClass();
            $this->loadDefaults();
            $this->params->setMapping(array(
                'loop' => array('Yes' => 'true', 'No' => 'false'),
                'autoplay' => array('Yes' => 'true', 'No' => 'false'),
                'shuffle' => array('Yes' => 'true', 'No' => 'false'),
                'kenburns' => array('Yes' => 'true', 'No' => 'false'),
                'selectors-eye' => array('Yes' => 'true', 'No' => 'false'),
                'caption' => array('Yes' => 'true', 'No' => 'false'),
                'fullscreen' => array('Yes' => 'true', 'No' => 'false'),
                'preload' => array('Yes' => 'true', 'No' => 'false'),
                'keyboard' => array('Yes' => 'true', 'No' => 'false'),
                'loader' => array('Yes' => 'true', 'No' => 'false'),
                'arrows' => array('Yes' => 'true', 'No' => 'false'),
            ));
        }

        /**
         * Method to get headers string
         *
         * @param string $jsPath  Path to JS file
         * @param string $cssPath Path to CSS file
         *
         * @return string
         */
        function getHeadersTemplate($jsPath = '', $cssPath = null) {
            //to prevent multiple displaying of headers
            if(!defined('MAGICSLIDESHOW_MODULE_HEADERS')) {
                define('MAGICSLIDESHOW_MODULE_HEADERS', true);
            } else {
                return '';
            }
            if($cssPath == null) {
                $cssPath = $jsPath;
            }
            $headers = array();
            $headers[] = '<!-- Magic Slideshow Magento module version v4.10.1 [v1.5.5:v2.0.23] -->';
            $headers[] = '<link type="text/css" href="'.$cssPath.'/magicslideshow.css" rel="stylesheet" media="screen" />';
            $headers[] = '<link type="text/css" href="'.$cssPath.'/magicslideshow.module.css" rel="stylesheet" media="screen" />';
            $headers[] = '<script type="text/javascript" src="'.$jsPath.'/magicslideshow.js"></script>';
            $headers[] = $this->getOptionsTemplate();
            return "\r\n".implode("\r\n", $headers)."\r\n";
        }

        /**
         * Method to get options string
         *
         * @param mixed $id Extra options ID
         *
         * @return string
         */
        function getOptionsTemplate($id = null) {
            $addition = '';
            $selectorsSize = '';
            if($this->params->getParam('selectors-size')) {
                $selectorsSize = $this->params->getValue('selectors-size');
            } else {
                if($this->params->checkValue('selectors', array('bottom', 'top'))) {
                    $selectorsSize = $this->params->getValue('selector-max-height');
                } else if($this->params->checkValue('selectors', array('right', 'left'))) {
                    $selectorsSize = $this->params->getValue('selector-max-width');
                }
            }
            if($selectorsSize) {
                $addition .= "\n\t\t'selectors-size':'{$selectorsSize}',";
            }
			//print_r($this->params['customslideshowblock']); exit;
            return "<script type=\"text/javascript\">\n\tMagicSlideshow.".($id == null?'options':'extraOptions.'.$id)." = {{$addition}\n\t\t".$this->params->serialize(true, ",\n\t\t")."\n\t}\n</script>";
        }

        /**
         * Method to get MagicSlideshow HTML
         *
         * @param array $data   MagicSlideshow items data
         * @param array $params Additional params
         *
         * @return string
         */
        function getMainTemplate($data, $params = array(),$_product=NULL) {
            $id = '';
            $width = '';
            $height = '';
            $displayOptions = true;
            $html = array();
			$vheight = 430;  
			if(Mage::helper('mobiledetect')->isMobileDevice())
		   {
		     $vheight = "260";
   			 $this->params->setValue('orientation','hotizantal');
		   }

            extract($params);
          
            if(empty($width)) {
                $width = '';
            } else {
                $width = " width=\"{$width}\"";
            }
            if(empty($height)) {
                $height = '';
            } else {
                $height = " height=\"{$height}\"";
            }

            if(empty($id)) {
                $id = '';
            } else {
                if($displayOptions) {
                    $html[] = $this->getOptionsTemplate($id);
                }
                $id = ' id="'.addslashes($id).'"';
            }
            //$class = (count($data) > 1)?'class="MagicSlideshow"':'class="MagicSlideshowVideo"'; 
            $class = (count($data) <= 1 && $data[0]['title'] == 'video')?'class="MagicSlideshowVideo"':'class="MagicSlideshow"'; 
            $html[] = '<div'.$id.' '.$class.$width.$height.'>';
			
            foreach($data as $item) {

                $img = '';//main image
                $thumb = '';//thumbnail image
                $fullscreen = '';//image shown in Full Screen
                $link = '';
                $target = '';
                $alt = '';
                $title = '';
                $description = '';
                $width = '';
                $height = '';

                extract($item);

                if(empty($link)) {
                    $link = '';
                } else {
                    if(empty($target)) {
                        $target = '';
                    } else {
                        $target = ' target="'.$target.'"';
                    }
					$vlink = addslashes($link);
                    $link = $target.' href="'.addslashes($link).'"';
                }

                if(empty($alt)) {
                    $alt = '';
                } else {
                    $alt = htmlspecialchars(htmlspecialchars_decode($alt, ENT_QUOTES));
                }

                if(empty($title)) {
                    $caption = $title = '';
                } else {
                    $caption = $title;
                    $vtitle = $title = htmlspecialchars(htmlspecialchars_decode($title, ENT_QUOTES));
                    if(empty($alt)) {
                        $alt = $title;
                    }
                    $title = " title=\"{$title}\"";
                }

                if(empty($description)) {
                    $description = '';
                } else {
                    $description = preg_replace('#<(/?)a([^>]*+)>#is', '[$1a$2]', $description);
                    $description = str_replace('"', '&quot;', $description);
                }
                    
                if(empty($width)) {
                    $width = '';
                } else {
                    $width = " width=\"{$width}\"";
                }
                if(empty($height)) {
                    $height = '';
                } else {
                    $height = " height=\"{$height}\"";
                }

                if(empty($img)) {
                    if(empty($caption)) {
                        $html[] = "<div>{$description}</div>";
                    } else {
                        //data-out-move=\"fade\"
                        $html[] = "<div><div data-mss-caption>{$caption}</div><div data-mss-thumbnail>{$description}</div></div>";
                    }
                } else {
                    if(empty($thumb)) {
                        $thumb = $img;
                    }
                    if(empty($fullscreen)) {
                        $fullscreen = $img;
                    }
                    $img = $this->params->checkValue('preload', 'Yes') ? ' src="'.$img.'"' : ' data-image="'.$img.'"';
                    $thumb = ' data-thumb-image="'.$thumb.'"';
                    $fullscreen = ' data-fullscreen-image="'.$fullscreen.'"';
                    if(!empty($description)) {
                        $description = " data-caption=\"{$description}\"";
                    }
					//print($vtitle); exit;
					if($vtitle == 'video')
					  {
					    $html[] = '<iframe width="100%" height="'.$vheight.'" src="https://www.youtube.com/embed/'.$vlink.'?autoplay=1&controls=0&iv_load_policy
=3&rel=0&showinfo=0&modestbranding=1" frameborder="0" loop=1 ></iframe>';
					  }
					else
					  {  
                           $html[] = "<a{$link}><img{$width}{$height}{$img}{$thumb}{$fullscreen}{$title}{$description} alt=\"{$alt}\" /></a>";
					   }
                }

            }

            $html[] = '</div>';

			//print_r($html); exit;

            if($this->params->checkValue('show-message', 'Yes')) {
                $html[] = '<div class="MagicToolboxMessage">'.$this->params->getValue('message').'</div>';
            }

            return implode('', $html);
        }

        /**
         * Method to load defaults options
         *
         * @return void
         */
        function loadDefaults() {
            $params = array(
				"enable-effect"=>array("id"=>"enable-effect","group"=>"General","order"=>"10","default"=>"Yes","label"=>"Enable Magic Slideshow™","type"=>"array","subType"=>"select","values"=>array("Yes","No"),"scope"=>"profile"),
				"block-title"=>array("id"=>"block-title","group"=>"General","order"=>"20","default"=>"","label"=>"Block title","type"=>"text","scope"=>"profile"),
				"include-headers-on-all-pages"=>array("id"=>"include-headers-on-all-pages","group"=>"General","order"=>"21","default"=>"No","label"=>"Include headers on all pages","description"=>"To be able to apply an effect on any page","type"=>"array","subType"=>"radio","values"=>array("Yes","No"),"scope"=>"profile"),
				"thumb-max-width"=>array("id"=>"thumb-max-width","group"=>"Positioning and Geometry","order"=>"10","default"=>"450","label"=>"Maximum width of slideshow images (in pixels)","type"=>"num","scope"=>"profile"),
				"thumb-max-height"=>array("id"=>"thumb-max-height","group"=>"Positioning and Geometry","order"=>"11","default"=>"450","label"=>"Maximum height of slideshow images (in pixels)","type"=>"num","scope"=>"profile"),
				"selector-max-width"=>array("id"=>"selector-max-width","group"=>"Positioning and Geometry","order"=>"12","default"=>"56","label"=>"Maximum width of thumbnails (in pixels)","type"=>"num","scope"=>"profile"),
				"selector-max-height"=>array("id"=>"selector-max-height","group"=>"Positioning and Geometry","order"=>"13","default"=>"56","label"=>"Maximum height of thumbnails (in pixels)","type"=>"num","scope"=>"profile"),
				"square-images"=>array("id"=>"square-images","group"=>"Positioning and Geometry","order"=>"40","default"=>"No","label"=>"Always create square images","description"=>"","type"=>"array","subType"=>"radio","values"=>array("Yes","No"),"scope"=>"profile"),
				"width"=>array("id"=>"width","group"=>"Common settings","order"=>"10","default"=>"auto","label"=>"Slideshow width","description"=>"auto | pixels | percentage","type"=>"text","scope"=>"tool"),
				"height"=>array("id"=>"height","group"=>"Common settings","order"=>"20","default"=>"100%","label"=>"Slideshow height","description"=>"auto | pixels | percentage","type"=>"text","scope"=>"tool"),
				"orientation"=>array("id"=>"orientation","group"=>"Common settings","order"=>"30","default"=>"horizontal","label"=>"Slideshow direction","description"=>"vertical (up/down) / horizontal (right/left)","type"=>"array","subType"=>"radio","values"=>array("horizontal","vertical"),"scope"=>"tool"),
				"arrows"=>array("id"=>"arrows","group"=>"Common settings","order"=>"40","default"=>"No","label"=>"Show navigation arrows","type"=>"array","subType"=>"radio","values"=>array("Yes","No"),"scope"=>"tool"),
				"loop"=>array("id"=>"loop","group"=>"Common settings","order"=>"45","default"=>"Yes","label"=>"Continue slideshow after last slide","type"=>"array","subType"=>"radio","values"=>array("Yes","No"),"scope"=>"tool"),
				"effect"=>array("id"=>"effect","group"=>"Common settings","order"=>"50","default"=>"slide","label"=>"Slide change effect","type"=>"array","subType"=>"radio","values"=>array("slide","fade","dissolve"),"scope"=>"tool"),
				"effect-speed"=>array("id"=>"effect-speed","group"=>"Common settings","order"=>"60","default"=>"600","label"=>"Slide-in duration (milliseconds)","description"=>"e.g. 0 = instant; 600 = 0.6 seconds","type"=>"num","scope"=>"tool"),
				"autoplay"=>array("id"=>"autoplay","group"=>"Autoplay","order"=>"10","default"=>"Yes","label"=>"Autoplay slideshow","type"=>"array","subType"=>"radio","values"=>array("Yes","No"),"scope"=>"tool"),
				"slide-duration"=>array("id"=>"slide-duration","group"=>"Autoplay","order"=>"20","default"=>"3000","label"=>"Duration slide displayed (milliseconds)","description"=>"e.g. 3000 = 3 seconds","type"=>"num","scope"=>"tool"),
				"shuffle"=>array("id"=>"shuffle","group"=>"Autoplay","order"=>"30","default"=>"No","label"=>"Shuffle order of slides","type"=>"array","subType"=>"radio","values"=>array("Yes","No"),"scope"=>"tool"),
				"kenburns"=>array("id"=>"kenburns","group"=>"Autoplay","order"=>"40","default"=>"No","label"=>"Use Ken Burns effect","type"=>"array","subType"=>"radio","values"=>array("Yes","No"),"scope"=>"tool"),
				"pause"=>array("id"=>"pause","group"=>"Autoplay","order"=>"50","default"=>"false","label"=>"Pause autoplay","type"=>"array","subType"=>"radio","values"=>array("hover","click","selector-click","false"),"scope"=>"tool"),
				"selectors"=>array("id"=>"selectors","group"=>"Selectors","order"=>"10","default"=>"none","label"=>"Selectors position","type"=>"array","subType"=>"radio","values"=>array("bottom","top","right","left","none"),"scope"=>"tool"),
				"selectors-style"=>array("id"=>"selectors-style","group"=>"Selectors","order"=>"20","default"=>"bullets","label"=>"Selectors style","type"=>"array","subType"=>"radio","values"=>array("bullets","thumbnails"),"scope"=>"tool"),
				"selectors-eye"=>array("id"=>"selectors-eye","group"=>"Selectors","order"=>"40","default"=>"Yes","label"=>"Highlight thumbnail when selected","description"=>"only available when 'selectors style' is set to thumbnails","type"=>"array","subType"=>"radio","values"=>array("Yes","No"),"scope"=>"tool"),
				"caption"=>array("id"=>"caption","group"=>"Caption","order"=>"10","default"=>"No","label"=>"Add caption under each image","type"=>"array","subType"=>"radio","values"=>array("Yes","No"),"scope"=>"tool"),
				"caption-effect"=>array("id"=>"caption-effect","group"=>"Caption","order"=>"20","default"=>"fade","label"=>"Effect when changing captions","type"=>"array","subType"=>"radio","values"=>array("fade","dissolve","fixed"),"scope"=>"tool"),
				"fullscreen"=>array("id"=>"fullscreen","group"=>"Other settings","order"=>"10","default"=>"No","label"=>"Enable full-screen version of slideshow","type"=>"array","subType"=>"radio","values"=>array("Yes","No"),"scope"=>"tool"),
				"preload"=>array("id"=>"preload","group"=>"Other settings","order"=>"20","default"=>"Yes","label"=>"Load images at start or on demand","type"=>"array","subType"=>"radio","values"=>array("Yes","No"),"scope"=>"tool"),
				"keyboard"=>array("id"=>"keyboard","advanced"=>"1","group"=>"Other settings","order"=>"30","default"=>"Yes","label"=>"Use keyboard arrows to move between slides","description"=>"always enabled in Full Screen mode","type"=>"array","subType"=>"radio","values"=>array("Yes","No"),"scope"=>"tool"),
				"loader"=>array("id"=>"loader","advanced"=>"1","group"=>"Other settings","order"=>"50","default"=>"Yes","label"=>"Show loading icon while downloading","type"=>"array","subType"=>"radio","values"=>array("Yes","No"),"scope"=>"tool"),
				"link-to-product-page"=>array("id"=>"link-to-product-page","group"=>"Miscellaneous","order"=>"30","default"=>"Yes","label"=>"Link enlarged image to the product page","type"=>"array","subType"=>"select","values"=>array("Yes","No"),"scope"=>"profile"),
				"show-message"=>array("id"=>"show-message","group"=>"Miscellaneous","order"=>"200","default"=>"Yes","label"=>"Show message under slideshow","type"=>"array","subType"=>"radio","values"=>array("Yes","No")),
				"message"=>array("id"=>"message","group"=>"Miscellaneous","order"=>"210","default"=>"","label"=>"Enter message to appear under slideshow","type"=>"text")
			);
            $this->params->appendParams($params);
        }
    }

}

?>
