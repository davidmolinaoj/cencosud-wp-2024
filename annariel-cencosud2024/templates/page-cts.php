<?php 
/**
 * Template Name: Page - CTS
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
                        <?php if(isset($item['link']) && $item['link']) {?>
                            <a href="<?php echo $item['link'] ?>" <?php echo link_is_blank(@$item['blank']) ?> class="link"></a>
                        <?php }?>                        
                        <?php echo get_image($item['icon'],'icon-img') ?>
                        <strong class="title"><?php echo $item['text'] ?></strong>
                    </div>   
                    <?php }?>
                </div>  
            <?php }?>
                  
        </div>
        
    </section>

    <section class="card-service cts-service">
        <div class="container">
            <h3 class="title-h">
                <?php echo $block_benefit['title'] ?>
            </h3>
            
            <?php foreach($block_benefit['items'] as $item) {?>
                <div class="block">
                    <div class="item">
                        <?php if(isset($item['link'])) {?>
                            <a href="<?php echo $item['link'] ?>" <?php echo link_is_blank(@$item['blank']) ?> class="link"></a>
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
        <div class="border-moon"></div>
    </section>

    <section class="card-request cts-request">

        <div class="container">
            <h3 class="title-h">
                <?php echo $block_product['title'] ?>
            </h3>
            
            <div class="tab-block">
                <div class="tab-nav-block">
                    <nav class="tab-nav row">
                        <a href="#tab-a" class="link col active">
                            <span>¿Cómo realizo <br>el traslado?</span>
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
                    <div class="panel" id="tab-c">
                        <?php echo $block_product['disclaimer'] ?>
                    </div>
                </div>
            </div>

        </div>
        <div class="border-moon"></div>
    </section>


    <section class="page-faq cts-faq ">
        <div class="container clearfix">
            <h3 class="title-h">
                Preguntas frecuentes <strong>CTS</strong>
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

    <section class="card-product cts-product">
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
