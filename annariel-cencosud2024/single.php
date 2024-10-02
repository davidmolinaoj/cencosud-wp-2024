<?php 
/**
 * @package annariel-cencosud2023
 * @subpackage single
 */

get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();
        
        $img= wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
?>
    <div class="blog-page">  
               
        <section class="blog-body">            
            <div class="container"> 
                <div class="blog-nav">
                    <a href="<?php  echo site_url()?>/categorias/lorem-ipsum-dolor-sit-amet/" class="link"> <i class="fas fa-angle-left"></i> Volver a Blog</a>
                </div>
                <?php echo $img ? '<div class="blog-image">'.get_image(@$img[0]).'</div>' : '' ?>
                
                <?php  echo '<h2 class="blog-title">'.get_the_title().'</h2>' ?> 
                <div class="blog-text">
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
