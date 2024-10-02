<?php 
/**
 * @package annariel-cencosud2023
 * @subpackage page
 */

get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();
        
        $img= wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
?>
    <div class="page-content" >        
        <?php get_template_part('templates/section-banner'); ?>
        
        <section class="page-body">            
            <div class="container">
                <div class="block">
                <?php  echo '<h1>'.get_the_title().'</h1>' ?>  
                <?php  the_content(); ?>  
                </div>
            </div>
        </section>        
    </div>
    <?php endwhile; ?>
<?php else: ?>
    <?php get_404_template(); ?>
<?php endif; ?>
<?php get_footer(); 
