<?php 
/**
 * Template Name: Cencosud 2023 - Efectivo
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */
get_header(); 

$content=get_fields();

$faqs=get_scope('faqs');
$prods=get_page_products( $content['products'] );

$video      = $content['banner']['video_desktop']['url'];
$video_ca   = $content['call2action_a']['media']['url'];
$video_cb   = $content['call2action_b']['media']['url'];
$video_cc   = $content['call2action_c']['media']['url'];

?>
<div class="cash-page">  
    <?php get_banner_block('cash-banner',$content['banner']) ?>  
    
    <section class="cash-call2action" <?php echo $content['call2action_a']['background'] ? 'style="background-color: '.$content['call2action_a']['background'].';"' :'' ?> >
        <div class="container">
            <div class="row align-items-center block-info">
                <div class="col-12 col-lg-6 order-lg-last">
                    <?php get_media_block( $video_ca ) ?>
                </div>
                <div class="col">
                    <div class="info">
                        <?php echo $content['call2action_a']['info'] ?>
                        <a 
                            target="<?php echo $content['call2action_a']['link']['target'] ?>" 
                            href="<?php echo $content['call2action_a']['link']['url'] ?>" 
                            class="link"
                            ><?php echo $content['call2action_a']['link']['title'] ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>   
    <section class="cash-call2action" <?php echo $content['call2action_b']['background'] ? 'style="background-color: '.$content['call2action_b']['background'].';"' :'' ?> >
        <div class="container">
            <div class="row align-items-center block-info">
                <div class="col-12 col-lg-6 ">
                    <?php get_media_block( $video_cb ) ?>
                </div>
                <div class="col">
                    <div class="info">
                        <?php echo $content['call2action_b']['info'] ?>
                        <a 
                            target="<?php echo $content['call2action_b']['link']['target'] ?>" 
                            href="<?php echo $content['call2action_b']['link']['url'] ?>" 
                            class="link"
                            ><?php echo $content['call2action_b']['link']['title'] ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>    
    <section class="cash-call2action" <?php echo $content['call2action_c']['background'] ? 'style="background-color: '.$content['call2action_c']['background'].';"' :'' ?> >
        <div class="container">
            <div class="row align-items-center block-info">
                <div class="col-12 col-lg-6 order-lg-last">
                    <?php get_media_block( $video_cc ) ?>
                </div>
                <div class="col">
                    <div class="col">
                        <div class="info">
                            <?php echo $content['call2action_c']['info'] ?>
                            <a 
                                target="<?php echo $content['call2action_c']['link']['target'] ?>" 
                                href="<?php echo $content['call2action_c']['link']['url'] ?>" 
                                class="link"
                                ><?php echo $content['call2action_c']['link']['title'] ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <section class="cash-faq">
        <div class="container">
            <h2>Preguntas Frecuentes</h2>
            <?php if($faqs['posts']) { 
                foreach($faqs['posts'] as $i=>$f) {?>
            <div class="item">
                <div class="tab tab-nav tab-accordeon" data-tab="tab-<?php echo $f->ID ?>" data-group="tab-faq">
                    <i class="fas fa-angle-right"></i>
                    <label>
                        <?php echo get_the_title($f) ?>
                    </label>
                </div>                
                <div class="block tab-block" data-tab="tab-<?php echo $f->ID ?>" data-group="tab-faq">
                    <?php echo get_the_content(null, null, $f) ?>
                </div>
            </div>
            
            <?php }
            } ?>
            <div class="text-center pt-3">
                <a href="<?php echo $faqs['term'] ?>" class="button-orange">Ver más</a>
            </div>
        </div>
    </section>
    
    <section class="page-other">
        <div class="container">
            <?php echo $content['products']['title'] ?>

            <?php if($content['products']['items']){ ?>
            <div class="card-other-slide">
                <div class="owl-other owl-carousel owl-theme">
                    <?php foreach($content['products']['items'] as $item){ 
                        $image=get_the_post_thumbnail_url( $item->ID, 'full');    
                        $fields=get_fields($item->ID);
                    ?>  
                        <div class="item">
                            <div class="block">
                                <div class="image" <?php echo !$fields['media'] && $image ? get_image_bg($image) : '' ?> >
                                    <?php get_video( $fields['media'] ,  null, 'video-product'); ?>
                                </div>
                                <div class="desc">
                                    <?php echo $item->post_content ?>
                                    <a 
                                        target="<?php echo $fields['link']['target'] ?>" 
                                        href="<?php echo $fields['link']['link']['url'] ?>" 
                                        class="button"
                                    ><?php echo $fields['link']['title'] ?></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>                    
                </div>
            </div>
            <?php } ?>

        </div>
    </section>                        

</div>
<?php get_footer(); 
