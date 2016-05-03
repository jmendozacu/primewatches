<?php 
if(is_search())
{
?>
<div class="search_form_wrapper">
    <?php _e( "Search results for", THEMEDOMAIN ); ?> <strong><?php the_search_query(); ?></strong>. <?php _e( "If you didn't find what you were looking for, try a new search.", THEMEDOMAIN ); ?><br/><br/>
    
    <form class="searchform" role="search" method="get" action="<?php echo home_url(); ?>">
    	<input style="width:100%" type="text" class="field searchform-s" name="s" value="<?php the_search_query(); ?>" title="<?php _e( 'Type to search and hit enter...', THEMEDOMAIN ); ?>">
    </form>
</div>
<?php
}
?>