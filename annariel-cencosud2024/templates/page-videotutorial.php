<?php 
/**
 * Template Name: Page - Videos Tutoriales
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */
get_header(); 

the_post();

$PAGE_ID=get_the_ID();
$content=get_page_banner($PAGE_ID);

$page    = get_query_var( 'page' );
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args    = array(
    'post_type'      => array( 'videotutorial' ),
    'posts_per_page' => 6,
    'paged'          => $paged
);

$query = new WP_Query( $args );
        
        
?>
<div class="page-videotutorial">
    <section class="page-banner" <?php echo $content['banner-desktop'] ?> >
        <div class="mobile" <?php echo $content['banner-mobile'] ?> ></div>        
        <div class="container">    
            <?php 
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<nav class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">','</nav>' );
            }
            ?>         
            <div class="block">
                <?php echo $content['banner-title'] ?>
                <?php echo $content['banner-subtitle'] ?>
            </div> 
        </div>
        <div class="border-moon"></div>
    </section>

    <section class="page-body">
        <div class="container clearfix">
        <?php 

        if ( $query->have_posts() ) :
            echo '<div class="row">';

            while ( $query->have_posts() ) :
                $query->the_post();
                
                $image=get_the_post_thumbnail_url();
        ?>
            <div class="col-md-6 col-lg-4">
                <article class="item videotutorial-item">
                    <a href="<?php the_permalink() ?>#video" class="link d-none"></a>
                    <div class="image" <?php echo get_image_bg($image) ?> >
                        <i class="fa fa-play" aria-hidden="true"></i>
                    </div>
                    <h3><?php the_title() ?></h3>
                    <div class="info d-none">
                        <?php echo str_replace( array('<','>'), array('[',']'), '<h2>'.get_the_title().'</h2>'.apply_filters('the_content', get_the_content() ) ); ?>
                    </div>
                </article>                
            </div>
        <?php
            endwhile;
            
            echo '</div>';

            
            echo '<div class="pagination-block">';
            if($paged == 1) {
                echo '<span class="prev page-numbers"><i class="fas fa-angle-left" aria-hidden="true"></i></span>';    
            }            
            $GLOBALS['wp_query'] = $query;
            if($paged == 1 && $wp_query->found_posts<=6) {
                echo '<span aria-current="page" class="page-numbers current">1</span>';
            }
            else {
                the_posts_pagination( array(
                    'mid_size' => 2,
                    'prev_text' => '<i class="fas fa-angle-left" aria-hidden="true"></i>',
                    'next_text' => '<i class="fas fa-angle-right" aria-hidden="true"></i>',
                ) );
            }
            if ( $paged == $wp_query->max_num_pages ) {
                echo '<span class="prev page-numbers"><i class="fas fa-angle-right" aria-hidden="true"></i></span>';  
            }
            echo '</div>';

            //popup
            echo '<div id="videotutorial-popup" class="videotutorial-popup"><div class="row h-100  align-items-center"><div class="videotutorial-close"><i class="far fa-times-circle"></i></div><div class="col"><div class="popup"></div></div></div></div>';

        endif;
        ?>
            </div>
        </div>
    </section>

</div>
<?php get_footer(); 
