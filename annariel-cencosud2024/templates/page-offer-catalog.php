<?php
/**
 * Template Name: Page - Catálogo de Ofertas
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */
get_header(); 


if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();

        $page_info=get_page_banner( get_the_ID() ); 
        
        $stores= get_terms( 'store', array(
            'parent'       => 0,
            'hide_empty'    => false        
        ));
        
        $storesID=array();
        if($stores) {
            foreach($stores as $k => $p) {
                $stores[$k]->fields= get_fields($p);
                $stores[$k]->items=  get_posts(array(
                    'post_type'=>'catalog',
                    'numberposts' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'store',
                            'field' => 'term_id',
                            'terms' => $p->term_id,
                        )
                    )
                ));
            }
        }  

        $page_info['issuu']=get_posts(array(
            'post_type'=>'catalog',
            'numberposts' => -1
        ));

                
        $products=  get_posts(array(
            'post_type'=>'product',
            'numberposts' => -1
        ));

        
        //video banner
        $video=$videoMb=null;
        if( isset($page_info['content']['video_link']) && $page_info['content']['video_link'] ) {
            $video='<video autoplay loop muted playsinline  class="banner-video" preload="auto" src="'.$page_info['content']['video_link'].'" type="video/webm"></video>';

            $videoMb=$video=str_replace(array('<','>'), array('[',']'), $video );
        }
        else if( isset($page_info['content']['video_code']) && $page_info['content']['video_code'] ) {
            $videoMb=$video=str_replace(array('<','>'), array('[',']'), $page_info['content']['video_code'] );
        }


        if( isset($page_info['content']['video_link_mobile']) && $page_info['content']['video_link_mobile'] ) {
            $videoMb='<video autoplay loop muted playsinline  class="banner-video" preload="auto" src="'.$page_info['content']['video_link_mobile'].'" type="video/webm"></video>';

            $videoMb=str_replace(array('<','>'), array('[',']'), $videoMb );
        }
        else if( isset($page_info['content']['video_code_mobile']) && $page_info['content']['video_code_mobile'] ) {
            $videoMb=str_replace(array('<','>'), array('[',']'), $page_info['content']['video_code_mobile'] );
        }
        
?>
<div class="catalog-page"> 
    <section class="page-banner" <?php echo $page_info['banner-desktop'] ?> >
        <div class="mobile" <?php echo $page_info['banner-mobile'] ?> ></div>        
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
                <div class="col-12 col-md-6 catalog-title">
                    <?php 
                    if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb( '<nav class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">','</nav>' );
                    }
                    ?>
                    <div class="block">
                        <?php echo $page_info['banner-title'] ?>
                        <?php echo $page_info['banner-subtitle'] ?>
                        <?php echo $page_info['banner-button'] ?>
                        <?php echo $page_info['banner-link'] ?>
                    </div> 
                </div>
                <div class="col-12 col-md-6 catalog-banner">
                    <!-- <div class="block"></div> -->
                </div>
            </div>
            
        </div>
        <div class="border-moon"></div>
    </section>

    <section class="catalog-store">

        <div class="container">
            <h2 class="title-h">
                <?php echo $page_info['content']['title'] ?>
            </h2>

            <div class="tab-block">
                <div class="tab-nav-block">
                    <nav class="tab-nav row">
                        <?php foreach($stores as $k=>$item) {    
                        ?>       
                            <a href="#<?php echo $item->slug ?>" class="link <?php echo $k?'':'active'?> ">
                            <span><?php echo $item->name ?></span>
                        </a>       
                        <?php }?>                    
                    </nav>
                </div>

                <div class="tab-panel">
                    <?php foreach($stores as $k=>$store) { 
                        
                    ?>       
                        <div class="panel <?php echo $k?'':'active'?>" id="<?php echo $store->slug ?>">
                            <div class="mobile-block">
                            <?php 
                            $counter=0;
                            foreach($store->items as $k => $item) { 
                                
                                $info=get_fields($item->ID);  
                                if( isset($info['expire']) && $info['expire'] && get_date_days($info['expire']) <= 0 ) {
                                    continue;
                                } 
                            ?>       
                            <div class="item">
                                <div class="block">
                                    <a href="#popup-<?php echo $item->ID ?>" class="link"></a>
                                    <div class="img" <?php echo get_image_bg($info['image']) ?> >
                                        <?php echo isset($storeLogo)?'<div class="logo" '.get_image_bg($storeLogo).' ></div>':''?>
                                    </div>
                                    <div class="text">
                                        <h4 class="title">
                                            <?php echo $item->post_title ?>
                                        </h4>
                                        <div class="detail">
                                            <?php echo $info['detail'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                    $counter++;
                                    if($counter==2) break;
                                }
                            ?>
                            </div>
                            <div class="desktop-block owl-carousel owl-theme" itemid="<?php echo $store->slug ?>">
                                <?php
                                foreach($store->items as $item) { 
                            
                                    $info=get_fields($item->ID);  
                                    if( isset($info['expire']) && get_date_days($info['expire']) <= 0 ) {
                                        continue;
                                    }   
                                ?>       
                                <div class="item">
                                    <div class="block">
                                        <a href="#popup-<?php echo $item->ID ?>" class="link"></a>
                                        <div class="img" <?php echo get_image_bg($info['image']) ?> >
                                            <?php echo isset($storeLogo)?'<div class="logo" '.get_image_bg($storeLogo).' ></div>':''?>
                                        </div>
                                        <div class="text">
                                            <h4 class="title">
                                                <?php echo $item->post_title ?>
                                            </h4>
                                            <div class="detail">
                                                <?php echo $info['detail'] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    <?php }?>
                </div>

            </div>
            
        </div>            

    </section>

    
    <section class="home-service catalog-product">
        <div class="container">
            <h2 class="title-h">
                ¿Qué necesitas <span>hoy?</span>
            </h2>
            <div class="panel">
                <div class="owl-carousel owl-theme">
                <?php foreach($products as $item) { 
                    $info=get_fields($item->ID); 
                ?>  
                    <div class="item">
                        <div class="block">
                            <?php if(isset($info['link'])){ ?>
                                <a href="<?php echo $info['link']; ?>" <?php link_is_blank(@$info['blank']) ?> class="link"></a>
                            <?php } ?>
                            <div class="img">
                                <img src="<?php echo $info['image']; ?>" alt="<?php echo $info['title']; ?>">
                            </div>
                            <div class="text">
                                <h4 class="title"><?php echo $info['title']; ?></h4>
                                <small>
                                    <?php echo $info['subtitle']; ?>
                                </small>
                                <h5 class="info">
                                    <?php echo $info['body']; ?>
                                </h5>
                                <small>
                                    <?php echo nl2br($info['detail']); ?>
                                </small>
                            </div>
                        </div>
                    </div>
                <?php }?>
                </div> 
            </div>
                
        </div> 
    </section>
    

    <div class="catalog-popup">
        <div class="layer">
            <div class="panel">
                <div class="close-popup">X</div>
                <?php 
                foreach($page_info['issuu'] as $item) { 
                    $info=get_fields($item->ID);
                ?> 
                    <div id="popup-<?php echo $item->ID ?>" class="item-layer" >
                        <?php echo str_replace(array('<','>'),array('[',']'),$info['issuu']) ?>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php else: ?>
<?php get_404_template(); ?>
<?php endif; ?>
<?php get_footer(); 
