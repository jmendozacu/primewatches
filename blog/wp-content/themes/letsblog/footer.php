<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 */
?>

<?php
	//Check if blank template
	global $lestblog_is_no_header;
	global $lestblog_screen_class;
	
	if(!is_bool($lestblog_is_no_header) OR !$lestblog_is_no_header)
	{

	global $lestblog_homepage_style;
	
	//If display photostream
	$pp_photostream = get_option('pp_photostream');
	if(THEMEDEMO && isset($_GET['footer']) && !empty($_GET['footer']))
	{
		$pp_photostream = 0;
	}

	if(!empty($pp_photostream))
	{
		$photos_arr = array();
		$photostream_title = '';
	
		if($pp_photostream == 'flickr')
		{
			$pp_flickr_id = get_option('pp_flickr_id');
			$photos_arr = get_flickr(array('type' => 'user', 'id' => $pp_flickr_id, 'items' => 8));
			$photostream_title = '<i class="fa fa-flickr"></i>Flickr';
		}
		else
		{
			$pp_instagram_username = get_option('pp_instagram_username');
			$pp_instagram_access_token = get_option('pp_instagram_access_token');
			$photos_arr = letsblog_get_instagram($pp_instagram_username, $pp_instagram_access_token, 8);
			$photostream_title = '<i class="fa fa-instagram"></i>@'.$pp_instagram_username;
		}
		
		if(!empty($photos_arr) && $lestblog_screen_class != 'split' && $lestblog_homepage_style != 'fullscreen' && $lestblog_homepage_style != 'flow')
		{
?>
<br class="clear"/>
<div class="footer_photostream_wrapper">
	<h6><?php echo $photostream_title; ?></h6>
	<ul class="footer_photostream">
		<?php
			foreach($photos_arr as $photo)
			{
		?>
			<li><a target="_blank" href="<?php echo esc_url($photo['link']); ?>"><img src="<?php echo esc_url($photo['thumb_url']); ?>" alt="<?php echo esc_attr($photo['title']); ?>" /></a></li>
		<?php
			}
		?>
	</ul>
</div>
<?php
		}
	}
?>

<?php
	//Get Footer Sidebar
	$tg_footer_sidebar = kirki_get_option('tg_footer_sidebar');
	if(THEMEDEMO && isset($_GET['footer']) && !empty($_GET['footer']))
	{
	    $tg_footer_sidebar = 0;
	}
?>
<div class="footer_bar <?php if(isset($lestblog_homepage_style) && !empty($lestblog_homepage_style)) { echo esc_attr($lestblog_homepage_style); } ?> <?php if(!empty($lestblog_screen_class)) { ?>split<?php } ?> <?php if(empty($tg_footer_sidebar)) { ?>noborder<?php } ?>">

	<?php
	    if(!empty($tg_footer_sidebar))
	    {
	    	$footer_class = '';
	    	
	    	switch($tg_footer_sidebar)
	    	{
	    		case 1:
	    			$footer_class = 'one';
	    		break;
	    		case 2:
	    			$footer_class = 'two';
	    		break;
	    		case 3:
	    			$footer_class = 'three';
	    		break;
	    		case 4:
	    			$footer_class = 'four';
	    		break;
	    		default:
	    			$footer_class = 'four';
	    		break;
	    	}
	    	
	    	global $lestblog_homepage_style;
	?>
	<div id="footer" class="<?php if(isset($lestblog_homepage_style) && !empty($lestblog_homepage_style)) { echo esc_attr($lestblog_homepage_style); } ?>">
	<ul class="sidebar_widget <?php echo esc_attr($footer_class); ?>">
	    <?php dynamic_sidebar('Footer Sidebar'); ?>
	</ul>
	</div>
	<br class="clear"/>
	<?php
	    }
	?>

	<div class="footer_bar_wrapper <?php if(isset($lestblog_homepage_style) && !empty($lestblog_homepage_style)) { echo esc_attr($lestblog_homepage_style); } ?>">
		<?php
			//Check if display social icons or footer menu
			$tg_footer_copyright_right_area = kirki_get_option('tg_footer_copyright_right_area');
			
			if($tg_footer_copyright_right_area=='social')
			{
				if($lestblog_homepage_style!='flow' && $lestblog_homepage_style!='fullscreen' && $lestblog_homepage_style!='carousel' && $lestblog_homepage_style!='flip' && $lestblog_homepage_style!='fullscreen_video')
				{	
					//Check if open link in new window
					$tg_footer_social_link = kirki_get_option('tg_footer_social_link');
			?>
			<div class="social_wrapper">
			    <ul>
			    	<?php
			    		$pp_facebook_url = get_option('pp_facebook_url');
			    		
			    		if(!empty($pp_facebook_url))
			    		{
			    	?>
			    	<li class="facebook"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> href="<?php echo esc_url($pp_facebook_url); ?>"><i class="fa fa-facebook"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_twitter_username = get_option('pp_twitter_username');
			    		
			    		if(!empty($pp_twitter_username))
			    		{
			    	?>
			    	<li class="twitter"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> href="http://twitter.com/<?php echo esc_url($pp_twitter_username); ?>"><i class="fa fa-twitter"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_flickr_username = get_option('pp_flickr_username');
			    		
			    		if(!empty($pp_flickr_username))
			    		{
			    	?>
			    	<li class="flickr"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Flickr" href="http://flickr.com/people/<?php echo esc_url($pp_flickr_username); ?>"><i class="fa fa-flickr"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_youtube_username = get_option('pp_youtube_username');
			    		
			    		if(!empty($pp_youtube_username))
			    		{
			    	?>
			    	<li class="youtube"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Youtube" href="http://youtube.com/channel/<?php echo esc_url($pp_youtube_username); ?>"><i class="fa fa-youtube"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_vimeo_username = get_option('pp_vimeo_username');
			    		
			    		if(!empty($pp_vimeo_username))
			    		{
			    	?>
			    	<li class="vimeo"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Vimeo" href="http://vimeo.com/<?php echo esc_url($pp_vimeo_username); ?>"><i class="fa fa-vimeo-square"></i></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_tumblr_username = get_option('pp_tumblr_username');
			    		
			    		if(!empty($pp_tumblr_username))
			    		{
			    	?>
			    	<li class="tumblr"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Tumblr" href="http://<?php echo esc_url($pp_tumblr_username); ?>.tumblr.com"><i class="fa fa-tumblr"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_google_url = get_option('pp_google_url');
			    		
			    		if(!empty($pp_google_url))
			    		{
			    	?>
			    	<li class="google"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Google+" href="<?php echo esc_url($pp_google_url); ?>"><i class="fa fa-google-plus"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_dribbble_username = get_option('pp_dribbble_username');
			    		
			    		if(!empty($pp_dribbble_username))
			    		{
			    	?>
			    	<li class="dribbble"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Dribbble" href="http://dribbble.com/<?php echo esc_url($pp_dribbble_username); ?>"><i class="fa fa-dribbble"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_linkedin_username = get_option('pp_linkedin_username');
			    		
			    		if(!empty($pp_linkedin_username))
			    		{
			    	?>
			    	<li class="linkedin"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Linkedin" href="<?php echo esc_url($pp_linkedin_username); ?>"><i class="fa fa-linkedin"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			            $pp_pinterest_username = get_option('pp_pinterest_username');
			            
			            if(!empty($pp_pinterest_username))
			            {
			        ?>
			        <li class="pinterest"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Pinterest" href="http://pinterest.com/<?php echo esc_url($pp_pinterest_username); ?>"><i class="fa fa-pinterest"></i></a></li>
			        <?php
			            }
			        ?>
			        <?php
			        	$pp_instagram_username = get_option('pp_instagram_username');
			        	
			        	if(!empty($pp_instagram_username))
			        	{
			        ?>
			        <li class="instagram"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Instagram" href="http://instagram.com/<?php echo esc_url($pp_instagram_username); ?>"><i class="fa fa-instagram"></i></a></li>
			        <?php
			        	}
			        ?>
			        <?php
					    $pp_behance_username = get_option('pp_behance_username');
					    
					    if(!empty($pp_behance_username))
					    {
					?>
					<li class="behance"><a <?php if(!empty($pp_topbar_social_link_blank)) { ?>target="_blank"<?php } ?> title="Behance" href="http://behance.net/<?php echo esc_url($pp_behance_username); ?>"><i class="fa fa-behance-square"></i></a></li>
					<?php
					    }
					?>
			    </ul>
			</div>
		<?php
				}
			} //End if display social icons
			else
			{
				if ( has_nav_menu( 'footer-menu' ) ) 
			    {
				    wp_nav_menu( 
				        	array( 
				        		'menu_id'			=> 'footer_menu',
				        		'menu_class'		=> 'footer_nav',
				        		'theme_location' 	=> 'footer-menu',
				        	) 
				    ); 
				}
			}
		?>
	    <?php
	    	//Display copyright text
	        $tg_footer_copyright_text = kirki_get_option('tg_footer_copyright_text');

	        if(!empty($tg_footer_copyright_text))
	        {
	        	echo '<div id="copyright">'.wp_kses_post(htmlspecialchars_decode($tg_footer_copyright_text)).'</div><br class="clear"/>';
	        }
	    ?>
	    
	    <?php
	    	//Check if display to top button
	    	$tg_footer_copyright_totop = kirki_get_option('tg_footer_copyright_totop');
	    	
	    	if(!empty($tg_footer_copyright_totop))
	    	{
	    ?>
	    	<a id="toTop"><i class="fa fa-angle-up"></i></a>
	    <?php
	    	}
	    ?>
	</div>
</div>

</div>

<?php
    } //End if not blank template
?>

<div id="overlay_background">
	<?php
		if(is_single())
		{
	?>
	<div id="fullscreen_share_wrapper">
		<div class="fullscreen_share_content">
	<?php
			get_template_part("/templates/template-share");
	?>
		</div>
	</div>
	<?php
		}
	?>
</div>

<?php
    //Check if theme demo then enable layout switcher
    if(THEMEDEMO)
    {
?>
    <div id="option_wrapper">
    <div class="inner">
    	<div style="text-align:center">
    	<a target="_blank" href="http://themeforest.net/item/lets-blog-responsive-blog-wordpress-theme/12340419?ref=ThemeGoods&license=regular&open_purchase_for_item_id=12340419&purchasable=source&ref=ThemeGoods" class="button buy">BUY THIS THEME NOW!</a>
    	<br/><br/><hr/>
    	<h6>THEME DEMOS</h6>
    	<p>
    	Lets Blog is so powerful theme allow you to easily create your own style of blog & magazine site. Here are example that can be imported with one click.</p>
    	<ul class="demo_list">
    		<li>
        		<img src="<?php echo get_stylesheet_directory_uri(); ?>/cache/demos/screen1.jpg" alt=""/>
        		<div class="demo_thumb_hover_wrapper">
        		    <div class="demo_thumb_hover_inner">
        		    	<div class="demo_thumb_desc">
    	    	    		<h6>Classic</h6>
    	    	    		<a href="<?php echo site_url(); ?>" target="_blank" class="button white">Launch</a>
        		    	</div> 
        		    </div>	   
        		</div>		   
    		</li>
    		<li>
        		<img src="<?php echo get_stylesheet_directory_uri(); ?>/cache/demos/screen2.jpg" alt=""/>
        		<div class="demo_thumb_hover_wrapper">
        		    <div class="demo_thumb_hover_inner">
        		    	<div class="demo_thumb_desc">
    	    	    		<h6>3 Columns Slider</h6>
    	    	    		<a href="<?php echo site_url('/?layout=fullwidth'); ?>" target="_blank" class="button white">Launch</a>
        		    	</div> 
        		    </div>	   
        		</div>		   
    		</li>
    		<li>
        		<img src="<?php echo get_stylesheet_directory_uri(); ?>/cache/demos/screen3.jpg" alt=""/>
        		<div class="demo_thumb_hover_wrapper">
        		    <div class="demo_thumb_hover_inner">
        		    	<div class="demo_thumb_desc">
    	    	    		<h6>Grid With No Frame</h6>
    	    	    		<a href="<?php echo site_url('/?layout=3cols&frame=noframe'); ?>" target="_blank" class="button white">Launch</a>
        		    	</div> 
        		    </div>	   
        		</div>		   
    		</li>
    		<li>
        		<img src="<?php echo get_stylesheet_directory_uri(); ?>/cache/demos/screen4.jpg" alt=""/>
        		<div class="demo_thumb_hover_wrapper">
        		    <div class="demo_thumb_hover_inner">
        		    	<div class="demo_thumb_desc">
    	    	    		<h6>Boxed Layout</h6>
    	    	    		<a href="<?php echo site_url('/?layout=fullwidth&frame=noframe&boxed=1'); ?>" target="_blank" class="button white">Launch</a>
        		    	</div> 
        		    </div>	   
        		</div>		   
    		</li>
    		<li>
        		<img src="<?php echo get_stylesheet_directory_uri(); ?>/cache/demos/screen5.jpg" alt=""/>
        		<div class="demo_thumb_hover_wrapper">
        		    <div class="demo_thumb_hover_inner">
        		    	<div class="demo_thumb_desc">
    	    	    		<h6>Classic With Top Menu</h6>
    	    	    		<a href="<?php echo site_url('/?topbar=1'); ?>" target="_blank" class="button white">Launch</a>
        		    	</div> 
        		    </div>	   
        		</div>		   
    		</li>
    		<li>
        		<img src="<?php echo get_stylesheet_directory_uri(); ?>/cache/demos/screen6.jpg" alt=""/>
        		<div class="demo_thumb_hover_wrapper">
        		    <div class="demo_thumb_hover_inner">
        		    	<div class="demo_thumb_desc">
    	    	    		<h6>Simple Menu</h6>
    	    	    		<a href="<?php echo site_url('/?menu=1&frame=noframe'); ?>" target="_blank" class="button white">Launch</a>
        		    	</div> 
        		    </div>	   
        		</div>		   
    		</li>
    	</ul>
    	</div>
    </div>
    </div>
    <div id="option_btn">
    	<i class="fa fa-cog fa-spin"></i>
    </div>
<?php
    	wp_enqueue_script("letsblog-jquery-cookie", get_stylesheet_directory_uri()."/js/jquery.cookie.js", false, THEMEVERSION, true);
    	wp_enqueue_script("letsblog-script-demo", get_stylesheet_directory_uri()."/templates/script-demo.php", false, THEMEVERSION, true);
    }
?>

<?php
    $tg_frame = kirki_get_option('tg_frame');
    if(THEMEDEMO && isset($_GET['frame']) && $_GET['frame'] == 'noframe')
    {
	    $tg_frame = 0;
?>
<style>
#option_btn
{
	right: 0;
}
</style>
<?php
    }
    
    if(!empty($tg_frame))
    {
    	wp_enqueue_style("letsblog-frame-css", get_template_directory_uri()."/css/frame.css", false, THEMEVERSION, "all");
?>
    <div class="frame_top"></div>
    <div class="frame_bottom"></div>
    <div class="frame_left"></div>
    <div class="frame_right"></div>
<?php
    }
    if(THEMEDEMO && isset($_GET['frame_color']) && !empty($_GET['frame_color']))
    {
?>
<style>
.frame_top, .frame_bottom, .frame_left, .frame_right { background: <?php echo esc_html($_GET['frame_color']); ?> !important; }
</style>
<?php
	}
?>

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
