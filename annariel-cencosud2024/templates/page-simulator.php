<?php 
/**
 * Template Name: Page - Simulador de compras
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */

get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();

        $content=get_fields();
        $payment_day=$content['payment_day'];
                
        $products=  get_posts(array(
            'post_type'=>'product',
            'numberposts' => -1
        ));
        
?>
<div class="page-simulator">
    <?php get_template_part('templates/section-banner'); ?>

    <section class="simulator-form">
        <div class="container">
            <div class="panel">
                <?php the_content() ?>
            </div>
            
            <form action="" id="simulatorForm" class="form">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="field">
                            <?php  echo get_image(THEME_IMGS.'sprites/icon-card.png','icon') ?>
                            <label>Tipo de tarjeta:</label>
                            <div class="input input-card">
                                <i class="fas fa-angle-down list-arrow"></i>
                                <span class="value"></span>
                                <ul class="list"></ul>
                            </div>
                        </div>
                        <div class="field">
                            <?php  echo get_image(THEME_IMGS.'sprites/icon-coin.png','icon') ?>
                            <label>Monto:</label>
                            <div class="input input-amount-f">
                                <span class="value">
                                    S/.<input type="text" inputmode="numeric" maxlength="7" name="input-amount" class="input-amount" placeholder="0000">.00
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <?php  echo get_image(THEME_IMGS.'sprites/icon-calendar-card.png','icon') ?>
                            <label>Cuotas a financiar:</label>
                            <div class="input input-quote">
                                <i class="fas fa-minus"></i>
                                <span class="value" data-max="<?php echo $content['max_quote'] ?>">2</span>
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="tooltip-button" data-toggle="tooltip" data-placement="right" title="<?php echo $content['tooltip_quote'] ?>">?</div>
                        </div>
                        <div class="field">
                            <?php  echo get_image(THEME_IMGS.'sprites/icon-card-perc.png','icon') ?>
                            <label>Tasa de interés anual TEA:</label>
                            <div class="input input-tea">
                                <i class="fas fa-angle-down list-arrow"></i>
                                <span class="value"></span>
                                <ul class="list"></ul>
                            </div>
                            <div class="tooltip-button" data-toggle="tooltip" data-placement="right" title="<?php echo $content['tooltip_tea'] ?>">?</div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="field">
                            <?php  echo get_image(THEME_IMGS.'sprites/icon-calendar-ckeck.png','icon') ?>
                            <label>Fecha de compra:</label>
                            <div class="input input-date">
                                <span class="value value-d">DD</span>
                                <ul class="list">
                                    <?php 
                                    for($i=1;$i<=31;$i++) {
                                            echo '<li>'.($i>9?$i:'0'.$i).'</li>';                                    
                                    }?>
                                </ul>
                            </div>
                            <div class="input input-date">
                                <span class="value value-m">MM</span>
                                <ul class="list">
                                    <?php 
                                    for($i=1;$i<=12;$i++) {
                                            echo '<li>'.($i>9?$i:'0'.$i).'</li>';                                    
                                    }?>
                                </ul>
                            </div>
                            <div class="input input-date">
                                <span class="value value-y">AAAA</span>
                                <ul class="list">
                                    <?php 
                                    for($i=date('Y');$i<=date('Y')+2;$i++) {
                                            echo '<li>'.($i>9?$i:'0'.$i).'</li>';                                    
                                    }?>
                                </ul>
                            </div>
                        </div>
                        <div class="field">
                            <?php  echo get_image(THEME_IMGS.'sprites/icon-calendar.png','icon') ?>
                            <label>Día de pago:</label>
                            <div class="input input-payment">
                                <i class="fas fa-angle-down list-arrow"></i>
                                <span class="value"></span>
                                <ul class="list"></ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center mt-4 control">
                    <button type="submit" class="btn-pri-orange d-none">Quiero simular</button>
                </div>
            </form>
        </div>
        <div class="border-moon"></div>
    </section>

    <section class="simulator-result"> 
        <div class="container">
            <div class="panel">
                <h2>
                    <span><?php echo $content['results']['title'] ?></span>
                </h2>

                <div class="form-result">S/. 0000.00</div>

                <?php echo $content['results']['detail'] ?>
            </div> 

            <div class="control">
                <a href="<?php echo $content['results']['button_link'] ?>" <?php link_is_blank(@$content['results']['button_blank']) ?> class="btn-pri-orange">
                    <?php echo $content['results']['button_text'] ?>
                </a>
            </div>
        </div> 
    </section>   

    <section class="home-service simulator-product">
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


</div>
    <?php endwhile; ?>
<?php else: ?>
    <?php get_404_template(); ?>
<?php endif; ?>
<?php get_footer(); 
