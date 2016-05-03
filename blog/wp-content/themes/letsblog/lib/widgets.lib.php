<?php

/**
*	Begin Recent Posts Custom Widgets
**/

class Custom_Recent_Posts extends WP_Widget {
	function Custom_Recent_Posts() {
		$widget_ops = array('classname' => 'Custom_Recent_Posts', 'description' => 'The recent posts with thumbnails' );
		$this->WP_Widget('Custom_Recent_Posts', 'Custom Recent Posts', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo $before_widget;
		$items = empty($instance['items']) ? ' ' : apply_filters('widget_title', $instance['items']);
		$items = absint($items);
		
		$show_thumb = empty($instance['show_thumb']) ? ' ' : apply_filters('widget_title', $instance['show_thumb']);
		
		if(!is_numeric($items))
		{
			$items = 3;
		}
		
		if(!empty($items))
		{
			letsblog_posts('recent', $items, TRUE, trim($show_thumb));
		}
		
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['items'] = strip_tags($new_instance['items']);
		$instance['show_thumb'] = strip_tags($new_instance['show_thumb']);

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'items' => '', 'show_thumb' => '') );
		$items = strip_tags($instance['items']);
		$show_thumb = strip_tags($instance['show_thumb']);

?>
			<p><label for="<?php echo esc_attr($this->get_field_id('items')); ?>">Items (default 3): <input class="widefat" id="<?php echo esc_attr($this->get_field_id('items')); ?>" name="<?php echo esc_attr($this->get_field_name('items')); ?>" type="text" value="<?php echo esc_attr($items); ?>" /></label></p>
			
			<p><label for="<?php echo esc_attr($this->get_field_id('show_thumb')); ?>">Display Thumbnails: <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show_thumb')); ?>" name="<?php echo esc_attr($this->get_field_name('show_thumb')); ?>" type="checkbox" value="1" <?php if(!empty($show_thumb)) { ?>checked<?php } ?> /></label></p>
<?php
	}
}

register_widget('Custom_Recent_Posts');

/**
*	End Recent Posts Custom Widgets
**/

/**
*	Begin Popular Posts Custom Widgets
**/

class Custom_Popular_Posts extends WP_Widget {
	function Custom_Popular_Posts() {
		$widget_ops = array('classname' => 'Custom_Popular_Posts', 'description' => 'The popular posts with thumbnails' );
		$this->WP_Widget('Custom_Popular_Posts', 'Custom Popular Posts', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo $before_widget;
		$items = empty($instance['items']) ? ' ' : apply_filters('widget_title', $instance['items']);
		$items = absint($items);
		
		$show_thumb = empty($instance['show_thumb']) ? ' ' : apply_filters('widget_title', $instance['show_thumb']);
		
		if(!is_numeric($items))
		{
			$items = 3;
		}
		
		if(!empty($items))
		{
			letsblog_posts('popular', $items, TRUE, trim($show_thumb));
		}
		
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['items'] = strip_tags($new_instance['items']);
		$instance['show_thumb'] = strip_tags($new_instance['show_thumb']);

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'items' => '', 'show_thumb' => '') );
		$items = strip_tags($instance['items']);
		$show_thumb = strip_tags($instance['show_thumb']);

?>
			<p><label for="<?php echo esc_attr($this->get_field_id('items')); ?>">Items (default 3): <input class="widefat" id="<?php echo esc_attr($this->get_field_id('items')); ?>" name="<?php echo esc_attr($this->get_field_name('items')); ?>" type="text" value="<?php echo esc_attr($items); ?>" /></label></p>
			
			<p><label for="<?php echo esc_attr($this->get_field_id('show_thumb')); ?>">Display Thumbnails: <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show_thumb')); ?>" name="<?php echo esc_attr($this->get_field_name('show_thumb')); ?>" type="checkbox" value="1" <?php if(!empty($show_thumb)) { ?>checked<?php } ?> /></label></p>
<?php
	}
}

register_widget('Custom_Popular_Posts');

/**
*	End Popular Posts Custom Widgets
**/

/**
*	Begin Twitter Feed Custom Widgets
**/

class Custom_Twitter extends WP_Widget {
	function Custom_Twitter() {
		$widget_ops = array('classname' => 'Custom_Twitter', 'description' => 'Display your recent Twitter feed' );
		$this->WP_Widget('Custom_Twitter', 'Custom Twitter', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo $before_widget;
		$twitter_username = empty($instance['twitter_username']) ? ' ' : apply_filters('widget_title', $instance['twitter_username']);
		$title = $instance['title'];
		
		$items = empty($instance['items']) ? ' ' : apply_filters('widget_title', $instance['items']);
		$items = absint($items);
		
		$consumer_key = get_option(SHORTNAME."_twitter_consumer_key");
		$consumer_secret = get_option(SHORTNAME."_twitter_consumer_secret");
		$access_token = get_option(SHORTNAME."_twitter_consumer_token");;
		$access_token_secret = get_option(SHORTNAME."_twitter_consumer_token_secret");
		
		if(!is_numeric($items))
		{
			$items = 5;
		}
		
		if(empty($title))
		{
			$title = 'Recent Tweets';
		}
		
		if(!empty($items) && !empty($twitter_username))
		{
			if (function_exists('getTweets')) 
			{
				// Begin get user timeline
				$tweets = getTweets($items, $twitter_username);
	
				if(!empty($tweets))
				{
					echo '<h2 class="widgettitle">'.$title.'</h2>';
					echo '<ul class="twitter">';
					
					foreach($tweets as $tweet)
					{
						echo '<li>';
						
						if(isset($tweet['text']))
						{
							echo '<div class="tweet">'.letsblog_auto_link_twitter($tweet['text']).'</div>';
						}
						
						echo '</li>';
					}
					
					echo '</ul>';
				}
			}
			else
			{
				echo 'Please install plugin name "oAuth Twitter Feed for Developers".';
			}
		}
		
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['twitter_username'] = strip_tags($new_instance['twitter_username']);
		$instance['items'] = strip_tags($new_instance['items']);
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'items' => '', 'twitter_username' => '', 'title' => '', 'consumer_key' => '', 'consumer_secret' => '', 'access_token' => '', 'access_token_secret' => '') );
		$items = strip_tags($instance['items']);
		
		$twitter_username = strip_tags($instance['twitter_username']);
		$title = strip_tags($instance['title']);

?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('twitter_username')); ?>">Twitter Username: <input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter_username')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter_username')); ?>" type="text" value="<?php echo esc_attr($twitter_username); ?>" /></label>
			</p>
			
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title: <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label>
			</p>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('items')); ?>">Items (default 5): <input class="widefat" id="<?php echo esc_attr($this->get_field_id('items')); ?>" name="<?php echo esc_attr($this->get_field_name('items')); ?>" type="text" value="<?php echo esc_attr($items); ?>" /></label>
			</p>
<?php
	}
}

register_widget('Custom_Twitter');

/**
*	End Twitter Feed Custom Widgets
**/


/**
*	Begin Flickr Feed Custom Widgets
**/

class Custom_Flickr extends WP_Widget {
	function Custom_Flickr() {
		$widget_ops = array('classname' => 'Custom_Flickr', 'description' => 'Display your recent Flickr photos' );
		$this->WP_Widget('Custom_Flickr', 'Custom Flickr', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo $before_widget;
		$flickr_id = empty($instance['flickr_id']) ? ' ' : apply_filters('widget_title', $instance['flickr_id']);
		$title = $instance['title'];
		$items = $instance['items'];
		$items = absint($items);
		
		if(!is_numeric($items))
		{
			$items = 9;
		}
		
		if(empty($title))
		{
			$title = 'Flickr Widget';
		}
		
		if(!empty($items) && !empty($flickr_id))
		{
			$photos_arr = letsblog_get_flickr(array('type' => 'user', 'id' => $flickr_id, 'items' => $items));

			if(!empty($photos_arr))
			{
				echo '<h2 class="widgettitle"><span>'.$title.'</span></h2>';
				echo '<ul class="flickr">';
				
				foreach($photos_arr as $photo)
				{
					echo '<li>';
					echo '<a target="_blank" href="'.esc_url($photo['link']).'"><img src="'.esc_url($photo['thumb_url']).'" alt="'.esc_attr($photo['title']).'" width="75" height="75" /></a>';
					echo '</li>';
				}
				
				echo '</ul><br class="clear"/>';
			}
		}
		
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['items'] = absint($new_instance['items']);
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['flickr_id'] = strip_tags($new_instance['flickr_id']);

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'items' => '', 'flickr_id' => '', 'title' => '') );
		$items = strip_tags($instance['items']);
		$flickr_id = strip_tags($instance['flickr_id']);
		$title = strip_tags($instance['title']);

?>
			<p><label for="<?php echo esc_attr($this->get_field_id('flickr_id')); ?>">Flickr ID <a href="http://idgettr.com/">Find your Flickr ID here</a>: <input class="widefat" id="<?php echo esc_attr($this->get_field_id('flickr_id')); ?>" name="<?php echo esc_attr($this->get_field_name('flickr_id')); ?>" type="text" value="<?php echo esc_attr($flickr_id); ?>" /></label></p>
			
			<p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title: <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>

			<p><label for="<?php echo esc_attr($this->get_field_id('items')); ?>">Items (default 9): <input class="widefat" id="<?php echo esc_attr($this->get_field_id('items')); ?>" name="<?php echo esc_attr($this->get_field_name('items')); ?>" type="text" value="<?php echo esc_attr($items); ?>" /></label></p>
<?php
	}
}

register_widget('Custom_Flickr');

/**
*	End Flickr Feed Custom Widgets
**/


/**
*	Begin Instagram Feed Custom Widgets
**/

class Custom_Instagram extends WP_Widget {
	function Custom_Instagram() {
		$widget_ops = array('classname' => 'Custom_Instagram', 'description' => 'Display your recent Instagram photos' );
		$this->WP_Widget('Custom_Instagram', 'Custom Instagram', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo $before_widget;
		$title = $instance['title'];
		$items = $instance['items'];
		$items = absint($items);
		
		//Get Instagram Access Data
		$pp_instagram_username = get_option('pp_instagram_username');
		$pp_instagram_access_token = get_option('pp_instagram_access_token');
		
		if(!is_numeric($items))
		{
			$items = 9;
		}
		
		if(empty($title))
		{
			$title = 'Flickr Widget';
		}
		
		if(!empty($items) && !empty($pp_instagram_username) && !empty($pp_instagram_access_token))
		{
			$photos_arr = letsblog_get_instagram($pp_instagram_username, $pp_instagram_access_token, $items);

			if(!empty($photos_arr))
			{
				echo '<h2 class="widgettitle"><span>'.$title.'</span></h2>';
				echo '<ul class="flickr">';
				
				foreach($photos_arr as $photo)
				{
					echo '<li>';
					echo '<a target="_blank" href="'.esc_url($photo['link']).'"><img src="'.esc_url($photo['thumb_url']).'" alt="'.esc_attr($photo['title']).'" width="75" height="75" /></a>';
					echo '</li>';
				}
				
				echo '</ul><br class="clear"/>';
			}
		}
		else
		{
			echo 'Error: Please check if you enter Instagram username and Access Token in Theme Setting > Social Profiles';
		}
		
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['items'] = absint($new_instance['items']);
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'items' => '', 'title' => '') );
		$items = strip_tags($instance['items']);
		$title = strip_tags($instance['title']);

?>
			<p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title: <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>

			<p><label for="<?php echo esc_attr($this->get_field_id('items')); ?>">Items (default 9): <input class="widefat" id="<?php echo esc_attr($this->get_field_id('items')); ?>" name="<?php echo esc_attr($this->get_field_name('items')); ?>" type="text" value="<?php echo esc_attr($items); ?>" /></label></p>
<?php
	}
}

register_widget('Custom_Instagram');

/**
*	End Instagram Feed Custom Widgets
**/


/**
*	Begin Category Posts Custom Widgets
**/

class Custom_Cat_Posts extends WP_Widget {
	function Custom_Cat_Posts() {
		$widget_ops = array('classname' => 'Custom_Cat_Posts', 'description' => 'Display category\'s post' );
		$this->WP_Widget('Custom_Cat_Posts', 'Custom Category Posts', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo $before_widget;
		$cat_id = empty($instance['cat_id']) ? 0 : $instance['cat_id'];
		$items = empty($instance['items']) ? 0 : $instance['items'];
		$items = absint($items);
		
		$show_thumb = empty($instance['show_thumb']) ? ' ' : apply_filters('widget_title', $instance['show_thumb']);
		
		if(empty($items))
		{
			$items = 5;
		}
		
		if(!empty($cat_id))
		{
			pp_cat_posts($cat_id, $items, TRUE, trim($show_thumb));
		}

		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['cat_id'] = strip_tags($new_instance['cat_id']);
		$instance['items'] = strip_tags($new_instance['items']);
		$instance['show_thumb'] = strip_tags($new_instance['show_thumb']);

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'cat_id' => '', 'items' => '', 'show_thumb' => '') );
		$cat_id = strip_tags($instance['cat_id']);
		$items = strip_tags($instance['items']);
		$show_thumb = strip_tags($instance['show_thumb']);
		
		$categories = get_categories('hide_empty=0&orderby=name');
		$wp_cats = array(
			0		=> "Choose a category"
		);
		foreach ($categories as $category_list ) {
			$wp_cats[$category_list->cat_ID] = $category_list->cat_name;
		}

?>
			
			<p><label for="<?php echo esc_attr($this->get_field_id('cat_id')); ?>">Category: 
				<select  id="<?php echo esc_attr($this->get_field_id('cat_id')); ?>" name="<?php echo esc_attr($this->get_field_name('cat_id')); ?>">
				<?php
					foreach($wp_cats as $wp_cat_id => $wp_cat)
					{
				?>
						<option value="<?php echo esc_attr($wp_cat_id); ?>" <?php if(esc_attr($cat_id) == $wp_cat_id) { echo 'selected="selected"'; } ?>><?php echo esc_html($wp_cat); ?></option>
				<?php
					}
				?>
				</select>
			</label></p>
			
			<p><label for="<?php echo esc_attr($this->get_field_id('items')); ?>">Items (default 5): <input class="widefat" id="<?php echo esc_attr($this->get_field_id('items')); ?>" name="<?php echo esc_attr($this->get_field_name('items')); ?>" type="text" value="<?php echo esc_attr($items); ?>" /></label></p>
			
			<p><label for="<?php echo esc_attr($this->get_field_id('show_thumb')); ?>">Display Thumbnails: <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show_thumb')); ?>" name="<?php echo esc_attr($this->get_field_name('show_thumb')); ?>" type="checkbox" value="1" <?php if(!empty($show_thumb)) { ?>checked<?php } ?> /></label></p>
<?php
	}
}

register_widget('Custom_Cat_Posts');

/**
*	End Category Posts Custom Widgets
**/


/**
*	Begin Social Profiles Custom Widgets
**/

class Social_Profiles_Posts extends WP_Widget {
	function Social_Profiles_Posts() {
		$widget_ops = array('classname' => 'Social_Profiles_Posts', 'description' => 'Display social profiles' );
		$this->WP_Widget('Social_Profiles_Posts', 'Custom Social Profiles', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		$title = $instance['title'];

		echo $before_widget;
		
		if(!empty($title))
		{
			echo '<h2 class="widgettitle"><span>'.$title.'</span></h2>';
		}
		
		echo '<div class="textwidget">';
		echo do_shortcode('[tg_social_icons style="light" size="small"]');
		echo '</div>';

		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'items' => '', 'title' => '') );
		$title = strip_tags($instance['title']);

?>
		<p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title: <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
<?php
	}
}

register_widget('Social_Profiles_Posts');

/**
*	End Social Profiles Widgets
**/

/**
*	Begin Custom Ads Widgets
**/

class Custom_Ads extends WP_Widget {
	function Custom_Ads() {
		$widget_ops = array('classname' => 'Custom_Ads', 'description' => 'Enter your advertisement embed code' );
		$this->WP_Widget('Custom_Ads', 'Custom Ads', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo $before_widget;
		$ads_code = $instance['ads_code'];
		
		if(!empty($ads_code))
		{
			echo stripslashes(html_entity_decode($ads_code));
		}
		
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['ads_code'] = $new_instance['ads_code'];

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'ads_code' => '') );
		$ads_code = $instance['ads_code'];

?>
			<p><label for="<?php echo $this->get_field_id('ads_code'); ?>">Enter your advertisement embed code below: <textarea class="widefat" id="<?php echo $this->get_field_id('ads_code'); ?>" name="<?php echo $this->get_field_name('ads_code'); ?>"><?php echo esc_attr($ads_code); ?></textarea></label></p>
<?php
	}
}

register_widget('Custom_Ads');

/**
*	End Custom Ads Widgets
**/
?>