<?php 
/**
 * @package annariel-cencosud2023
 * @subpackage archive
 */

get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();
        
?>
    <div class="blog-page">  
        <section class="blog-banner">
            <div class="desktop" style="background-image:url(<?php echo THEME_IMGS.'blog-banner-desktop.png' ?>);"></div>
            <div class="mobile" style="background-image:url(<?php echo THEME_IMGS.'blog-banner-mobile.png' ?>);"></div>
            <div class="container">
                <div class="block">
                    <h1>Blog</h1>
                    <p>
                    Lorem ipsum dolor sit amet, consect
etuer adipiscing elit, sed diam nonu
mmy nibh euismod tincidunt u ea .
                    </p>
                </div>
            </div>
        </section>        
        <section class="blog-body">            
            <div class="container"> 
                <h2>archive</h2>
            </div>
        </section>        
    </div>
    <?php endwhile; ?>
<?php else: ?>
    <?php get_404_template(); ?>
<?php endif; ?>
<?php get_footer(); 
