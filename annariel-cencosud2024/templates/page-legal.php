<?php 
/**
 * Template Name: Cencosud 2023 - Legal
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */
get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();
       
        $content=get_fields();
                
?>
<div class="legal-page">    
    <section class="legal-banner" <?php echo $banner['color_bg'] ? 'style="background-color: '.$banner['color_bg'].';"' :'' ?> >
        <div class="container">
            <h1><?php the_title() ?></h1>
            <div class="dialog d-none">
                <?php echo $content['banner']['content'] ?>
            </div>
        </div>
    </section>    
    <section class="legal-body">
        <div class="container">
            <?php the_content() ?>
        </div>
        <div class="container d-none">
            
            <h2 class="tab-nav tab-accordeon active" data-tab="tab-product"  data-group="tab-product">
                Sobre Tarjetas de Crédito, Avance Efectivo y Disposición de Efectivo
                <i class="fas fa-angle-down"></i>
            </h2>
            <div class="tab-block  active" data-tab="tab-product"  data-group="tab-product">
                <ul>
                    <li>
                        <a href="#"><?php echo get_image(THEME_IMGS.'icon-pdf.png','icon')?>Tarifario</a>
                    </li>   
                    <li>
                        <a href="#"><?php echo get_image(THEME_IMGS.'icon-pdf.png','icon')?>Contrato</a>
                    </li>    
                    <li>
                        <a href="#"><?php echo get_image(THEME_IMGS.'icon-pdf.png','icon')?>Hoja Resumen</a>
                    </li>     
                    <li>
                        <a href="#"><?php echo get_image(THEME_IMGS.'icon-pdf.png','icon')?>
                        Beneficios, Condiciones y Riesgos del Producto</a>
                    </li>  
                </ul>          
            </div>

            <h2 class="tab-nav tab-accordeon active" data-tab="tab-insurance"  data-group="tab-insurance">
                Sobre Seguros
                <i class="fas fa-angle-down"></i>
            </h2>
            <div class="tab-block  active" data-tab="tab-insurance"  data-group="tab-insurance">
                <ul>
                    <li>
                        <a href="#"><?php echo get_image(THEME_IMGS.'icon-pdf.png','icon')?>Tarifario</a>
                    </li>   
                    <li>
                        <a href="#"><?php echo get_image(THEME_IMGS.'icon-pdf.png','icon')?>Contrato</a>
                    </li>    
                    <li>
                        <a href="#"><?php echo get_image(THEME_IMGS.'icon-pdf.png','icon')?>Hoja Resumen</a>
                    </li>  
                </ul>          
            </div>

            <h2 class="tab-nav tab-accordeon active" data-tab="tab-cash"  data-group="tab-cash">
                Sobre Efectivo Cencosud y Compra de deuda
                <i class="fas fa-angle-down"></i>
            </h2>
            <div class="tab-block  active" data-tab="tab-cash"  data-group="tab-cash">
                <ul>
                    <li>
                        <a href="#"><?php echo get_image(THEME_IMGS.'icon-pdf.png','icon')?>Tarifario</a>
                    </li>   
                    <li>
                        <a href="#"><?php echo get_image(THEME_IMGS.'icon-pdf.png','icon')?>Contrato</a>
                    </li>    
                    <li>
                        <a href="#"><?php echo get_image(THEME_IMGS.'icon-pdf.png','icon')?>Hoja Resumen</a>
                    </li>     
                    <li>
                        <a href="#"><?php echo get_image(THEME_IMGS.'icon-pdf.png','icon')?>Beneficios, Condiciones y Riesgos del Producto</a>
                    </li> 
                </ul>          
            </div>

            <h2 class="tab-nav tab-accordeon active" data-tab="tab-safe"  data-group="tab-safe">
                Sobre Productos de Ahorro
                <i class="fas fa-angle-down"></i>
            </h2>
            <div class="tab-block  active" data-tab="tab-safe"  data-group="tab-safe">
                <div class="grid-content">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>CTS</h3>
                            <ul>
                                <li>
                                    <a href="#"><?php echo get_image(THEME_IMGS.'icon-pdf.png','icon')?>Tarifario</a>
                                </li>   
                                <li>
                                    <a href="#"><?php echo get_image(THEME_IMGS.'icon-pdf.png','icon')?>Contrato</a>
                                </li>    
                                <li>
                                    <a href="#"><?php echo get_image(THEME_IMGS.'icon-pdf.png','icon')?>Hoja Resumen</a>
                                </li>     
                                <li>
                                    <a href="#"><?php echo get_image(THEME_IMGS.'icon-pdf.png','icon')?>Beneficios, Condiciones y Riesgos del Producto</a>
                                </li> 
                            </ul>  
                        </div>
                        <div class="col-md-6">
                            <div class="sep"></div>
                            <h3>DPF</h3>
                            <ul>
                                <li>
                                    <a href="#"><?php echo get_image(THEME_IMGS.'icon-pdf.png','icon')?>Tarifario</a>
                                </li>   
                                <li>
                                    <a href="#"><?php echo get_image(THEME_IMGS.'icon-pdf.png','icon')?>Contrato</a>
                                </li>    
                                <li>
                                    <a href="#"><?php echo get_image(THEME_IMGS.'icon-pdf.png','icon')?>Hoja Resumen</a>
                                </li>     
                                <li>
                                    <a href="#"><?php echo get_image(THEME_IMGS.'icon-pdf.png','icon')?>Beneficios, Condiciones y Riesgos del Producto</a>
                                </li> 
                            </ul> 
                        </div>
                    </div>
                </div>
            
            </div>

            <h2 class="tab-nav tab-accordeon active" data-tab="tab-info"  data-group="tab-info">
                Información Adicional
                <i class="fas fa-angle-down"></i>
            </h2>
            <div class="tab-block  active" data-tab="tab-info"  data-group="tab-info">
                <ul>
                    <li>
                        <a href="#"><?php echo get_image(THEME_IMGS.'icon-pdf.png','icon')?>
                        Simuladores
                        </a>
                    </li>   
                    <li>
                        <a href="#"><?php echo get_image(THEME_IMGS.'icon-pdf.png','icon')?>
                        Portal de Orientación y Servicios al Ciudadano (enlace)
                        </a>
                    </li>    
                    <li>
                        <a href="#"><?php echo get_image(THEME_IMGS.'icon-pdf.png','icon')?>
                        Estadísticas de Reclamos
                        </a>
                    </li>      
                    <li>
                        <a href="#"><?php echo get_image(THEME_IMGS.'icon-pdf.png','icon')?>
                        Canales de Atención (lista de agencias y horarios)
                        </a>
                    </li> 
                </ul>        
            </div>

            <h2 class="tab-nav tab-accordeon active" data-tab="tab-privacy"  data-group="tab-privacy">
                Privacidad de datos
                <i class="fas fa-angle-down"></i>
            </h2>
            <div class="tab-block  active" data-tab="tab-privacy"  data-group="tab-privacy">
                
                <h3 class="tab-nav tab-accordeon " data-tab="tab-privacy-policy"  data-group="tab-privacy-policy">
                    <i class="fas fa-angle-down"></i>
                    Política de privacidad
                </h3>
                <div class="tab-block " data-tab="tab-privacy-policy"  data-group="tab-privacy-policy">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>

                <h3 class="tab-nav tab-accordeon " data-tab="tab-privacy-cookies"  data-group="tab-privacy-cookies">
                    <i class="fas fa-angle-down"></i>
                    Política de cookies
                </h3>
                <div class="tab-block  " data-tab="tab-privacy-cookies"  data-group="tab-privacy-cookies">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>

                <h3 class="tab-nav tab-accordeon " data-tab="tab-privacy-data"  data-group="tab-privacy-data">
                    <i class="fas fa-angle-down"></i>
                    Protección de datos
                </h3>
                <div class="tab-block  " data-tab="tab-privacy-data"  data-group="tab-privacy-data">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
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
