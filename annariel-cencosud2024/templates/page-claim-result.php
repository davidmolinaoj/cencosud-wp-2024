<?php 
/**
 * Template Name: Cencosud 2023 - Libro de Reclamaciones - Resultado
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
    <div class="page-content page-claim" >        
    <section class="page-banner" >
            <div class="container">
                <div class="row h-100 align-items-center">                                
                    <div class="col-md-6">
                        <div class="block">
                            <?php echo $content['banner']['content'] ?>
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
        <section class="page-result" >
            <div class="container">                
                <div class="dialog">
                    <?php  the_content()?>
                </div>
            
            </div>
        </section>
        
    </div>
    <?php endwhile; ?>
<?php else: ?>
    <?php get_404_template(); ?>
<?php endif; ?>
<?php get_footer(); 
