<?php 
/**
 * Template Name: Page - Participa y Gana - Result
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */
get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();

        $banner=get_page_banner( get_the_ID() );

        $content=$banner['content'];
                
?>
<div class="join-page">    
    <?php get_template_part('templates/section-banner'); ?>
    
    <section class="join-block">
        <div class="join-result">
            <?php the_content() ?>  
        </div>
    </section>
    
</div>

    <?php endwhile; ?>
<?php else: ?>
    <?php get_404_template(); ?>
<?php endif; ?>
<?php get_footer(); 
