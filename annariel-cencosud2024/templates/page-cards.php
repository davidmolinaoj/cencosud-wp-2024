<?php 
/**
 * Template Name: Cencosud 2023 - Tarjetas
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */

get_header(); 

$content=get_fields();

$faqs=get_scope('faqs');

$prods=get_page_products( $content['products'] );

$promociones = get_posts(array(
    'post_type'=>'promotion',
    'numberposts' => 10
));
 
?>
<div class="card-page">  
    <?php get_banner_block('card-banner',$content['banner']) ?>  
    <section class="card-promo">
        <div class="container">
            <h2><?php echo @$content['promo']['title'] ?></h2>
            <?php echo @$content['promo']['info'] ?>

            <div class="card-promo-slide">
                <div class="owl-promo owl-carousel owl-theme">
                    <?php foreach($promociones as $k=>$item) { 
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
                                    <?php echo $info['detail'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                            //echo $k>0 && $k%2==1 && ($k+1)!=count($promociones) ?'</div><div class="block">':'';
                        }
                    ?>
                </div>
            </div>
            <div class="button-block">
                <a href="<?php  echo site_url('promociones')?>" class="button-blue">Ver más</a>
            </div>
        </div>        
    </section>

    <section class="card-points">
        <div class="container">
            <?php echo @$content['points']['info'] ?>

            <div class="block-info">
                <div class="row">
                    <?php if(@$content['points']['item_1']['info']){ ?>
                        <div class="col-md-4">
                            <div class="item">
                                <div class="row align-items-md-center">
                                    <div class="col-12">
                                        <div class="image" >
                                            <video width="200" height="200" loop muted playsinline autoplay >
                                                <source src="<?php echo @$content['points']['item_1']['media']['url']?>" type="video/mp4">
                                            </video>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <?php echo $content['points']['item_1']['info'] ?>
                                        <a 
                                            target="<?php echo $content['points']['item_1']['link']['target'] ?>" 
                                            href="<?php echo $content['points']['item_1']['link']['url'] ?>" 
                                            class="button-blue"
                                            ><?php echo $content['points']['item_1']['link']['title'] ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>        
                    <?php if(@$content['points']['item_2']['info']){ ?>
                        <div class="col-md-4">
                            <div class="item">
                                <div class="row align-items-md-center">
                                    <div class="col-12">
                                        <div class="image" >
                                            <video width="200" height="200" loop muted playsinline autoplay >
                                                <source src="<?php echo @$content['points']['item_2']['media']['url']?>" type="video/mp4">
                                            </video>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <?php echo $content['points']['item_2']['info'] ?>
                                        <a 
                                            target="<?php echo $content['points']['item_2']['link']['target'] ?>" 
                                            href="<?php echo $content['points']['item_2']['link']['url'] ?>" 
                                            class="button-blue"
                                            ><?php echo $content['points']['item_2']['link']['title'] ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>        
                    <?php if(@$content['points']['item_3']['info']){ ?>
                        <div class="col-md-4">
                            <div class="item">
                                <div class="row align-items-md-center">
                                    <div class="col-12">
                                        <div class="image" >
                                            <video width="200" height="200" loop muted playsinline autoplay >
                                                <source src="<?php echo @$content['points']['item_3']['media']['url']?>" type="video/mp4">
                                            </video>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <?php echo $content['points']['item_3']['info'] ?>
                                        <a 
                                            target="<?php echo $content['points']['item_3']['link']['target'] ?>" 
                                            href="<?php echo $content['points']['item_3']['link']['url'] ?>" 
                                            class="button-blue"
                                            ><?php echo $content['points']['item_3']['link']['title'] ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>  
                </div>
            </div>        
        </div>
    </section>
    <?php if(@$content['call2action']['info']){ 
        
        $image_bg= $content['call2action']['media']['url'] && strstr( $content['call2action']['media']['url'], '.gif' ) ? $content['call2action']['media']['url'] : THEME_IMGS.'card-prize.png'; 
        ?>
    <section class="card-call2action" <?php echo $content['call2action']['background']?'style="background-color: '.$content['call2action']['background'].';"':'' ?>   >
        <div class="container">
            <div class="row align-items-center block-info">
                <div class="col-12 col-lg-5">
                    <div class="image" <?php echo get_image_bg( $image_bg ) ?> >
                        <?php if(!strstr( $image_bg, '.gif')) {?>
                            <video width="400" height="400" loop muted playsinline autoplay >
                                <source src="<?php echo $content['call2action']['media']['url'] ?>" type="video/mp4">
                            </video>  
                        <?php }?>  
                    </div>
                </div>
                <div class="col-1"></div>
                <div class="col">
                    <div class="info">
                        <?php echo $content['call2action']['info'] ?>
                        <a 
                            target="<?php echo $content['call2action']['link']['target'] ?>" 
                            href="<?php echo $content['call2action']['link']['url'] ?>" 
                            class="link"
                            ><?php echo $content['call2action']['link']['title'] ?></a>
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </section>
    <?php } ?>
    <section class="card-info">
        <div class="container block-info">
            <?php the_content() ?>

            <div class="text-center pt-5">
                <a 
                    target="<?php echo $content['card']['link']['target'] ?>" 
                    href="<?php echo $content['card']['link']['url'] ?>" 
                    class="button-blue"
                    ><?php echo $content['card']['link']['title'] ?></a>
            </div>
        </div>
    </section>
    <section class="card-simulator">
        <div class="container">
            <h2><?php echo $content['simulator']['title'] ?></h2>

            <form id="simulatorForm" class="form">

                <div class="row">
                    <div class="col-6">
                        <div class="row mb-2">
                            <div class="col-lg-6 mb-2 mb-lg-0">
                                <?php echo get_image(THEME_IMGS.'card-simulator-card.png','icon') ?>
                                <label>Tipo de tarjeta:</label>
                            </div>  
                            <div class="col-lg-6">
                                <div class="form-select">
                                    <select name="input-card" id="input-card" required class="input-card form-control">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>    
                        </div>  
                        <div class="row mb-2">
                            <div class="col-lg-6 mb-2 mb-lg-0">
                                <?php echo get_image(THEME_IMGS.'card-simulator-money.png','icon') ?>
                                <label>Monto:</label>
                            </div>  
                            <div class="col-lg-6">
                                <div class="form-input">
                                    <input type="text" name="input-amount" required id="input-amount" class="input-amount form-control" placeholder="S/ 000.00">
                                </div>
                            </div>    
                        </div>  
                        <div class="row mb-2">
                            <div class="col-lg-6 mb-2 mb-lg-0">
                                <?php echo get_image(THEME_IMGS.'card-simulator-pay.png','icon') ?>
                                <label>Cuotas a financiar:</label>
                            </div>  
                            <div class="col-lg-6">
                                <div class="form-number">
                                    <button class="input-less input-quote-update fas fa-minus"></button>
                                    <input type="text" name="input-quote" required id="input-quote" class="input-quote form-control" value="2" data-max="<?php echo @$content['max_quote']?$content['max_quote']:'36' ?>" pattern="[0-9]*" inputmode="numeric" >
                                    <button class="input-more input-quote-update fas fa-plus"></button>
                                </div>
                            </div>    
                        </div>            
                    </div>
                    <div class="col-6">
                        <div class="row mb-2">
                            <div class="col-lg-6 mb-2 mb-lg-0">
                                <?php echo get_image(THEME_IMGS.'card-simulator-tax.png','icon') ?>
                                <label>Tasa de interés <br>anual TEA:</label>
                            </div>  
                            <div class="col-lg-6">
                                <div class="form-select">
                                    <select name="input-tea" id="input-tea" required class="input-tea form-control">
                                    </select>                                    
                                </div>
                            </div>    
                        </div>  
                        <div class="row mb-2">
                            <div class="col-lg-6 mb-2 mb-lg-0">
                                <?php echo get_image(THEME_IMGS.'card-simulator-day.png','icon') ?>
                                <label>Fecha de compra:</label>
                            </div>  
                            <div class="col-lg-6">
                                <div class="form-input form-date">
                                    <span class="form-input-date">
                                        <select name="input-date-day" id="input-date-day" required class="input-date-day">
                                            <?php 
                                            for($i=1;$i<=31;$i++) {
                                                    echo '<option>'.($i>9?$i:'0'.$i).'</option>';                                    
                                            }?>
                                        </select>
                                    </span>
                                    <span>/</span>      
                                    <span class="form-input-date">                              
                                        <select name="input-date-month" id="input-date-month" required class="input-date-month form-input-date">
                                            <?php 
                                            for($i=1;$i<=12;$i++) {
                                                    echo '<option>'.($i>9?$i:'0'.$i).'</option>';                                    
                                            }?>
                                        </select>
                                    </span>  
                                    <span>/</span>   
                                    <span class="form-input-date form-input-date-year">                           
                                        <select name="input-date-year" id="input-date-year" required class="input-date-year form-input-date">
                                            <?php 
                                            for($i=date('Y');$i<=date('Y')+2;$i++) {
                                                    echo '<option>'.($i>9?$i:'0'.$i).'</option>';                                    
                                            }?>
                                        </select>
                                    </span>   
                                </div>
                            </div>    
                        </div>  
                        <div class="row mb-2">
                            <div class="col-lg-6 mb-2 mb-lg-0">
                                <?php echo get_image(THEME_IMGS.'card-simulator-calendar.png','icon') ?>
                                <label>Día de pago:</label>
                            </div>  
                            <div class="col-lg-6">
                                <div class="form-select">
                                    <select name="input-payment" id="input-payment"  class="input-payment form-control">
                                    </select>
                                </div>
                            </div>  
                        </div>            
                    </div>
                </div>  
                <div class="text-center pt-5">
                    <button type="submit" class="link">Quiero simular</button>
                </div>
            </form>
        </div>
    </section>    
    <section class="card-simulator-result">
        <div class="container">
            <h2>
				Fecha primera cuota: <span id="card-simulator-quote">XX/XX/2024</span>
				<br><br>
				Tu cuota estimada será <span id="card-simulator-amount"></span>
			</h2>                    
            <div class="block">
                <?php echo $content['simulator']['result'] ?>
            </div>
            <div class="block-control text-center pt-4">
                <a href="<?php  echo site_url('solicitar-productos') ?>" class="button-green ">Quiero mi tarjeta</a>
            </div>
        </div>
    </section>
    <section class="card-term">
        <div class="container">
            <h2 class="tab-nav tab-accordeon active" data-tab="tab-info" data-group="tab-info">Términos y condiciones <i class="fas fa-angle-down"></i></h2>     
            
            <div class="tab-block active" data-tab="tab-info" data-group="tab-info">
                <?php echo $content['simulator']['terms'] ?>
            </div>                     
        </div>
    </section>
    <section class="card-faq">
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

    <section class="card-other">
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
