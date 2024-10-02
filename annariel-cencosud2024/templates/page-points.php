<?php 
/**
 * Template Name: Page - Puntos Bonus
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */
get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();
        
        $PAGE_ID=get_the_ID();
        $content=get_page_banner($PAGE_ID);     
        $content=$content['content'];
?>
<div class="point-page">    
    <?php get_template_part('templates/section-banner'); ?>
    <section class="point-info">
        <div class="container">
            <div class="dialog-product">
                <div class="h2 title-h">
                    <?php echo $content['modal_points']['title'] ?>
                </div>
                <?php echo get_image($content['modal_points']['image'],'image') ?>
                <a href="<?php echo $content['modal_points']['button_link'] ?>"  <?php link_is_blank(@$content['modal_points']['button_blank']) ?>  class="btn-pri-orange"><?php echo $content['modal_points']['button_text'] ?></a>
            </div>

            <div class="dialog-card">
                <div class="h2 title-h">
                    <?php echo $content['modal_multi']['title'] ?>
                </div>
                <?php echo get_image($content['modal_multi']['image'],'image') ?>
                <div class="info">
                    <?php echo $content['modal_multi']['text'] ?>
                </div>
                <h4>
                    <?php echo $content['modal_multi']['subtitle'] ?>
                </h4>
                <a href="<?php echo $content['modal_multi']['button_link'] ?>" <?php link_is_blank(@$content['modal_multi']['button_blank']) ?> class="btn-pri-orange"><?php echo $content['modal_multi']['button_text'] ?></a>
                <small>
                    <?php echo $content['modal_multi']['contact'] ?>
                </small>
            </div>
        </div>
    </section>
    
    <section class="page-dialog">
        <div class="box">
            <div class="title">
                <h2 class="title-h">
                    <?php echo $content['modal_steps']['title'] ?>
                </h2>
            </div>
             
            <div class="carousel">
                <div class="owl-carousel owl-theme">
                <?php 
                if($content['modal_steps']['steps']){
                    foreach($content['modal_steps']['steps'] as $k=>$step) {
                ?>
                
                    <div class="item">
                        <div class="block">
                            <div class="number"><?php echo $k+1 ?></div>
                            <?php echo get_image( $step['image'],'icon-img') ?>
                            <label class="label"><?php echo $step['text'] ?></label>
                            <?php if($step['link_text']){ ?>
                                <a href="<?php echo $step['link_url'] ?>" <?php link_is_blank(@$step['link_blank']) ?> class="link"><?php echo $step['link_text'] ?> <i class="fas fa-arrow-right icon"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                    <?php 
                    }
                }
                ?>  
                </div> 
            </div>        
        </div>
        
    </section>
    
    <section class="page-faq">
        <div class="container clearfix">
            <h3 class="title-h">
                <?php echo $content['modal_faq']['title'] ?>
            </h3>

            <h4 class="subtitle-h"><?php echo $content['modal_faq']['subtitle'] ?></h4>
        
            <div class="faq accordeon">
            <?php 
                if($content['modal_faq']['faqs']){
                    foreach($content['modal_faq']['faqs'] as $k=>$faq) {
            ?>    
                <div class="item">
                    <div class="label">
                        <i class="fas fa-angle-up icon"></i>
                        <?php echo $faq['question'] ?>
                    </div>
                    <div class="text">
                        <?php echo $faq['answer'] ?>
                    </div>
                </div>
                    <?php 
                    }
                }
                ?>  
            </div>
            <div class="card-block clearfix">
                <div class="text">
                    <h4><?php echo $content['modal_save']['title'] ?></h4>
                    <a href="<?php echo $content['modal_save']['button_url'] ?>" <?php link_is_blank(@$content['modal_save']['button_blank']) ?> class="btn-pri-orange"><?php echo $content['modal_save']['button_text'] ?></a>
                </div>
                <div class="img" style="background-image: url('<?php echo $content['modal_save']['image'] ?>')">
                </div>
            </div>

        </div>
    </section>
</div>

    <?php endwhile; ?>
<?php else: ?>
    <?php get_404_template(); ?>
<?php endif; ?>
<?php get_footer(); 
