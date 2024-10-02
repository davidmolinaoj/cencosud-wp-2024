<?php 
/**
 * Template Name: Cencosud 2023 - Solicitar Productos (Resultado)
 *
 * @package Cencosud
 * @subpackage page
 */
get_header(); 

global $post;

if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();
        $post_content=get_the_content();
        $post_name=$post->post_name;

        $page=get_page_by_path( 'solicitar-productos' );
                        
?>
<div class="product-page">    
    <section class="product-banner" >
        <div class="container">
            <h2>
                <strong>¡Qué gusto tenerte por aquí!</strong><br>
                Empieza a disfrutar de los mejores beneficios.
            </h2>

            <div class="icons">
                <div class="icon-block active" data-item="" data-link="">
                    <div class="row" >
                        <div class="col-4">
                            <div class="item">
                                <?php echo get_image(THEME_IMGS.'products-icon-1.png','image') ?>
                                <div class="text">
                                    Miles de Ofertas <strong>Exclusivas</strong>
                                </div>
                            </div>                            
                        </div>
                        <div class="col-4">
                            <div class="item">
                                <?php echo get_image(THEME_IMGS.'products-icon-2.png','image') ?>
                                <div class="text">
                                    Todas tus compras en Wong y Metro
                                    acumulan x2 puntos Bonus
                                </div>
                            </div>                            
                        </div>
                        <div class="col-4">
                            <div class="item">
                                <?php echo get_image(THEME_IMGS.'products-icon-3.png','image') ?>
                                <div class="text">
                                    ¡Solicita tu tarjeta y participa
                                    del <strong>sorteo de 15 laptops!</strong>
                                </div>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
    </section>
    <section class="product-form" >
        <div class="container">
            
            <div class="product-result" >

                <?php if($post_name=='felicidades'){?>      
                    <h2>
                        <strong><?php echo $content['success'] ?> <span class="user-fullname"><?php echo $product_form_name ?></span></strong>
                    </h2>
                    <p class="text user-products"><?php echo $product_form_info ?></p>

                    <?php echo get_image($content['complete_image'],'alert-img') ?>

                    <div class="dialog">
                        <?php echo $post_content ?>  
                    </div>

                <?php } else if($post_name=='producto-entregado'){?> 
                    <h2>
                        Verificamos que tu solicitud fue procesada y entregada con éxito.
                    </h2>
                    <?php echo str_replace(array('{message}','{nombre}'), array($product_form_info, $product_form_name), $post_content) ?>  
                    
                <?php } else {?>
                    <?php echo str_replace(array('{message}','{nombre}'), array($product_form_info, $product_form_name), $post_content) ?>  
                <?php }?>  
            </div>

        </div>
    </section>
</div>


    <?php endwhile; ?>
<?php else: ?>
    <?php get_404_template(); ?>
<?php endif; ?>
<?php get_footer(); 
