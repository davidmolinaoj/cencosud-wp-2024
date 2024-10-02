<?php 
/**
 * @package annariel-cencosud2023
 * @subpackage page
 */

get_header(); 


$pageParent=get_page_by_path('videos-tutoriales');
$content=get_page_banner($pageParent->ID);

if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();
        
?>
    <div class="page-videotutorial">
        <section class="page-banner" <?php echo $content['banner-desktop'] ?> >
            <div class="mobile" <?php echo $content['banner-mobile'] ?> ></div>        
            <div class="container">     
                <nav class = "breadcrumbs" typeof = "BreadcrumbList" vocab = "http://schema.org/" > 
                    <span>
                        <span>
                            <a href="<?php echo site_url() ?>">Home</a>
                            &gt;
                            <a href="<?php echo site_url('videos-tutoriales') ?>" class="breadcrumb_last"><strong>Videos Tutoriales</strong></a>
                        </span>
                    </span>
                </nav>    
                <div class="block">
                    <?php echo $content['banner-title'] ?>
                    <?php echo $content['banner-subtitle'] ?>
                </div> 
            </div>
            <div class="border-moon"></div>
        </section>

        <section id="video" class="page-body">
            <div class="container clearfix">
                <?php  echo '<h2>'.get_the_title().'</h2>' ?>  
                <?php  the_content(); ?>  
                <hr>
                <a href="<?php echo get_link_by_path('videos-tutoriales') ?>" class="link-back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</a>
                
            </div>   
        </section>
    </div>
    <?php endwhile; ?>
<?php else: ?>
    <?php get_404_template(); ?>
<?php endif; ?>
<?php get_footer(); 
