<?php 

get_header(); 

$pageOption=get_fields('options');
$page_info=$pageOption['search'];

$search=isset($_GET['s'])?$_GET['s']:'';
$search=strip_tags(trim($search));
$search = filter_var($search,FILTER_SANITIZE_SPECIAL_CHARS);

?>
<div class="search-page"> 
    <section class="search-banner">
        <div class="container">
            <div class="block">
                <h1>Resultados de la Búsqueda</h1>
                <p>Te ayudamos a encontrar eso que necesitas.</p>
            </div>
            <div class="image" style="background-image:url(<?php echo THEME_IMGS.'search-banner.png' ?>);"></div>
        </div>
    </section> 

    <section class="search-result">
        <div class="container">
            <form class="search-form">
                <input class="input-text" type="text" name="s" value="" placeholder="Comienza tu b&uacute;squeda aqu&iacute;">
                <button class="input-submit" type="submit"><i class="fab fa-sistrix"></i></button>
            </form>
            <div class="search-response">
            <?php
                if ( $search && have_posts() ) {
                    ?>
                    <h2>Las más vistas</h2>
                    <p class="info">Se han encontrado <?php echo $wp_query->post_count; ?> resultado(s) para "<?php echo $search; ?>"</p>
                    <?php                    
                        /* Start the Loop */
                        while ( have_posts() ) : 
                            
                            the_post();
                            
                            ?>
                            <div class="item">
                                <a href="<?php echo get_the_permalink() ?>" class="link"></a>
                                <h3><?php the_title() ?></h3>
                                <span><?php echo get_the_permalink() ?></span>
                                <p><?php echo get_the_excerpt()?get_the_excerpt():get_the_content() ?></p>
                            </div>
                            <?php 

                        endwhile; // End of the loop.
                    
                        get_template_part( 'templates/navigaton' ); // loading our custom file    

                }else if ( $search ) {
                    echo '<p class="info">'._("No se tiene ningun resultado disponible.").'</p>'; 
                }  
            ?>	
            </div>
            <div class="text-center pt-5">
                <a href="#" onclick="window.history.back()" class="button-orange">Regresar <i class="fas fa-angle-left"></i></a>
            </div>							
        </div>
    </section> 
</div>
    
<?php get_footer(); 