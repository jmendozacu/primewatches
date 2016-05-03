<?php
/**
 * The main template file for display blog page.
 *
 * @package WordPress
*/

/**
*	Get Current page object
**/
if(!is_null($post))
{
	$page_obj = get_page($post->ID);
}

$current_page_id = '';

/**
*	Get current page id
**/

if(!is_null($post) && isset($page_obj->ID))
{
    $current_page_id = $page_obj->ID;
}

get_header(); 

$is_standard_wp_post = FALSE;
$page_sidebar = 'page-sidebar';

if(is_tag())
{
    $is_standard_wp_post = TRUE;
    $page_sidebar = 'tag-sidebar';
} 
elseif(is_category())
{
    $is_standard_wp_post = TRUE;
    $page_sidebar = 'category-sidebar';
}
elseif(is_archive())
{
    $is_standard_wp_post = TRUE;
    $page_sidebar = 'archives-sidebar';
} 
elseif(is_search())
{
    $is_standard_wp_post = TRUE;
    $page_sidebar = 'search-sidebar';
} 
		
get_header(); 

//Include post featured slider
$tg_blog_slider_layout = kirki_get_option('tg_blog_slider_layout');

get_template_part("/templates/template-".$tg_blog_slider_layout);

if(is_category() OR is_tag() OR is_archive())
{
	get_template_part("/templates/template-header");
}
else
{
?>
<div id="page_content_wrapper">
<?php
}
?>
    <div class="inner">

    	<!-- Begin main content -->
    	<div class="inner_wrapper">

    			<div class="sidebar_content full_width">
<?php
//Include post search bar
get_template_part("/templates/template-search");

if (have_posts()) : while (have_posts()) : the_post();
	$image_thumb = '';
								
	if(has_post_thumbnail(get_the_ID(), 'large'))
	{
	    $image_id = get_post_thumbnail_id(get_the_ID());
	    $image_thumb = wp_get_attachment_image_src($image_id, 'large', true);
	}
?>

<!-- Begin each blog post -->
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post_wrapper">
	    
	    <div class="post_content_wrapper">
	    
	    	<div class="post_header search">
		    	<?php
				    //Get post featured content
				    $post_content_class = 'one';
				    
				    if(!empty($image_thumb))
				    {
				        $small_image_url = wp_get_attachment_image_src($image_id, 'letsblog_blog_thumb', true);
				        $post_content_class = 'two_third last';
				?>
				
				    <div class="post_img static one_third">
				        <a href="<?php the_permalink(); ?>">
				        	<img src="<?php echo esc_url($small_image_url[0]); ?>" alt="" class="" style="width:<?php echo esc_attr($small_image_url[1]); ?>px;height:<?php echo esc_attr($small_image_url[2]); ?>px;"/>
					    </a>
				    </div>
				
				<?php
				    }
				?>
				
				<div class="post_header_title <?php echo esc_attr($post_content_class); ?>">
			      	<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
			      <span st_url='<?php the_permalink(); ?>' st_title='<?php the_title(); ?>' class='st_facebook'></span>
<span st_url='<?php the_permalink(); ?>' st_title='<?php the_title(); ?>' class='st_twitter'></span>
<span st_url='<?php the_permalink(); ?>' st_title='<?php the_title(); ?>' class='st_pinterest'></span>
<span st_url='<?php the_permalink(); ?>' st_title='<?php the_title(); ?>' class='st_email'></span>

				  	<p><?php echo letsblog_get_excerpt_by_id(get_the_ID()); ?></p>
			   </div>
			</div>
			
	    </div>
	    
	</div>

</div>
<br class="clear"/>
<!-- End each blog post -->

<?php endwhile; endif; ?>

	    	<div class="pagination"><p><?php posts_nav_link(' ', '<i class="fa fa-angle-double-left"></i>'.__( 'Newer Posts', THEMEDOMAIN ), __( 'Older Posts', THEMEDOMAIN ).'<i class="fa fa-angle-double-right"></i>'); ?></p></div>
    		
			</div>
    		
    	</div>
    <!-- End main content -->
	</div>
</div>
<?php get_footer(); ?>