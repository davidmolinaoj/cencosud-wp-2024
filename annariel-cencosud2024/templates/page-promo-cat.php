<?php
/**
 * Template Name: Page - Promociones - Categorias
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */

 
global $wp_query;
$promotion_cat = isset($wp_query->query_vars['promotion_cat']) ? $wp_query->query_vars['promotion_cat'] : null;
$promotion_place = isset($wp_query->query_vars['place']) ? $wp_query->query_vars['place'] : null;


$promoAll=get_posts(array(
    'post_type'=>'promotion',
    'numberposts' => -1
));

$promoPage=get_page_by_path('promociones');

///banner de categorías
$catObj=get_term_by( 'slug', $promotion_cat, 'promotion_cat' ); 
$catBanner=get_fields($catObj);

$banner=get_page_banner( $catObj );

if( !isset($banner['content']) || !$banner['content'] ) {
    $banner=get_page_banner( $promoPage->ID );
}
//print_r($banner); exit($promotion_cat);

$promoBanner=$banner['content']['items'];
$promoContent=$banner['content'];


//video banner
$video=$videoMb=null;
if( isset($banner['content']['video_link']) && $banner['content']['video_link'] ) {
    $video='<video autoplay loop muted playsinline  class="banner-video" preload="auto" src="'.$banner['content']['video_link'].'" type="video/webm"></video>';

    $videoMb=$video=str_replace(array('<','>'), array('[',']'), $video );
}
else if( isset($banner['content']['video_code']) && $banner['content']['video_code'] ) {
    $videoMb=$video=str_replace(array('<','>'), array('[',']'), $banner['content']['video_code'] );
}


if( isset($banner['content']['video_link_mobile']) && $banner['content']['video_link_mobile'] ) {
    $videoMb='<video autoplay loop muted playsinline  class="banner-video" preload="auto" src="'.$banner['content']['video_link_mobile'].'" type="video/webm"></video>';

    $videoMb=str_replace(array('<','>'), array('[',']'), $videoMb );
}
else if( isset($banner['content']['video_code_mobile']) && $banner['content']['video_code_mobile'] ) {
    $videoMb=str_replace(array('<','>'), array('[',']'), $banner['content']['video_code_mobile'] );
}


$placesLs=get_terms( 'place', array(
    'parent'       => 0,
    'hide_empty'    => false        
));
$places=$placesItems=array();

if($placesLs) {
    foreach($placesLs as $k => $p) { 
        $places[ $p->slug ]=$p;

        $items=  get_posts(array(
            'post_type'=>'promotion',
            'numberposts' => -1,
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'place',
                    'field' => 'term_id',
                    'terms' => $p->term_id,
                ),                
                array(
                    'taxonomy' => 'promotion_cat',
                    'field' => 'term_id',
                    'terms' => @$catObj->term_id,
                )
            )
        ));
        $places[ $p->slug ]->items=$items;


        foreach($items as $i) {
            $placesItems[$i->ID]=$i;
        }

        
        if(!$places[ $p->slug ]->items) {
            unset($places[ $p->slug ]);
        }
        else {
            foreach($places[ $p->slug ]->items as $i=>$item) {
                $info=get_fields($item->ID); 
                if( isset($info['expire']) && get_date_days($info['expire']) <= -1 ) {
                    unset($places[ $p->slug ]->items[$i]);
                }
            }
            if(!$places[ $p->slug ]->items) {
                unset($places[ $p->slug ]);
            }
        }
    }
}
ksort($places);

$fCat=null; 
if( array_key_exists($promotion_place, $places)  ) {
    $fCat=$places[$promotion_place];
}

?>
<div class="promo-page" > 
    
<?php if( isset($promoContent['banners']) && @$promoContent['banners'] ){?>    
    <section class="promo-banner" <?php echo $banner['banner-desktop'] ?> >
        <div class="owl-carousel owl-theme">
            <?php foreach($promoContent['banners'] as $fields){
                   
                $video=null;
                if( isset($fields['video_link_desktop']) && $fields['video_link_desktop'] ) {
                    $video='<video autoplay loop muted playsinline class="banner-video" preload="auto" src="'.$fields['video_link_desktop'].'" type="video/webm"></video>';
                    $video=str_replace(array('<','>'), array('[',']'), $video );
                }
                else if( isset($fields['video_code_desktop']) && $fields['video_code_desktop'] ) {
                    $video=str_replace(array('<','>'), array('[',']'), $fields['video_code_desktop'] );
                }

                $videoMb=null;
                if( isset($fields['video_link_mobile']) && $fields['video_link_mobile'] ) {
                    $videoMb='<video autoplay loop muted playsinline class="banner-video" preload="auto" src="'.$fields['video_link_mobile'].'" type="video/webm"></video>';

                    $videoMb=str_replace(array('<','>'), array('[',']'), $videoMb );
                }
                else if( isset($fields['video_code_mobile']) && $fields['video_code_mobile'] ) {
                    $videoMb=str_replace(array('<','>'), array('[',']'), $fields['video_code_mobile'] );
                }
                
            ?>
            <div class="item <?php echo $video ? 'video' : '' ?> " style="background-image: url('<?php echo $fields['banner_desktop'] ?>')">
                
                <?php 
                if( isset($fields['link']) && $fields['link'] ) {
                    echo '<a href="'.$fields['link'].'" class="link" ></a>';
                } 

                if( isset($fields['banner_mobile']) && $fields['banner_mobile'] ) {
                    echo '<div class="mobile" style="background-image: url('.$fields['banner_mobile'].')"></div>';
                }

                if( $video ) {
                    echo '<div class="video-block">'.$video.'</div>';
                    if($videoMb) {
                        echo '<div class="video-block-mobile">'.$videoMb.'</div>';
                    }
                }
                ?><div class="container">
                    <div class="block">
                        <?php ##print_r($fields); ?>
                    </div>
                </div><?php
                ?>
            </div>
            <?php }?>
        </div>    
        <div class="border-moon"></div>
    </section>
<?php }else{?>   
    <section class="page-banner" <?php echo $banner['banner-desktop'] ?> >
        <div class="mobile" <?php echo $banner['banner-mobile'] ?> ></div>
        <?php 
            if( $video ) {
                echo '<div class="video-block">'.$video.'</div>';
                if($videoMb) {
                    echo '<div class="video-block-mobile">'.$videoMb.'</div>';
                }
            }
        ?>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 promo-title">
                    <?php 
                    if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb( '<nav class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">','</nav>' );
                    }
                    ?>
                    <div class="block">
                        <?php echo @$banner['banner-title'] ?>
                        <?php echo @$banner['banner-subtitle'] ?>
                        <?php echo @$banner['banner-button'] ?>
                        <?php echo @$banner['banner-link'] ?>
                    </div> 
                </div>
                <div class="col-12 col-md-6 promo-slide">
                    <div class="promo-slide-block">
                        <?php 
                        if($promoBanner) {
                            echo '<div class="owl-carousel owl-theme">';
                            foreach( $promoBanner as $p ){

                                if( isset($p['expire']) && get_date_days($p['expire']) <= -1 ) {
                                    continue;
                                }

                                $item=$p['promo'];
                        ?>
                        <div class="item" >
                            <article class="block">
                                <a href="#popup-<?php echo $item->ID ?>" data-promo="<?php echo $item->ID ?>" class="link"></a>
                                <figure class="image" <?php echo get_image_bg($p['image']) ?> ></figure>
                                <div class="info">
                                    <header>                                        
                                        <h3><?php echo $p['title'] ?></h3>
                                    </header>
                                    <label><?php echo $p['etiqueta'] ?></label>
                                    <div class="discount"><?php echo $p['discount'] ?></div>
                                    <footer>
                                        <small><?php echo $p['comment'] ?></small>
                                        <p><?php echo $p['foot'] ?></p>
                                    </footer>

                                </div>
                            </article>
                        </div>
                        <?php }
                            echo '</div>';
                        }?>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="border-moon"></div>
    </section>
<?php }?>

    <div class="promo-circle">           
        
        <?php if($places){?>
        <section class="promo-category-list pt-5">
            <div class="container">

                <h3 class="title-h">Lugares</h3>

                <div class="selector  mb-5" itemid="<?php echo $fCat?'place-'.$fCat->term_id:'place-all' ?>">
                    <label><span><?php echo $fCat?$fCat->name:'Todos' ?></span> <i class="float-right fas fa-angle-down    "></i></label>
                    <ul class="menu">
                        <li data-item="place-all" class="option">
                            Todos
                        </li>
                        <?php foreach($places as $c) { 
                            if(!$c->items) {
                                continue;
                            }    
                        ?>  
                            <li data-item="place-<?php echo $c->term_id  ?>" class="option">
                                <?php echo $c->name  ?>
                            </li>
                        <?php } ?>    
                    </ul>
                </div>

                <div class="page-block">                    
                <?php 
                $nro=0;
                foreach($placesItems as $itemID => $item) {

                        $info=get_fields($item->ID); 
                        if( isset($info['expire']) && get_date_days($info['expire']) <= -1 ) {
                            continue;
                        } 

                        $class=array();
                        $iPlaces=get_the_terms($item->ID,'place');  
                        if($iPlaces) {
                            foreach($iPlaces as $i) {
                                $class[]= 'place-'.$i->term_id;
                            }
                        }
                        $iCat=get_the_terms($item->ID,'promotion_cat');  
                        if($iCat) {
                            foreach($iCat as $i) {
                                $class[]= 'cat-'.$i->term_id;
                            }
                        } 

                        $fields=get_fields($item->ID);
                ?>       
                    <div class="item enable place-all <?php echo implode(' ', $class)?> <?php echo $nro<4?'open':'' ?> " data-view="<?php echo intval(@$fields['qty_view'])?>" data-expire="<?php echo @$fields['expire']?>" data-featured="<?php echo $nro ?>"  data-name="<?php echo $info['store'] ?>" >
                        <div class="block">
                            <a href="#popup-<?php echo $item->ID ?>" data-promo="<?php echo $item->ID ?>" class="link"></a>
                            <div class="img"  ><?php echo get_image( $info['image'] ) ?></div>
                            <div class="text">
                                <div class="store"><?php echo $info['store'] ?></div>
                                <h5 class="desc">
                                    <?php echo $info['tag'] ?>
                                    <strong><?php echo $info['promo'] ?></strong> <?php echo $info['sufix'] ?>
                                </h5>
                                <small>
                                <?php echo $info['detail'] ?>
                                </small>
                            </div>
                        </div>
                    </div>
                <?php 
                    $nro++;
                }?>  
                </div>
                
                <nav class="catalogcat-nav pb-5" itempage="1">
                    <button class="prev"><i class="fas fa-angle-left    "></i></button>
                    <div class="nav">
                        <span data-item="1" class="current">1</span>
                        <span data-item="2">2</span>
                        <span data-item="3">3</span>
                        <small>...</small>
                        <span data-item="10">10</span>
                    </div>
                    <button class="next"><i class="fas fa-angle-right    "></i></button>
                </nav>  

                <div class="control text-center pt-3 pb-5">    
                    <a href="<?php echo site_url('promociones') ?>" class="btn-pri-orange">Ver más promociones</a>
                </div>  
            </div>       
            
        </section>
        <?php }?>    
    </div>          
   
    
    <div class="promo-popup">
        <div class="layer">
            <div class="panel">
                <div class="close-popup">X</div>
                <?php 
                foreach($promoAll as $item) { 
                    $info=get_fields($item->ID);
                    $image=get_the_post_thumbnail( $item->ID, 'full');
                ?> 
                    <div id="popup-<?php echo $item->ID ?>" data-item="<?php echo $item->ID ?>" class="item-layer" >
                        <div class="row">
                            <div class="col-12 col-md-4 image ">
                                <?php echo $image ?>
                            </div>
                            <div class="col-12 col-md-8">
                                <h3><?php echo $info['store'] ?></h3>
                                <h2><?php echo $item->post_title ?></h2>
                                <div class="promo">
                                    <?php echo $info['tag'] ?>
                                    <strong><?php echo $info['promo'] ?></strong> 
                                    <?php echo $info['sufix'] ?>                                        
                                </div>
                                <div class="detail"><?php echo $info['detail'] ?></div>
                                <div class="desc">
                                    <?php echo $item->post_content ?>
                                </div>

                                <?php if( isset($info['expire']) ) {?>
                                <div class="expire">
                                    <?php echo 'Vence en '.get_date_days($info['expire']).' días' ?>
                                </div>
                                <?php }?>

                                <div class="social">
                                    <strong>Compartir promoción</strong> 
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink($item->ID) ?>" target="_blank">
                                        <i class="fab fa-facebook"></i>
                                    </a>                    
                                    <a href="whatsapp://send?text=<?php echo get_the_permalink($item->ID) ?>" data-action="share/whatsapp/share"  target="_blank">
                                        <?php echo get_image(THEME_IMGS.'icons/whatsapp.png','icon') ?>
                                    </a>
                                    <a href="mailto:email@destino.com?subject=<?php echo $item->post_title ?>&body=<?php echo get_the_permalink($item->ID) ?>"  target="_blank">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<?php 
