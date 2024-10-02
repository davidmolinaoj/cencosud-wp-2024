<?php 
/**
 * Template Name: Cencosud 2023 - Seguros
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */
get_header(); 

$content=get_fields();

$faqs=get_scope('faqs');
$prods=get_page_products( $content['products'] );

$video_ca   = $content['call2action_a']['media']['url'];
$video_cb   = $content['call2action_b']['media']['url'];
$video_cc   = $content['call2action_c']['media']['url'];

$insurance_cats=get_terms( 'insurance-cat', array(
    'parent'       => 0,
    'hide_empty'    => false        
));

?>
<div class="insurance-page">  
    <?php get_banner_block('insurance-banner',$content['banner']) ?>     
    <section class="insurance-info">
        <div class="container">
            <nav class="tabs">
                <div class="row align-items-end">
                    <?php 
                    if($insurance_cats){ 
                        foreach($insurance_cats as $k=>$ic) {    
                    ?>
                    <div class="col">
                        <div class="tab tab-nav <?php echo $k ? '' : 'active' ?>" data-tab="tab-<?php echo $ic->slug ?>" data-group="tab-info" >
                            <?php echo $ic->name ?>
                        </div>
                    </div>               
                    <?php }
                    } ?>
                </div>
            </nav>
            <?php 
            if($insurance_cats){ 
                foreach($insurance_cats as $k=>$ic) {  
                    
                    $infos = get_posts(
                        [
                            'numberposts'=>-1,
                            'post_type'=> 'insurance',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'insurance-cat',
                                    'field' => 'id',
                                    'terms' => $ic->term_id
                                )
                            )
                        ]
                    );
            ?>
            <div class="tab-block tab-item <?php echo $k ? '' : 'active' ?>" data-tab="tab-<?php echo $ic->slug ?>"  data-group="tab-info" >
                <div class="block">
                    <div class="row">
                        <?php if($infos){
                            foreach($infos as $ik => $info) {
                                $info_f=get_fields($info);

                                $imgInactive = wp_get_attachment_image_src( get_post_thumbnail_id( $info->ID ), 'full');
                                $imgInactive = $imgInactive[0];
                                $imgActive=$info_f['imagen_seleccionada']['url']?$info_f['imagen_seleccionada']['url']:$imgInactive;
                        ?>      
                        
                        <div class="col-lg-3">
                            <div class="item <?php  echo $ik ? '' : 'active' ?> tab-nav tab-block tab-accordeon" data-tab="tab-<?php echo $info->post_name ?>" data-group="tab-location">
                                <div class="trigger">
                                    <div class="image">   
                                        <div class="icon on" <?php echo get_image_bg( $imgActive ) ?> ></div>
                                        <div class="icon off" <?php echo get_image_bg( $imgInactive ) ?> ></div>                                 
                                    </div>
                                    <h3 class="title"><?php echo $info->post_title  ?></h3>
                                </div>
                                <div class="content">
                                    <div class="dialog">
                                        <?php echo get_the_content(null, false, $info)  ?>
                                    </div>
                                    <h4>
                                        <?php echo $info_f['document_title']  ?>
                                    </h4>
                                    <div class="documents">
                                        <?php echo $info_f['document_content']  ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                            }
                        }?>
                    </div>
                </div>
                <div class="panel"></div>
            </div>               
            <?php }
            } ?>
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
            <div class="page-other-slide">
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