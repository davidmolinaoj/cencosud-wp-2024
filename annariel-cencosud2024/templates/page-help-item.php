<?php
/**
 * Template Name: Cencosud 2023 - Centro de Ayuda / Item
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */
get_header(); 


if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();

        $page_info=get_page_banner( get_the_ID() ); 
        $page_content=$page_info['content'];

        ?>
<div class="help-page"> 
    <section class="help-banner">
        <div class="desktop" style="background-image:url(<?php echo THEME_IMGS.'help-banner-desktop.png' ?>);"></div>
        <div class="mobile" style="background-image:url(<?php echo THEME_IMGS.'help-banner-mobile.png' ?>);"></div>
        <div class="container">
            <div class="block">
                <h1>Centro de Ayuda</h1>
                <p>
                Resolvemos todas tu preguntas.
                </p>
            </div>
        </div>
    </section>
    <section class="help-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="scroll">
                            <a href="<?php echo site_url() ?>/centro-de-ayuda/centro-de-ayuda-tarjeta-de-credito/" class="link active">
                                TARJETAS
                            </a>
                            <a href="<?php echo site_url() ?>/centro-de-ayuda/centro-de-ayuda-tarjeta-de-credito/" class="link">
                                CANALES DE ATENCIÓN/PAGO
                            </a>
                            <a href="<?php echo site_url() ?>/centro-de-ayuda/centro-de-ayuda-tarjeta-de-credito/" class="link">
                                DEPÓSITO
                            </a>
                            <a href="<?php echo site_url() ?>/centro-de-ayuda/centro-de-ayuda-tarjeta-de-credito/" class="link">
                                EFECTIVO
                            </a>
                            <a href="<?php echo site_url() ?>/centro-de-ayuda/centro-de-ayuda-tarjeta-de-credito/" class="link">
                                SEGUROS
                            </a>
                            <a href="<?php echo site_url() ?>/centro-de-ayuda/centro-de-ayuda-tarjeta-de-credito/" class="link">
                                CAJA SCOTIABANK
                            </a>
                            <a href="<?php echo site_url() ?>/centro-de-ayuda/centro-de-ayuda-tarjeta-de-credito/" class="link">
                                SEGURIDAD
                            </a>
                            <a href="<?php echo site_url() ?>/centro-de-ayuda/centro-de-ayuda-tarjeta-de-credito/" class="link">
                                NOSOTROS
                            </a>
                        </div>                        
                    </div>
                </div>
                <div class="col">

                    <form method="get" class="help-search">
                        <input type="text" class="help-search-input" placeholder="Buscar en Tarjetas" />
                        <i class="fab fa-sistrix"></i>
                    </form>

                    <h2>
                        <i class="arrow fas fa-angle-down "></i>
                        <?php echo get_image(THEME_IMGS.'help-item-1.png') ?> Tarjeta de Crédito
                    </h2>

                    <div class="item">
                        <div class="tab tab-nav tab-accordeon" data-tab="tab-1" data-group="tab-faq">
                            <i class="trigger fas fa-plus"></i>
                            <i class="trigger fas fa-minus"></i>
                            <label>
                                ¿Cómo la pido?
                            </label>
                        </div>                
                        <div class="block tab-block" data-tab="tab-1" data-group="tab-faq">
                            <ul>
                                <li>
                                Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. 
                                </li>
                                <li>
                                Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. 
                                </li>
                                <li>
                                Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. 
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="item">
                        <div class="tab tab-nav tab-accordeon" data-tab="tab-2" data-group="tab-faq">
                            <i class="trigger fas fa-plus"></i>
                            <i class="trigger fas fa-minus"></i>
                            <label>
                                ¿Dónde realizo los pagos de mi tarjeta?
                            </label>
                        </div>                
                        <div class="block tab-block" data-tab="tab-2" data-group="tab-faq">
                            <ul>
                                <li>
                                Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. 
                                </li>
                                <li>
                                Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. 
                                </li>
                                <li>
                                Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. 
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="item">
                        <div class="tab tab-nav tab-accordeon" data-tab="tab-3" data-group="tab-faq">
                            <i class="trigger fas fa-plus"></i>
                            <i class="trigger fas fa-minus"></i>
                            <label>
                            ¿Cobran membresía?
                            </label>
                        </div>                
                        <div class="block tab-block" data-tab="tab-3" data-group="tab-faq">
                            <ul>
                                <li>
                                Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. 
                                </li>
                                <li>
                                Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. 
                                </li>
                                <li>
                                Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. 
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="item">
                        <div class="tab tab-nav tab-accordeon" data-tab="tab-4" data-group="tab-faq">
                            <i class="trigger fas fa-plus"></i>
                            <i class="trigger fas fa-minus"></i>
                            <label>
                            ¿Qué es el Seguro de Desgravamen?
                            </label>
                        </div>                
                        <div class="block tab-block" data-tab="tab-4" data-group="tab-faq">
                            <ul>
                                <li>
                                Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. 
                                </li>
                                <li>
                                Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. 
                                </li>
                                <li>
                                Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. 
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="item">
                        <div class="tab tab-nav tab-accordeon" data-tab="tab-5" data-group="tab-faq">
                            <i class="trigger fas fa-plus"></i>
                            <i class="trigger fas fa-minus"></i>
                            <label>
                            ¿Puedo realizar el endoso de mi Seguro de Desgravamen?
                            </label>
                        </div>                
                        <div class="block tab-block" data-tab="tab-5" data-group="tab-faq">
                            <ul>
                                <li>
                                Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. 
                                </li>
                                <li>
                                Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. 
                                </li>
                                <li>
                                Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. Lorem ipsum dolor sit amel. 
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    


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
