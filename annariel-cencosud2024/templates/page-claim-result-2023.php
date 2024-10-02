<?php 
/**
 * Template Name: Page - Libro de Reclamaciones 2023 - Resultado
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */

 if( 
    !isset($_GET) 
        || 
    !array_key_exists('code',$_GET) 
        || 
    !isset($_GET['code']) 
        || 
    !$_GET['code']
        ||
    !preg_match("/^LR202\d[0-1]\d[0-2]\d[0-2]\d[0-5]\d-\w{8,12}$/",$_GET['code'])
) {
    header('Location: '.site_url('libro-reclamaciones'));
    exit;
}

get_header(); 

$code=sanitize_text_field( trim($_GET['code']) ); //PHP/PHP_High_Risk/Reflected_XSS
$dateY=substr($code,2,4);
$dateM=substr($code,6,2);
$dateD=substr($code,8,2);
$dateH=substr($code,10,2);
$dateI=substr($code,12,2);

if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();
        
        $content=get_fields();
        
?>
    <div class="page-content page-claim-2023" >        
        <section class="page-banner " >
            <div class="container">
                <div class="row h-100 align-items-center">                                
                    <div class="col-md-6">
                        <div class="block">
                            <?php echo $content['banner']['content']  ?>
                        </div>
                    </div>   
                    <div class="col-md-6">
                        <div class="icon">
                            <?php echo get_image($content['banner']['image_desktop']['url'],'banner-icon')?>
                        </div>
                    </div>                        
                </div>
            </div>
        </section>
        
        <section class="container">
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
                <?php if(function_exists('bcn_display'))
                {
                    bcn_display();
                }?>
            </div>
        </section>

        <section class="page-result" >
            <div class="container">
                
                <div class="dialog">
                    <p style="font-size: 1.2rem;">
                        Estimado Señor(a):
                    </p>
                    <p>
                        Su caso fue ingresado con código <strong><?php echo $code ?></strong> presentado
                        el día <?php  echo $dateD ?>/<?php  echo $dateM ?>/<?php  echo $dateY ?> a las <?php  echo $dateH ?>:<?php  echo $dateI ?> de forma correcta.
                    </p>
                    <p>
                        La constancia de su solicitud le será remitida al correo electrónico señalado en la hoja de reclamación. De no haber indicado una dirección
                        electrónica, la constancia se encontrará disponible para usted en cualquiera de nuestras oﬁcinas a nivel nacional.
                    </p>
                    <p>
                        Asimismo, podrá realizar el seguimiento de su caso a través de nuestros
                        canales de atención:
                    </p>

                    <div class="chanel">
                        <div class="item">
                            <?php echo get_image(THEME_IMGS.'libro-reclamaciones-phone.png','content-icon')?>
                            <div class="text">
                                <h3>Central Telefónica </h3>
                                Lima: 01-6107900 
                                Provincia : 0-801-00420 
                            </div> 
                        </div>
                        <div class="item">
                            <?php echo get_image(THEME_IMGS.'libro-reclamaciones-logos.png','content-icon')?>
                            <div class="text">
                                <h3>Centros de Tarjeta</h3>
                                Encuéntranos en Wong y Metro
                            </div> 
                        </div>
                        <div class="item">
                            <?php echo get_image(THEME_IMGS.'libro-reclamaciones-agency.png','content-icon')?>
                            <div class="text">
                                <h3>Agencia Principal</h3>
                                Ubicada en Av. Paseo de la República S/N C.C. Plaza Lima Sur, en el distrito de Chorrillos, Lima.
                            </div> 
                        </div>                        
                    </div>
                    <div class="copy">
                        Atentamente
                        <br>
                        Experiencia al cliente - Caja Cencosud Scotiabank.
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
