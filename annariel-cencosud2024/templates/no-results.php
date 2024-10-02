<?php
/**
 * Template Part: Sin resultados
 *
 * @package annariel-cencosud2023
 * @subpackage templates
 */
?>

<section class="no-results not-found">

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( ___( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php __e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php __e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->

</section><!-- .no-results -->