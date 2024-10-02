<?php 
/**
 * Template Name: Page - Participa y Gana
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */
get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();

        $banner=get_page_banner( get_the_ID() );

        $content=$banner['content'];
        $product_banner=$content['items'];
        $term_link=$content['term_link'];
        $button_text=isset($content['button_text'])?$content['button_text']:'Quiero participar';

        
                
?>
<div class="join-page">    
    <?php get_template_part('templates/section-banner'); ?>
    
    <section class="join-block">
        <div class="container">
            <div class="info">
                <?php the_content() ?>  
            </div>

            <form class="join-form" autocorrect="off" spellcheck="false" autocomplete="none" action="" method="post">
                <div class="form-group form-group-input">
                    <input type="text" class="form-control " name="email" id="form-email" autocorrect="off" spellcheck="false" autocomplete="none" placeholder="Ejemplo: micorreo@electronico.com" data-validation="email"  >
                </div>
                <div class="error error-input" data-error="email">Debes ingresar tu email válido</div>

                <div class="form-group form-group-input">
                    <select name="document-type" id="form-document-type" class="form-control">
                        <option value="DNI">DNI</option>
                        <option value="CE">CE</option>
                    </select>
                    <input type="text" class="form-control " autocorrect="off" spellcheck="false" autocomplete="none" name="document" inputmode="numeric" id="form-document" placeholder="Completa tu DNI" data-validation="document-join"  >
                </div>    
                <div class="error error-input" data-error="document">Debes ingresar un documento válido</div>
                

                <div class="text-center">
                    <div class="form-check form-check-inline mb-3">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" name="term" id="term" value="1" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">
                                <?php echo $term_link ?>
                            </span>
                            <div class="error" data-error="term">Recuerda que debes aceptar los términos y condiciones para poder completar correctamente tu registro.</div>
                        </label>
                    </div>
                </div>

                <div class="form-group form-recaptcha text-center">
                    <div class="g-recaptcha" data-sitekey="6Ld_S6gZAAAAAB-r173wqgcam_RJgLLZrgibTcEO"></div>    
                    <div class="error" data-error="recaptcha">Debes validar el captcha</div>                        
                </div>

                <div class="text-center pt-4">
                    <button type="submit" class="btn-pri-orange d-none"><?php echo $button_text ?></button>
                </div>

            </form>
            <div class="form-message">
                <div class="alert alert-warning mb-5">
                    <h4 class="text-center">Espera un momento mientras validamos su información</h4>
                </div>                        
            </div>

        </div>
    </section>
    <section class="card-product join-footer">
        <div class="container">
        <?php 
            if($product_banner) {
                foreach($product_banner as $item) {   
            ?>
                <div class="card-item">
                    <div class="text">
                        <h4><?php echo $item['title'] ?></h4>
                    </div>
                    <div class="img" style="background-image: url('<?php echo $item['image']['url'] ?>')">
                    </div>
                    <a href="<?php echo $item['link'] ?>"  class="link" ><?php echo $item['tag'] ?> <i class="icon fas fa-arrow-right"></i></a>            
                </div>
            <?php }} ?> 
        </div>
    </section> 
    
    
</div>

    <?php endwhile; ?>
<?php else: ?>
    <?php get_404_template(); ?>
<?php endif; ?>
<?php get_footer(); 
