<?php 
/**
 * Template Name: Cencosud 2023 - Blog
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */
get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();
                
        $content=get_fields();
        
        $category= get_terms( 'category', array(
            'parent'       => 0
        ));

        $blogs=get_posts([
            'numberposts' => -1
        ])
                
?>
<div class="blog-page">  
    <?php get_banner_block('blog-banner',$content['banner']) ?>       
    <section class="blog-body">            
        <div class="container"> 
            <div class="blog-category">  
                <i class="trigger fas fa-angle-down"></i>
                <a href="<?php echo site_url('blog') ?>" class="active">Todos</a>
                <?php 
                if($category) {
                    foreach($category as $cat) {
                ?>
                <a href="<?php echo get_term_link($cat) ?>"><?php echo $cat->name ?></a>
                <?php 
                    }
                }
                ?>
            </div>
        
            <div class="blog-items">
                <?php if($blogs) {
                    foreach($blogs as $b){
                        $image=get_the_post_thumbnail_url( $b->ID, 'full');
                ?>
                    <div class="item">
                        <a href="<?php echo get_permalink( $b ) ?>" class="link"></a>
                        <div class="image" <?php echo get_image_bg($image) ?> ></div>
                        <h2><?php echo get_the_title( $b ) ?></h2>
                        <p><?php echo get_the_excerpt( $b ) ?></p>
                        <label>leer más <i class="fas fa-caret-right"></i></label>
                    </div>
                <?php }
                }?>   
            </div>             
        </div>
    </section>        
</div>

    <?php endwhile; ?>
<?php else: ?>
    <?php get_404_template(); ?>
<?php endif; ?>
<?php get_footer(); 
