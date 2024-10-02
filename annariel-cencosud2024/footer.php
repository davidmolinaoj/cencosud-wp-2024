<?php
$pageHome=get_page_by_path( 'home' );
$pageHome_content=get_fields($pageHome->ID);

$pageOption=get_fields('options');
?></main>

<?php if($pageHome_content['footer_app_enable']){?>
    <section class="app d-none">
        <div class="container">

            <h3><?php echo $pageHome_content['footer_app_title'] ?></h3>
            <div class="text"><?php echo $pageHome_content['footer_app_detail'] ?></div>
            <div class="buttons">
                <a href="<?php echo $pageHome_content['footer_app_appstore'] ?>" <?php link_is_blank(@$pageHome_content['footer_app_appstore_blank']) ?> class="link">
                    <i class="fab fa-apple icon"></i>App Store
                </a>
                <a href="<?php echo $pageHome_content['footer_app_googleplay'] ?>" <?php link_is_blank(@$pageHome_content['footer_app_googleplay_blank']) ?> class="link">
                    <i class="fab fa-google-play icon"></i>Google Play
                </a>
            </div>

            <div class="phone" style="<?php echo $pageHome_content['footer_app_image']?'background-image: url('.$pageHome_content['footer_app_image'].')':'' ?>" ></div>

        </div>
    </section>
<?php }?>
    <footer class="footer">
        <div class="container">
            <div class="top">
                <a href="#top" class="scroll-up">
                    <span>
                        SUBIR
                        <i class="fas fa-angle-double-up icon"></i>
                    </span>
                </a>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="contact">
                        <div class="block">
                            <div class="icon"></div>
                            <label>
                                <span>Lima</span>
                                <a target="_blank" href="tel:<?php  echo str_replace(' ', '', $pageHome_content['phone']['phone_lima']) ?>"><?php  echo $pageHome_content['phone']['phone_lima'] ?></a>
                            </label>                    
                        </div>
                        <div class="block">
                            / 
                            <label>
                                <span>Provincia</span>
                                <a target="_blank" href="tel:<?php  echo str_replace(' ', '', $pageHome_content['phone']['phone_provincia']) ?>"><?php  echo $pageHome_content['phone']['phone_provincia'] ?></a>
                            </label>                    
                        </div>
                    </div>
                    <?php
                        wp_nav_menu( array( 
                            'theme_location' => 'footer', 
                            'container_class' => 'menu-footer',
                            'walker' => new Cencosud_Walker_Nav_Menu()
                        ) ); 
                    ?>
                </div>
                <div class="col">
                    <form method="post" class="newsletter">
                        <div class="text">
                        Suscríbete a nuestras promociones
                        </div>
                        <div class="input-block">
                            <input type="email" class="input-text" name="email" id="newsletter-email" placeholder="Ingresa tu mail" required oninvalid="this.setCustomValidity('Recuerda colocar correctamente tu email, debe contener el signo “@” en la dirección de correo electrónico.')"
            oninput="this.setCustomValidity('')" />
                            <button type="submit" class="btn-pri-blue input-button">
                                <i class="fas fa-angle-right icon"></i>
                            </button>
                        </div>
                        <label class="input-checkblock">
                            <input type="checkbox" class="input-checkbox" name="check" id="newsletter-check">
                            <span class="checkmark"></span>
                            <p>He leído y acepto la <a href="<?php echo site_url('politicas-de-privacidad') ?>" target="_blank" rel="noopener">Política de tratamiento de protección de datos personales.</a></p>
                            <div class="error" data-error="newsletter-check">Debes aceptar las condiciones para continuar</div>
                        </label>
                    </form>
                    <div class="app text-center">
                        
                        <p>Descarga la app:
                        </p>

                        <a href="#" class="link">
                            <i class="fab fa-apple"></i>
                        </a>
                        <a href="#" class="link">
                            <i class="fab fa-google-play"></i>
                        </a>
                        <div class="footer-scotia"></div>
                    </div>
                </div>
            </div>
            
        </div>
        
        <div class="bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <a href="<?php echo site_url() ?>" class="logo"></a>
                    </div>
                    <div class="col-md-4">
                        <div class="social">
                            <?php
                            wp_nav_menu( array( 
                                'theme_location' => 'footer-social', 
                                'container_class' => 'menu-social',
                                'walker' => new Cencosud_Walker_Nav_Menu()
                            ) ); 
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="book">
                            <a href="<?php  echo site_url('libro-reclamaciones') ?>">
                                <span>Libro de Reclamaciones</span>
                                <img src="<?php  echo THEME_IMGS ?>icon-libro-reclamaciones.png" alt="libro-reclamaciones"> 
                            </a>
                        </div>
                    </div>
                </div>
                <div class="copy">
                    &copy; 2020 Tarjeta Cencosud - Todos los derechos reservados
                </div>
            </div>
        </div>
        
    </footer>         

    <div class="modal fade modal-frontend" id="modalAlert" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content" >
            <div class="modal-header">              
                <div class="modal-title">Información</div>
                <div class="modal-close"><i class="fas fa-times-circle"  data-dismiss="modal"></i>  </div>
            </div>
            <div class="modal-body">
                Mensaje de Alerta
            </div>
            <div class="modal-footer">&nbsp;</div>
          </div>
        </div>
    </div>
    
    <div class="dialog-online-card d-none">
        <div class="dialog">
            <div class="hide">x</div>
            <div class="image" <?php echo get_image_bg($pageHome_content['popup_intranet']['banner']['url']) ?> ></div>
            <div class="info">
                <?php echo $pageHome_content['popup_intranet']['content'] ?>
            </div>
        </div>
    </div>                   

        
    <?php 
    if( isset( $pageOption['assistent_virtual']['html'] ) ) {
        ?>
        <div class="assistent_virtual">
            <?php echo $pageOption['assistent_virtual']['html'] ?>
        </div>        
        <?php
    }
    
    ?>
    
    <?php wp_footer(); ?>
<script>
if (navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) { 
	jQuery('.footer .top').click(function(){
		window.scrollTo(100,0)
	})
}
</script>
</body>
</html>