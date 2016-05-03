<?php
function letsblog_add_menu_icons_styles(){
?>
 
<style>
#adminmenu .menu-icon-galleries div.wp-menu-image:before {
  content: '\f161';
}
</style>
 
<?php
}
add_action( 'admin_head', 'letsblog_add_menu_icons_styles' );

function letsblog_tag_cloud_filter($args = array()) {
   $args['smallest'] = 13;
   $args['largest'] = 13;
   $args['unit'] = 'px';
   return $args;
}

add_filter('widget_tag_cloud_args', 'letsblog_tag_cloud_filter', 90);

//Control post excerpt length
function letsblog_custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'letsblog_custom_excerpt_length', 200 );

/**
 * Change default fields, add placeholder and change type attributes.
 *
 * @param  array $fields
 * @return array
 */
add_filter( 'comment_form_default_fields', 'letsblog_comment_placeholders' );
 
function letsblog_comment_placeholders( $fields )
{
    $fields['author'] = str_replace('<input', '<input placeholder="'. __('Name', THEMEDOMAIN). '*"',$fields['author']);
    $fields['email'] = str_replace('<input id="email" name="email" type="text"', '<input type="email" placeholder="'.__('Email', THEMEDOMAIN).'*"  id="email" name="email"',$fields['email']);
    $fields['url'] = str_replace('<input id="url" name="url" type="text"', '<input placeholder="'.__('Website', THEMEDOMAIN).'" id="url" name="url" type="url"',$fields['url']);

    return $fields;
}

//Make widget support shortcode
add_filter('widget_text', 'do_shortcode');

// remove version query string from scripts and stylesheets
function letsblog_remove_script_styles_version( $src ){
    return remove_query_arg( 'ver', $src );
}
add_filter( 'script_loader_src', 'letsblog_remove_script_styles_version' );
add_filter( 'style_loader_src', 'letsblog_remove_script_styles_version' );

//Add class name to post navigation links
add_filter('next_posts_link_attributes', 'letsblog_posts_link_attributes_prev');
add_filter('previous_posts_link_attributes', 'letsblog_posts_link_attributes_next');

function letsblog_posts_link_attributes_prev() {
    return 'class="prev_button""';
}

function letsblog_posts_link_attributes_next() {
    return 'class="next_button""';
}

function letsblog_search_form( $form ) {
	$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
	<div>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" />
	<button type="submit" id="searchsubmit" class="button"><i class="fa fa-search"></i></button>
	</div>
	</form>';

	return $form;
}

add_filter( 'get_search_form', 'letsblog_search_form' );
?>