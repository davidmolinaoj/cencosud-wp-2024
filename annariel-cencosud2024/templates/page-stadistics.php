<?php 
/**
 * Template Name: Page - Estadísticas
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */
get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();

        $banner=get_page_banner( get_the_ID() );

        $tabs=$banner['content']['tabs'];
                
?>
<div class="stadistics-page">    
    <?php get_template_part('templates/section-banner'); ?>
    
    <section class="stadistics-tabs">
        <div class="container">

            <h2 class="title-h">
                <strong>Estadísticas</strong>
            </h2>
            <nav class="stadistics-nav">
                <div class="block">
                    <div class="owl-carousel owl-theme">
                        <?php foreach($tabs as $i => $t){?>
                            <a href="#tab-<?php echo $i ?>" class="item"><span><?php echo $t['title'] ?></span></a>
                        <?php }?>
                    </div>
                </div>
            </nav>
            
            <div class="tabs">
                <?php foreach($tabs as $i => $t){?>
                    <div id="tab-<?php echo $i ?>" class="tab">
                        <?php echo $t['content'] ?>
                    </div>
                <?php }?>
            </div>
        </div>
    </section>
</div>

    <?php endwhile; ?>
<?php else: ?>
    <?php get_404_template(); ?>
<?php endif; ?>
<?php get_footer(); 
