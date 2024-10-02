<?php
/**
 * Template Part: Home
 *
 * @package annariel-cencosud2023
 * @subpackage templates
 */

$pageHome=get_page_by_path( 'home' );
$content=get_fields($pageHome->ID); 
 
$banners=get_posts(array(
    'post_type'=>'banner_home',
    'numberposts' => 5
));

$promociones= get_terms( 'store', array(
    'parent'       => 0,
    'hide_empty'    => false        
));
if($promociones) {
    foreach($promociones as $k => $p) {
        $promociones[$k]->posts=  get_posts(array(
            'post_type'=>'promotion',
            'numberposts' => 10,
            'tax_query' => array(
                array(
                    'taxonomy' => 'store',
                    'field' => 'term_id',
                    'terms' => $p->term_id,
                )
            )
        ));
		
		if($promociones[$k]->posts){
			foreach($promociones[$k]->posts as $pk=>$p) {
				$info=get_fields($p);  
				if( isset($info['expire']) && get_date_days($info['expire']) <= -1 ) {
                    unset($promociones[$k]->posts[$pk]);
                }
			}			
		}
    }
}
 
$banners=get_posts(array(
    'post_type'=>'banner_home',
    'numberposts' => 5
));
?> 
<div class="page-home">
    <?php if($banners) {?>
    <section class="home-banner">
        <div class="slider">
        <?php 
        foreach($banners as $k=>$banner){
            $fields=get_fields($banner->ID); //print_r($fields);
        ?>
            <div 
                class="slide <?php echo $k==0 ? 'active' : ''?>" 
                style="background-color:<?php echo $fields['background']?$fields['background']:'#fff' ?>;" 
            >
                <div class="desktop" style="<?php echo $fields['desktop']?'background-image:url('.$fields['desktop'].');':'' ?>" ></div>
                <div class="mobile" style="<?php echo $fields['mobile']?'background-image:url('.$fields['mobile'].');':'' ?>" ></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col">
                            <div class="block <?php echo $fields['title_style']?$fields['title_style']:'' ?>">
                                <?php echo $fields['title']  ?>
                                <?php if($fields['button_text']) { ?>
                                    <a 
                                        style="<?php echo $fields['button_color']?'background-color:'.$fields['button_color'].';':'' ?> <?php echo $fields['button_color_text']?'color:'.$fields['button_color_text'].';':'' ?>" 
                                        href="<?php echo $fields['button_url']?$fields['button_url']:'#' ?>" 
                                        class="button"
                                    >
                                        <?php echo $fields['button_text'] ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        <?php 
        }
        ?>
        </div>
        <div class="container">
            <div class="control">
            <?php 
            foreach($banners as $k=>$banner){
                $fields=get_fields($banner->ID); //print_r($fields);
            ?>
                <div class="item <?php echo $k==0 ? 'active' : ''?>">
                    <div class="icon-card" style="<?php echo $fields['icon_inactive']?'background-image:url('.$fields['icon_inactive']['url'].');':'' ?>" ></div>
                    <div class="icon-card-active" style="<?php echo $fields['icon_active']?'background-image:url('.$fields['icon_active']['url'].');':'' ?>"></div>
                </div>           
            <?php 
            }
            ?>
            </div>
        </div>
    </section>
    <?php } ?>
    <section class="home-info">
        <div class="container">
            <?php echo @$content['card']['title']  ?>

            <div class="block-info">
                <div class="row">
                    <div class="col-md-4">
                        <?php if($content['card']['icon_left']){ 
                            $iconObj=$content['card']['icon_left'];
                            ?>
                            <div class="item">
                                <div class="row align-items-center">
                                    <div class="col-5 col-md-12">
                                        <div class="image" <?php echo $iconObj['image']['url'] ? get_image_bg($iconObj['image']['url']) : '' ?> ></div>
                                    </div>
                                    <div class="col">
                                        <h3 class="title"><?php echo $iconObj['title'] ? $iconObj['title'] : '' ?></h3>
                                        <?php echo $iconObj['content'] ? $iconObj['content'] : '' ?>
                                        <?php if($iconObj['button_text']){ ?>
                                            <div>
                                                <a class="link" href="<?php echo $iconObj['button_link'] ? $iconObj['button_link'] : '#' ?>"><?php echo $iconObj['button_text'] ?> <i class="fas fa-caret-right"></i></a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-4">
                        <?php if($content['card']['icon_center']){ 
                            $iconObj=$content['card']['icon_center']; 
                            ?>
                            <div class="item">
                                <div class="row align-items-center">
                                    <div class="col-5 col-md-12">
                                        <div class="image" <?php echo $iconObj['image']['url'] ? get_image_bg($iconObj['image']['url']) : '' ?> ></div>
                                    </div>
                                    <div class="col">
                                        <h3 class="title"><?php echo $iconObj['title'] ? $iconObj['title'] : '' ?></h3>
                                        <?php echo $iconObj['content'] ? $iconObj['content'] : '' ?>
                                        <?php if($iconObj['button_text']){ ?>
                                            <div>
                                                <a class="link" href="<?php echo $iconObj['button_link'] ? $iconObj['button_link'] : '#' ?>"><?php echo $iconObj['button_text'] ?> <i class="fas fa-caret-right"></i></a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-4">
                        <?php if($content['card']['icon_right']){ 
                            $iconObj=$content['card']['icon_right'];
                            ?>
                            <div class="item">
                                <div class="row align-items-center">
                                    <div class="col-5 col-md-12">
                                        <div class="image" <?php echo $iconObj['image']['url'] ? get_image_bg($iconObj['image']['url']) : '' ?> ></div>
                                    </div>
                                    <div class="col">
                                        <h3 class="title"><?php echo $iconObj['title'] ? $iconObj['title'] : '' ?></h3>
                                        <?php echo $iconObj['content'] ? $iconObj['content'] : '' ?>
                                        <?php if($iconObj['button_text']){ ?>
                                            <div>
                                                <a class="link" href="<?php echo $iconObj['button_link'] ? $iconObj['button_link'] : '#' ?>"><?php echo $iconObj['button_text'] ?> <i class="fas fa-caret-right"></i></a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php if(isset($promociones)){?>
    <section class="home-promo">
        <nav class="promo-nav">
            <?php foreach($promociones as $k=>$promo) { ?>       
                <div data-item="tab-<?php echo $k ?>" class="tab <?php echo $k?'':'active'?>" >
                    <div class="icon-active" <?php echo get_image_bg(THEME_IMGS.'homePromo-'.($k==0?'wong':($k==1?'metro':'other')).'.png') ?> ></div>
                    <div class="icon-inactive" <?php echo get_image_bg(THEME_IMGS.'homePromo-'.($k==0?'wong':($k==1?'metro':'other')).'-inactive.png') ?> ></div>
                </div>   
            <?php }?> 
        </nav>
        <div class="container">
            <?php foreach($promociones as $k=>$promo) { ?>       
                <div data-item="tab-<?php echo $k ?>" class="home-promo-slide <?php echo $k?'':'active'?>">
                    <div class="owl-promo owl-carousel owl-theme">
                        <?php foreach($promo->posts as $item) { 
                            $info=get_fields($item->ID);  
                            $image=get_the_post_thumbnail_url( $item->ID, 'full');
                        ?> 
                        <div class="item">
                            <a href="<?php echo get_permalink($item->ID) ?>" class="link"></a>
                            <div class="image" <?php echo get_image_bg($image) ?>></div>
                            <div class="desc">
                                <div class="row align-items-lg-center h-100">
                                    <div class="col">
                                        <h4>
                                            <?php echo $info['tag']?$info['tag'].'<br>':'' ?>
                                            <strong><?php echo $info['promo'] ?></strong> <?php echo $info['sufix'] ?>
                                        </h4>
                                        <div class="detail"><?php echo $info['detail'] ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            <?php }?>
            
        </div>
        <div class="text-center">
            <a href="<?php echo $content['promo']['button_link'] ?>" class="button-blue"><?php echo $content['promo']['button_text'] ?></a>
        </div>
        
    </section>
<?php }?>
<?php for($call=1;$call<=3;$call++){ 
    $iconObj=$content['call2action-'.$call];
    ?>
    <section class="home-call2action" <?php echo $iconObj['background'] ? 'style="background-color: '.$iconObj['background'].'"' : '' ?> >
        <div class="container">
            <div class="row align-items-center block-info">
                <div class="col-12 col-lg-5 <?php echo $call%2==0?'order-lg-last':'' ?>">
                    <?php if(@$iconObj['video']) {?>
                        <div class="video">
                            <video width="400" height="400" loop muted playsinline autoplay >
                                <source src="<?php echo $iconObj['video'] ?>" type="video/mp4">
                            </video>
                        </div>
                    <?php } else if(@$iconObj['image']) {?>
                        <div class="image" <?php echo get_image_bg($iconObj['image']) ?> ></div>
                    <?php }?>                    
                </div>
                <div class="col">
                    <div class="info">
                        <h2 class="title"><?php echo strip_tags($iconObj['title'],'<strong>') ?></h2>
                        <h3><?php echo strip_tags($iconObj['subtitle'],'<strong>') ?></h3>
                        <?php echo $iconObj['content'] ?>
                        <a href="<?php echo $iconObj['button_url'] ?>" class="link"><?php echo $iconObj['button_text'] ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>                       
    
<?php if($content['home-message']){ 
    $iconObj=$content['home-message'];
?>
    <section class="home-call2action-orange">
        <div class="container">
            <?php echo $iconObj['title'] ?>
        </div>        
    </section>
<?php } ?> 
    
</div>
<?php 
