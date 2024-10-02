<?php 
/**
 * Template Name: Page - Depósito Plazo Fijo
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */
get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();

        $content=get_fields();
        $block_info=$content['information'];
        $block_benefit=$content['benefit'];
        $block_form=$content['form'];
        $block_product=$content['product'];
        $block_faq=$content['faq'];
        $block_dialog=$content['dialog'];
        $block_extra=$content['extra'];
        
?>
<div class="page-deposit">
    <?php get_template_part('templates/section-banner'); ?>

    <section class="page-dialog">
        <div class="box">
            <div class="title">
                <h2 class="title-h">
                    ¿Por qué tener un <br><strong><?php echo the_title() ?>?</strong>
                </h2>
            </div>     
            <?php if(isset($block_info['text'])) {?>
            <div class="info"><?php echo $block_info['text'] ?></div>  
            <?php }?>
            <?php if(isset($block_info['items'])) {?>
                <div class="block">                    
                    <?php foreach($block_info['items'] as $item) {?>
                    <div class="item">
                        <?php if(isset($item['link'])) {?><a href="<?php echo $item['link'] ?>" class="link"></a><?php }?>                        
                        <?php echo get_image($item['icon'],'icon-img') ?>
                        <strong class="title"><?php echo $item['text'] ?></strong>
                    </div>   
                    <?php }?>
                </div>  
            <?php }?>
                  
        </div>
        
    </section>

    <section class="card-service deposit-service">
        <div class="container">
            <h3 class="title-h">
                <?php echo $block_benefit['title'] ?>
            </h3>
            
            <?php foreach($block_benefit['items'] as $item) {?>
                <div class="block">
                    <div class="item">
                        <?php if(isset($item['link'])) {?>
                            <a href="<?php echo $item['link'] ?>" class="link"></a>
                        <?php }?>
                        
                        <div class="img" style="background-image: url('<?php echo $item['image'] ?>')">
                            <div class="border-moon"></div>
                        </div>
                        <div class="text">
                            <i class="fas fa-angle-down icon  "></i>
                            <h5 class="title">
                                <?php echo $item['title'] ?>
                            </h5>
                            <div class="info">
                                <?php echo $item['detail'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            
        </div>
    </section>

    <?php if(isset($block_form) && $block_form) {?>
    <section class="deposit-simulator">
        <div class="container">
            <div class="title-h">
            Simula tu depósito a <br>plazo fijo y <strong>mira <br>cuánto puedes ganar</strong>
            </div>

            <div class="col-form">

                <div class="input-block">
                    <strong>Monto</strong>
                    <div class="input-amount">
                        <label>S/</label>
                        <input type="text" class="input-text" value="15,000.00" />
                    </div>
                    <small>Desde S/ 1,000 - Hasta S/ 15,000</small>
                </div>

                <div class="input-block input-radio-block">
                    <div class="input-radio">
                        <label class="option">
                            <input type="radio" class="input" name="smoker" checked id="smoker">
                            <span class="mark"></span>
                            <span class="label">Efectivo</span>
                        </label>
                        <label class="option">
                            <input type="radio" class="input" name="smoker" id="smoker">
                            <span class="mark"></span>
                            <span class="label">Transferencia <i class="fas fa-info-circle icon"></i></span>
                        </label>
                    </div>
                    
                </div>
                
                <div class="input-block">
                    <strong>En un plazo de</strong>
                    <div class="input-selector">
                        <input type="hidden" name="plazo-input" class="selector"/>
                        <div class="label">
                            <i class="fas fa-angle-down icon"></i>
                            <span>180 días</span>
                        </div>
                        <ul class="list">
                            <li>180 días</li>
                            <li>90 días</li>
                            <li>60 días</li>
                        </ul>
                    </div>
                </div>

                <div class="input-control">
                    <button class="input-button">Simular</button>
                </div>

            </div>
            <div class="col-info">
                <h3 class="title-h">
                Recuerda que:
                </h3>
                <ul class="list">                    
                    <li>
                        <?php echo get_image(THEME_IMGS.'sprites/sprite-tarjetas.svg','icon') ?>
                        Si retiras antes el depósito tendrás un cobro de penalidad.
                    </li>
                </ul>
            </div>
            <div class="col-result">

                <div class="owl-carousel owl-theme">
                    <div class="item selected">
                        <div class="block">
                            <div class="radio"></div>
                            <div class="label">
                                <span>TCEA 156.06%</span>
                                <strong>180 días</strong>
                                <small>6 meses</small>
                            </div>
                            <div class="win">
                                <span>Ganarás</span>
                                <strong>S/ 175.00</strong>
                            </div>
                            <div class="get">
                                <span>Obtendrás</span>
                                <strong>S/ 1,175.00</strong>
                            </div>

                            <div class="request">
                                <i class="fas fa-long-arrow-alt-right icon"></i>        
                                <div class="colm">
                                    <label>Solicitado</label>
                                    <span>10/08/19</span>
                                </div> 
                                <div class="colm">
                                    <label>Disponible</label>
                                    <span>10/08/20</span>
                                </div>                             
                            </div>
                        </div>
                    </div>
                    <div class="item ">
                        <div class="block">
                            <div class="radio"></div>
                            <div class="label">
                                <span>TCEA 156.06%</span>
                                <strong>180 días</strong>
                                <small>6 meses</small>
                            </div>
                            <div class="win">
                                <span>Ganarás</span>
                                <strong>S/ 175.00</strong>
                            </div>
                            <div class="get">
                                <span>Obtendrás</span>
                                <strong>S/ 1,175.00</strong>
                            </div>

                            <div class="request">
                                <i class="fas fa-long-arrow-alt-right icon"></i>        
                                <div class="colm">
                                    <label>Solicitado</label>
                                    <span>10/08/19</span>
                                </div> 
                                <div class="colm">
                                    <label>Disponible</label>
                                    <span>10/08/20</span>
                                </div>                             
                            </div>
                        </div>
                    </div>
                    <div class="item ">
                        <div class="block">
                            <div class="radio"></div>
                            <div class="label">
                                <span>TCEA 156.06%</span>
                                <strong>180 días</strong>
                                <small>6 meses</small>
                            </div>
                            <div class="win">
                                <span>Ganarás</span>
                                <strong>S/ 175.00</strong>
                            </div>
                            <div class="get">
                                <span>Obtendrás</span>
                                <strong>S/ 1,175.00</strong>
                            </div>

                            <div class="request">
                                <i class="fas fa-long-arrow-alt-right icon"></i>        
                                <div class="colm">
                                    <label>Solicitado</label>
                                    <span>10/08/19</span>
                                </div> 
                                <div class="colm">
                                    <label>Disponible</label>
                                    <span>10/08/20</span>
                                </div>                             
                            </div>
                        </div>
                    </div>
                </div>

                <a href="#" class="btn-pri-orange">Estoy interesado</a>

            </div>
        </div>
    </section>
    <?php }?>

    <section class="card-request deposit-request">

        <div class="container">
            <h3 class="title-h">
            <?php echo $block_product['title'] ?>
            </h3>
            
            <div class="tab-block">
                <div class="tab-nav-block">
                    <nav class="tab-nav row">
                        <a href="#tab-a" class="link col active">
                            <span>¿Cómo <br>lo pido?</span>
                        </a>     
                        <a href="#tab-b" class="link col">
                            <span>¿Qué necesito para <br>solicitarlo?</span>
                        </a>  
                        <a href="#tab-c" class="link col">
                            <span>Tasas y<br> tarifas</span>
                        </a>               
                    </nav>
                </div>

                <div class="tab-panel">
                    <div class="panel active" id="tab-a">
                        <?php echo $block_product['request'] ?>
                    </div>
                    <div class="panel" id="tab-b">
                        <?php echo $block_product['conditions'] ?>
                    </div>
                    <div class="panel" id="tab-c">
                        <?php echo $block_product['disclaimer'] ?>
                    </div>
                </div>
            </div>

        </div>
        <div class="border-moon"></div>
    </section>


    <section class="page-faq deposit-faq ">
        <div class="container clearfix">
            <h3 class="title-h">
                ¿Tienes alguna duda más? <br><strong>Despreocúpate</strong>
            </h3>

            <h4 class="subtitle-h">Resolvemos tus preguntas</h4>
        
            <div class="faq accordeon">
                <?php foreach($block_faq as $faq){ ?>
                <div class="item">
                    <div class="label">
                        <i class="fas fa-angle-up icon"></i>
                        <?php echo $faq['title'] ?>
                    </div>
                    <div class="text">
                        <?php echo $faq['detail'] ?>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="card-block clearfix">
                <div class="text">
                    <h4><?php echo $block_dialog['title'] ?></h4>
                    <a href="<?php echo $block_dialog['button_link'] ?>" <?php link_is_blank(@$block_dialog['button_blank']) ?> class="btn-pri-orange" <?php echo $block_dialog['button_color']?'style="background-color:'.$block_dialog['button_color'].'"':'' ?> ><?php echo $block_dialog['button_text'] ?></a>                    
                    <?php get_template_part('templates/section-share'); ?>
                </div>
                <div class="img" style="background-image: url('<?php echo $block_dialog['image'] ?>')">
                </div>
            </div>

        </div>
    </section>

    <section class="card-product deposit-product">
        <div class="container">
            <?php foreach($block_extra as $item){ ?>
                <div class="card-item">
                    <div class="text">
                        <h4><?php echo $item['title'] ?></h4>
                    </div>
                    <div class="img" style="background-image: url('<?php echo $item['image'] ?>')">
                    </div>
                    <a href="<?php echo $item['link_url'] ?>" <?php link_is_blank(@$item['link_blank']) ?> class="link" <?php echo $item['link_color']?'style="color:'.$item['link_color'].'"':'' ?>  ><?php echo $item['link_text'] ?> <i class="icon fas fa-arrow-right    "></i></a>            
                </div>
            <?php } ?>
        </div>
    </section> 

</div>
    <?php endwhile; ?>
<?php else: ?>
    <?php get_404_template(); ?>
<?php endif; ?>
<?php get_footer(); 
