<?php 
/**
 * Template Name: Page - Container
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */
get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();
        
        $pageTitle= get_field('custom_title');
        $pageTitle= $pageTitle?$pageTitle: '<h1>'.get_the_title().'</h1>';

        $img= wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
?>
    <div class="page-content" >        
        <section class="page-banner" <?php echo $img?'style="background-image: url('.$img[0].')"':'' ?> >
            <div class="container">
                <div class="block">
                    <div class="row">                                
                        <div class="offset-1 col-10 col-md-8 col-md-5">
                            <?php echo $pageTitle  ?>
                        </div>                        
                    </div>
                </div>
            </div>
        </section>
        
        <section class="container">
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
                <?php if(function_exists('bcn_display'))
                {
                    bcn_display();
                }?>
            </div>
        </section>

        <section class="page-body" >
            <div class="container">
                <?php  the_content(); ?>  
            </div>
        </section>
        
    </div>
    <?php endwhile; ?>
<?php else: ?>
    <?php get_404_template(); ?>
<?php endif; ?>
<?php get_footer(); 
