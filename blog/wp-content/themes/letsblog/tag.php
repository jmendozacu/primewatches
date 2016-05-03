<?php
//Get tag page layout setting
$tg_blog_tag_layout = kirki_get_option('tg_blog_tag_layout');

switch($tg_blog_tag_layout)
{
    case "blog_r":
    default:
    	get_template_part("blog_r");
    	exit;
    break;
    
    case "blog_l":
    	get_template_part("blog_l");
    	exit;
    break;
    
    case "blog_f":
    	get_template_part("blog_f");
    	exit;
    break;
    
    case "blog_2cols":
    	get_template_part("blog_2cols");
    	exit;
    break;
    
    case "blog_3cols":
    	get_template_part("blog_3cols");
    	exit;
    break;
    
    case "blog_s":
    	get_template_part("blog_s");
    	exit;
    break;
}
?>