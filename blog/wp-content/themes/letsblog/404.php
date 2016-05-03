<?php
/**
 * The main template file for display error page.
 *
 * @package WordPress
*/


get_header(); 
?>

<!-- Begin content -->
<div id="page_content_wrapper">

    <div class="inner">
    
    	<!-- Begin main content -->
    	<div class="inner_wrapper">
    	
    		<div class="error_box">
				<p class="error_type">404</p>
			</div>
			<p class="error_text"><?php _e( 'Not Found!', THEMEDOMAIN ); ?></p>
    	
	    	<div class="search_form_wrapper">
	    		<div class="content">
	    	    	<?php _e( "We're sorry, the page you have looked for does not exist in our content!", THEMEDOMAIN ); ?><br/>
	    	    	<?php _e( "Perhaps you would like to go to our homepage or try searching below.", THEMEDOMAIN ); ?>
	    		</div>
	    	    
	    	    <form class="searchform" role="search" method="get" action="<?php echo home_url(); ?>">
			    	<input style="width:100%" type="text" class="field searchform-s" name="s" value="<?php the_search_query(); ?>" placeholder="<?php _e( 'Type to search and hit enter...', THEMEDOMAIN ); ?>">
			    </form>
    		</div>
    		<br/>
	    	
	    	<h5><?php _e( 'Or try to browse our latest posts instead?', THEMEDOMAIN ); ?></h5>
	    		
	    		<div class="sidebar_content full_width three_cols">
	    		<?php
				
				$query_string ="items=6&post_type=post&paged=$paged";
				query_posts($query_string);
				$key = 0;
				
				if (have_posts()) : while (have_posts()) : the_post();
					
					$animate_layer = $key+7;
					$image_thumb = '';
												
					if(has_post_thumbnail(get_the_ID(), 'large'))
					{
					    $image_id = get_post_thumbnail_id(get_the_ID());
					    $image_thumb = wp_get_attachment_image_src($image_id, 'large', true);
					}
				?>
				
				<!-- Begin each blog post -->
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php if($key%3==0) { ?>data-column="last"<?php } ?>>
				
					<div class="post_wrapper">
					    
					    <div class="post_content_wrapper">
					    
					    	<div class="post_header">
						    	<?php
								    if(!empty($image_thumb))
								    {
								       	$small_image_url = wp_get_attachment_image_src($image_id, 'letsblog_blog_thumb', true);
								?>
								
								   	<div class="post_img static">
								   	    <a href="<?php the_permalink(); ?>">
								   	    	<img src="<?php echo esc_url($small_image_url[0]); ?>" alt="" class="" style="width:<?php echo esc_attr($small_image_url[1]); ?>px;height:<?php echo esc_attr($small_image_url[2]); ?>px;"/>
								   	    </a>
								   	</div>
							   <?php
							   		}
							   	?>			   
							   	<br class="clear"/>
							   	
							   	<div class="post_header_title">
							      	<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
							      	<div class="post_detail post_date">
							      		<span class="post_info_date">
							      			<span>
							       				<?php echo date_i18n(THEMEDATEFORMAT, get_the_time('U')); ?>
							      			</span>
							      		</span>
								  	</div>
							   </div>
							      
							    <?php
							      	echo '<p>'.letsblog_get_excerpt_by_id(get_the_ID()).'</p>';
							    ?>
							    <div class="post_button_wrapper">
							    	<a class="readmore" href="<?php the_permalink(); ?>"><?php echo _e( 'Read More', THEMEDOMAIN ); ?></a>
							    </div>
							    
							    <div class="post_info_comment">
									<a href="<?php comments_link(); ?>"><?php comments_number(__('No Comment', THEMEDOMAIN), __('1 Comment', THEMEDOMAIN), __('% Comments', THEMEDOMAIN)); ?></a>
								</div>
							</div>
							
					    </div>
					    
					</div>
				
				</div>
				<!-- End each blog post -->
				
				<?php $key++; ?>
				<?php endwhile; endif; ?>
	    		</div>
    		</div>
    		
    		<div class="sidebar_wrapper">
    		
	    	    <div class="sidebar_top"></div>
	    	
	    	    <div class="sidebar">
	    	    
	    	    	<div class="content">
	    	    
	    	    		<ul class="sidebar_widget">
	    	    		<?php dynamic_sidebar('404 Not Found Sidebar'); ?>
	    	    		</ul>
	    	    	
	    	    	</div>
	    	
	    	    </div>
	    	    <br class="clear"/>
	    	
	    	    <div class="sidebar_bottom"></div>
	    	</div>
    	</div>
    	
</div>
<br class="clear"/>
<?php get_footer(); ?>