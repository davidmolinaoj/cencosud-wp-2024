<?php 
/**
 * Template Name: Cencosud 2023 - Ahorros
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
<div class="safe-page"> 
    <?php get_banner_block('safe-banner',$content['banner']) ?>     
    <section class="safe-call2action" <?php echo $content['call2action_a']['background'] ? 'style="background-color: '.$content['call2action_a']['background'].';"' :'' ?> >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 order-lg-last">
                    <?php get_media_block( $content['call2action_a']['media']['url'] ); ?>
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
    <section class="safe-call2action">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 ">
                    <?php get_media_block( $content['call2action_b']['media']['url'] ); ?>
                </div>
                <div class="col">
                    <div class="info">
                        <h2 class="title">
                            <strong>CTS</strong>
                        </h2>
                        <h3>¡Tu esfuerzo debe ser recompensado!</h3>
                        <p>
                            Protegemos y hacemos crecer tu dinero con nuestra cuenta CTS.
                        </p>
                        <ul>
                            <li>Fácil de abrir</li>
                            <li>Sin gastos ni comisiones</li>
                            <li>Con el respaldo de Caja Cencosud del Grupo Scotiabank y del Fondo de Seguro de Depósito.</li>
                        </ul>
                        <a href="#" class="link">VER MÁS</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-faq">
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
