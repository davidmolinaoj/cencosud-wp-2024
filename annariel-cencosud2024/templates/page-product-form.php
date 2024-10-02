<?php 
/**
 * Template Name: Cencosud 2023 - Solicitar Productos
 *
 * @package Cencosud
 * @subpackage page
 */

 wp_enqueue_script('recaptcha-js', 'https://www.google.com/recaptcha/api.js');
 
get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();

        $term=get_page_by_path( 'politicas-de-privacidad' );
        $content=get_fields();
                
?>
<div class="product-page">    
    <section class="product-banner" >
        <div class="container">
            <h2>
                <strong>¡Qué gusto tenerte por aquí!</strong><br>
                Empieza a disfrutar de los mejores beneficios.
            </h2>

            <div class="icons">
                <!-- <?php foreach($content['product'] as $k => $product){ ?>
                    <div class="icon-block <?php echo $product['link']?'link':'' ?> <?php echo $k==0?'active':'' ?>" data-item="<?php echo $product['tipo_de_producto'] ?>-<?php echo $product['codigo_de_producto'] ?>" data-link="<?php echo $product['link'] ?>">
                        <div class="row" >
                            <?php 
                            if($product['icons']) {
                                foreach($product['icons'] as $item){  ?>
                                    <div class="col">
                                        <div class="item">
                                            <?php if($item['link']) {?>
                                                <a class="item" href="<?php echo $item['link'] ?>" <?php link_is_blank(@$item['blank']) ?> >
                                                    <?php echo get_image($item['icon']['url'],'image') ?>
                                                    <?php echo $item['title'] ?>
                                                </a>                                            
                                            <?php }else {?>
                                                <div class="item" >
                                                    <?php echo get_image($item['icon']['url'],'image') ?>
                                                    <?php echo $item['title'] ?>
                                                </div> 
                                            <?php } ?>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>                        
                    </div>
                <?php } ?> -->
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
            <form class="product-form-block" action="" method="post">
                <?php the_content() ?>

                <div class="form-group form-card">
                    <label for="product">Para solicitar mi:</label>
                    <div class="form-select-block">
                        <select name="product" id="product" class="form-control form-select">
                            <option value="2-TACRE">Tarjeta de Crédito Cencosud</option>
                            <option value="1-PRESAVA">Crédito Efectivo Cencosud</option>
                            <option value="1-CPDEUDA">Compra de Deuda</option>
                            <option value="2-INCLINEA">Incremento de Línea</option>
                            <option value="3-DEPFIJO">Depósito a Plazo Fijo</option>
                            <option value="4-SEGUR">Seguros</option>
                            <?php /*foreach($content['product'] as $prod){ ?>
                                <option value="<?php echo $prod['tipo_de_producto'] ?>-<?php echo $prod['codigo_de_producto'] ?>"><?php echo $prod['nombre_de_producto'] ?></option>
                            <?php }*/?>
                            
                        </select>
                        <i class="icon fas fa-caret-down"></i>
                    </div>
                </div>

                <div class="form-group form-document">
                    <div class="mb-1"><label for="">Mi Documento de Identidad es:</label></div>
                    <div class="row">
                        <div class="col-sm-3 form-select-block">
                            <select name="docType" class="form-control form-select" id="docType" data-validation="document">
                                <option value="DNI">DNI</option>
                                <option value="CE">Carné de Extranjería</option>
                            </select>
                            <i class="icon fas fa-caret-down"></i>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control form-input" name="docNumber" id="docNumber" placeholder="#" inputmode="numeric" pattern="\d*" maxlength="8" data-validation="document">
                        </div>
                    </div>
                    <div class="error" data-error="docNumber">Debes ingresar un número de Documento de Identidad válido</div>
                </div>

                <div class="form-group">
                    <div class="mb-1"><label for="email">Mi correo electrónico es</label></div>
                    <input type="email" class="form-control form-input" name="email" id="email" placeholder="@">
                    <div class="error" data-error="email">Debes ingresar un email válido</div>
                </div>

                <div class="form-group mb-2">
                    <div class="mb-1"><label for="phone">Me pueden contactar al número de teléfono</label></div>
                    <input type="phone" class="form-control form-input" name="phone" id="phone" maxlength="9" inputmode="numeric" pattern="\d*" placeholder="#" data-validation="phone">
                    <div class="error" data-error="phone">Debes ingresar un número de teléfono válido</div>
                </div>

                <div class="form-check mb-3">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" name="term" id="term" value="1" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description dialog-trigger" data-popup="popup-term">
                            <?php echo $content['terms_text']?$content['terms_text']:'He leído y acepto las condiciones de tratamiento de mis datos personales.' ?>
                        </span>
                        <div class="error" data-error="term">Debes aceptar las condiciones para continuar</div>
                    </label>
                </div>

                <div class="form-group form-recaptcha text-center">
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-1">
                            <div class="g-recaptcha" data-sitekey="6Ld_S6gZAAAAAB-r173wqgcam_RJgLLZrgibTcEO"></div>    
                            <div class="error" data-error="recaptcha">Debes validar el captcha</div>  
                        </div>  
                        <div class="col-md-6 mb-1">
                        <button type="submit" class="btn-pri-orange">Enviar</button>
                        </div>                      
                    </div>
                </div>                
                
            </form>
            <div class="product-message">
                <div class="waiting mb-5">
                    <h3>Estamos evaluando tu solicitud</h3>
                </div>                        
            </div>
        </div>
    </section>
    <div id="popup-term" class="popup-dialog">
        <div class="layer">
            <div class="panel">
                <div class="close-popup">X</div>
                <div class="dialog">
                    <?php echo $term->post_content ?>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php endwhile; ?>
<?php else: ?>
    <?php get_404_template(); ?>
<?php endif; ?>
<?php get_footer(); 
