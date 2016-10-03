<?php
/**
Template Name: Full Width Page (No Sidebar)
 * The template for displaying full width pages.
 *
 * @package bootscores
 */

get_header(); ?>
	<!-- begin page.php -->
	<div id="primary" class="content-area col-sm-12">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
