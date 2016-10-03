<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package bootscores
 */

if (  is_active_sidebar( 'sidebar-1' ) ) {
?>

<div id="secondary" class="widget-area col-sm-3" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->

<?php } ?>