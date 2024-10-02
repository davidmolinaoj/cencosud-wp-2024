<?php
/**
 * Template Name: Cencosud 2023 - Promociones
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */

global $wp_query;

get_header(); 
$content=get_fields();
        
$promotionItem=get_query_var('promotion_item');

$promociones= get_posts(
    array(
        'post_type'=>'promotion',
        'numberposts' => -1
    )
);

$place = get_terms(array(
    'taxonomy' => 'place',
    #'parent' => 0
));
$store = get_terms(array(
    'taxonomy' => 'store',
    //'parent' => 0
));
$promotion_cat = get_terms(array(
    'taxonomy' => 'promotion_cat',
    //'parent' => 0
));

?>


<div class="promo-page" > 
    <div class="promo-banner">
        <div class="container">
            <?php echo $content['banner']['content'] ?>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="promo-filter">
                    <h2>Filtros <i class="fas fa-sliders-h"></i></h2>
                    <div class="promo-scroll">
                        <div class="promo-scroll-block">
                            <div class="row">
                                <div class="col-3 col-lg-12 order-lg-last">
                                    <div class="filter filter-other">
                                        <div class="label">
                                            Otros <i class="fas fa-angle-right"></i>
                                        </div>
                                        <div class="check-list">
                                            <div class="check" data-filter="month" >
                                                <div class="square"></div> <label>Meses sin intereses</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-9 col-lg-12">
                                    <div class="filter filter-first">
                                        <div class="label">
                                            Establecimiento <i class="fas fa-angle-right"></i>
                                        </div>
                                        <div class="check-list">
                                            <?php  if($store) {
                                                foreach($store as $i) {?>
                                            <div class="check" data-filter="store_<?php echo $i->slug ?>" >
                                                <div class="square"></div> <label><?php echo $i->name ?></label>
                                            </div>
                                            <?php }
                                                }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="filter">
                                        <div class="label">
                                            Categoría <i class="fas fa-angle-right"></i>
                                        </div>
                                        <div class="check-list">
                                            <?php  if($promotion_cat) {
                                                foreach($promotion_cat as $i) {?>
                                            <div class="check" data-filter="cat_<?php echo $i->slug ?>" >
                                                <div class="square"></div> <label><?php echo $i->name ?></label>
                                            </div>
                                            <?php }
                                                }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="filter">
                                        <div class="label">
                                            Ubicación <i class="fas fa-angle-right"></i>
                                        </div>
                                        <div class="check-list">
                                            <?php  if($place) {
                                                foreach($place as $i) {?>
                                            <div class="check" data-filter="place_<?php echo $i->slug ?>" >
                                                <div class="square"></div> <label><?php echo $i->name ?></label>
                                            </div>
                                            <?php }
                                                }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="filter">
                                        <div class="label">
                                            Ordenar por <i class="fas fa-angle-right"></i>
                                        </div>
                                        <div class="check-list">
                                            <div class="check radio" data-filter="sort_recent">
                                                <div class="square"></div> <label>Más reciente</label>
                                            </div>
                                            <div class="check radio" data-filter="sort_old">
                                                <div class="square"></div> <label>Más antiguo</label>
                                            </div>
                                            <div class="check radio" data-filter="sort_featured">
                                                <div class="square"></div> <label>Recomendados</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="sep"></div>

                                </div>

                            </div>
                        </div>
                    </div>        

                </div>
            </div>
            <div class="col-lg-9">
                <div class="promo-collection">
                    <?php 
                    if($promociones) {
                        foreach($promociones as $item) { 
                            $info=get_fields($item->ID);  
                            $image=get_the_post_thumbnail_url( $item->ID, 'full');

                            if( isset($info['expire']) && get_date_days($info['expire']) <= -1 ) {
                                continue;
                            }

                        ?>
                        <div class="promo-item">
                            <div class="block">
                                <a href="<?php echo get_permalink($item->ID) ?>" data-item="<?php echo $item->ID ?>" class="link"></a>
                                <div class="image-tag d-none d-lg-block">
                                    <?php echo get_image($info['image']) ?>
                                </div>  
                                <div class="image-tag d-lg-none">
                                    <?php echo get_image($image) ?>
                                </div>                                
                                <div class="desc">
                                    <label title="<?php echo $info['store'] ?>" ><?php echo $info['store'] ?></label>
                                    <h4>
                                        <?php echo $info['tag']?$info['tag'].'<br>':'' ?>
                                        <strong><?php echo $info['promo'] ?></strong> <?php echo $info['sufix'] ?>
                                    </h4>
                                    <div class="disc"><?php echo $info['detail'] ?></div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                    }?>
                    
                </div>
                <!-- <nav class="promo-pages">
                    <a href="#" class="current">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                </nav> -->
            </div>
        </div>
    </div>

</div>

<?php

if($promotionItem) {    
    $info=get_fields($promotionItem->ID);  
    $image=get_the_post_thumbnail_url( $promotionItem->ID, 'full');

    ?>    
    <div class="promo-dialog">
        <div class="promo-dialog-modal">
            <div class="promo-dialog-close"></div>
            <div class="promo-dialog-block">
                <div class="image d-none d-lg-block" <?php echo get_image_bg($info['image']) ?>></div>
                <div class="image d-lg-none" <?php echo get_image_bg($image) ?>></div>
                <div class="row">
                    <div class="col-6 col-md-8">
                        <h3 class="brand"><?php echo $info['store'] ?></h3>
                        <h2 class="title">
                            <?php echo $info['tag']?$info['tag'].'<br>':'' ?>
                            <strong><?php echo $info['promo'] ?></strong> <?php echo $info['sufix'] ?>
                        </h2>
                    </div>
                    <div class="col text-center">
                        <div class="expire">
                            Vence en 3 días
                        </div>
                        <div>
                        <small>Compartir promoción</small>
                        </div>
                        <div class="social">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink($promotionItem->ID) ?>" target="_blank">
                                <i class="fab fa-facebook"></i>
                            </a>                    
                            <a href="whatsapp://send?text=<?php echo get_the_permalink($promotionItem->ID) ?>" data-action="share/whatsapp/share"  target="_blank">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="mailto:email@destino.com?subject=<?php echo $promotionItem->post_title ?>&body=<?php echo get_the_permalink($promotionItem->ID) ?>"  target="_blank">
                                <i class="fa fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="date">
                    Del 13 de noviembre al 31 de diciembre de 2023
                </div>
                <div class="desc">
                    <?php echo $promotionItem->post_content ?>
                </div>
            </div>
        </div>
    </div>
    <?php

}

get_footer(); 
