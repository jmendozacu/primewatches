<?php
    $pin_thumb = wp_get_attachment_image_src($post->ID, 'letsblog_gallery_grid', true);
    if(!isset($pin_thumb[0]))
    {
	    $pin_thumb[0] = '';
    }
?>
<div id="social_share_wrapper">
	<ul>
		<li><a class="tooltip" title="<?php _e( 'Share On Facebook', THEMEDOMAIN ); ?>" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>"><i class="fa fa-facebook marginright"></i></a></li>
		<li><a class="tooltip" title="<?php _e( 'Share On Twitter', THEMEDOMAIN ); ?>" target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php echo get_permalink(); ?>&url=<?php echo get_permalink(); ?>"><i class="fa fa-twitter marginright"></i></a></li>
		<li><a class="tooltip" title="<?php _e( 'Share On Pinterest', THEMEDOMAIN ); ?>" target="_blank" href="http://www.pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>&media=<?php echo urlencode($pin_thumb[0]); ?>"><i class="fa fa-pinterest marginright"></i></a></li>
		<li><a class="tooltip" title="<?php _e( 'Share On Google+', THEMEDOMAIN ); ?>" target="_blank" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>"><i class="fa fa-google-plus marginright"></i></a></li>
	</ul>
</div>