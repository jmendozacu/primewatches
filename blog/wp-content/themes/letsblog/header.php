<?php
/**
 * The Header for the template.
 *
 * @package WordPress
 */
error_reporting(0);
if(session_id() == '') {
	session_start();
}
if (!isset( $content_width ) ) $content_width = 1170;
 
global $letsblog_homepage_style;

?><!DOCTYPE html>
<html <?php language_attributes(); ?> <?php if(isset($pp_homepage_style) && !empty($pp_homepage_style)) { echo 'data-style="'.esc_attr($pp_homepage_style).'"'; } ?>>
<head>
<meta charset="<?php echo get_bloginfo( 'charset' ); ?>" />

<?php
	$tg_mobile_responsive = kirki_get_option('tg_mobile_responsive');
	
	if(!empty($tg_mobile_responsive))
	{
?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<?php
	}
?>

<meta name="format-detection" content="telephone=no">

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
<script charset="utf-8" type="text/javascript">var switchTo5x=true;</script>
<script charset="utf-8" type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script charset="utf-8" type="text/javascript">stLight.options({"publisher":"wp.a57daa8c-c159-4e70-868d-2b7bbc253089"});var st_type="wordpress4.3.1";</script>


<?php
if(is_single())
{
	if(has_post_thumbnail(get_the_ID(), 'blog_f'))
	{
	    $image_id = get_post_thumbnail_id(get_the_ID());
	    $fb_thumb = wp_get_attachment_image_src($image_id, 'thumbnail', true);
	}

	if(isset($fb_thumb[0]) && !empty($fb_thumb[0]))
	{
		$post_content = get_post_field('post_excerpt', $post->ID);
	?>
	<meta property="og:image" content="<?php echo esc_url($fb_thumb[0]); ?>"/>
	<meta property="og:title" content="<?php echo esc_attr(get_the_title()); ?>"/>
	<meta property="og:url" content="<?php echo esc_url(get_permalink($post->ID)); ?>"/>
	<meta property="og:description" content="<?php echo esc_attr(strip_tags($post_content)); ?>"/>
	<?php
	}
}
?>

<?php
	/**
	*	Get favicon URL
	**/
	$tg_favicon = kirki_get_option('tg_favicon');
	
	if(!empty($tg_favicon))
	{
?>
		<link rel="shortcut icon" href="<?php echo esc_url($tg_favicon); ?>" />
<?php
	}
?> 

<?php
	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>

	<?php
		//Check if disable right click
		$tg_enable_right_click = kirki_get_option('tg_enable_right_click');
		
		//Check if disable image dragging
		$tg_enable_dragging = kirki_get_option('tg_enable_dragging');
		
		//Check if use AJAX search
		$tg_menu_search_instant = kirki_get_option('tg_menu_search_instant');
		
		//Check if sticky menu
		$tg_fixed_menu = kirki_get_option('tg_fixed_menu');
		
		//Check if display top bar
		$tg_topbar = kirki_get_option('tg_topbar');
		if(THEMEDEMO && isset($_GET['topbar']) && !empty($_GET['topbar']))
		{
			$tg_topbar = true;
		}
		
		//Check if add blur effect
		$tg_page_title_img_blur = kirki_get_option('tg_page_title_img_blur');
		
		//Check filterable link option
		$tg_portfolio_filterable_link = kirki_get_option('tg_portfolio_filterable_link');
		
		//Check slider layout
		$tg_blog_slider_layout = kirki_get_option('tg_blog_slider_layout');
		if(THEMEDEMO && isset($_GET['layout']) && ($_GET['layout'] == 'fullwidth' OR $_GET['layout'] == 'full_fullwidth'))
		{
			$tg_blog_slider_layout = '3cols-slider';
		}
	?>
	<input type="hidden" id="pp_enable_right_click" name="pp_enable_right_click" value="<?php echo esc_attr($tg_enable_right_click); ?>"/>
	<input type="hidden" id="pp_enable_dragging" name="pp_enable_dragging" value="<?php echo esc_attr($tg_enable_dragging); ?>"/>
	<input type="hidden" id="pp_image_path" name="pp_image_path" value="<?php echo get_template_directory_uri(); ?>/images/"/>
	<input type="hidden" id="pp_homepage_url" name="pp_homepage_url" value="<?php echo esc_url(home_url()); ?>"/>
	<input type="hidden" id="pp_ajax_search" name="pp_ajax_search" value="<?php echo esc_attr($tg_menu_search_instant); ?>"/>
	<input type="hidden" id="pp_fixed_menu" name="pp_fixed_menu" value="<?php echo esc_attr($tg_fixed_menu); ?>"/>
	<input type="hidden" id="pp_topbar" name="pp_topbar" value="<?php echo esc_attr($tg_topbar); ?>"/>
	<input type="hidden" id="pp_page_title_img_blur" name="pp_page_title_img_blur" value="<?php echo esc_attr($tg_page_title_img_blur); ?>"/>
	<input type="hidden" id="tg_blog_slider_layout" name="tg_blog_slider_layout" value="<?php echo esc_attr($tg_blog_slider_layout); ?>"/>
	<input type="hidden" id="pp_back" name="pp_back" value="<?php _e( 'Back', THEMEDOMAIN ); ?>"/>
	
	<?php
		//Check footer sidebar columns
		$tg_footer_sidebar = kirki_get_option('tg_footer_sidebar');
	?>
	<input type="hidden" id="pp_footer_style" name="pp_footer_style" value="<?php echo esc_attr($tg_footer_sidebar); ?>"/>
	
	<!-- Begin mobile menu -->
	<div class="mobile_menu_wrapper">
		<a id="close_mobile_menu" href="javascript:;"><i class="fa fa-close"></i></a>
		
		<?php
    	    //Check if display search in header	
    	    $tg_menu_search = kirki_get_option('tg_menu_search');
    	    
    	    if(!empty($tg_menu_search))
    	    {
    	?>
    	<form role="search" method="get" name="searchform" id="searchform" action="<?php echo home_url(); ?>/">
    	    <div>
    	    	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" autocomplete="off" placeholder="<?php _e( 'Search...', THEMEDOMAIN ); ?>"/>
    	    	<button>
    	        	<i class="fa fa-search"></i>
    	        </button>
    	    </div>
    	    <div id="autocomplete"></div>
    	</form>
    	<?php
    	    }
    	?>
    	
	    <?php 
	    	//Check if has custom menu
			if(is_object($post) && $post->post_type == 'page')
			{
			    $page_menu = get_post_meta($post->ID, 'page_menu', true);
			}	
			
			if ( has_nav_menu( 'side-menu' ) ) 
			{
			    //Get page nav
			    wp_nav_menu( 
			        array( 
			            'menu_id'			=> 'mobile_main_menu',
		                'menu_class'		=> 'mobile_main_nav',
			            'theme_location' 	=> 'side-menu',
			        )
			    ); 
			}
		?>
		
		<!-- Begin side menu sidebar -->
		<div class="page_content_wrapper">
			<div class="sidebar_wrapper">
		        <div class="sidebar">
		        
		        	<div class="content">
		        
		        		<ul class="sidebar_widget">
		        		<?php dynamic_sidebar('Side Menu Sidebar'); ?>
		        		</ul>
		        	
		        	</div>
		    
		        </div>
			</div>
		</div>
		<!-- End side menu sidebar -->
	</div>
	<!-- End mobile menu -->

	<!-- Begin template wrapper -->
	<div id="wrapper">
	
	<?php
	    //Get main menu layout
		get_template_part("/templates/template-topmenu");
	?>