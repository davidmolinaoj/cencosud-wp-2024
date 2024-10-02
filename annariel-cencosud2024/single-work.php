<?php
/**
 * @package annariel-cencosud2023
 * @subpackage single
 */

get_header();

if ( have_posts() ) :
    while ( have_posts() ) :
        the_post();

        #$terms = get_the_terms( get_the_ID(), 'work_filter' );
        #print_r($terms);
        
        $img= wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
        $info=get_fields($post);
        $maillink="mailto:seleccionhr@cencosudscotiabank.pe?subject=Solicitud%20de%20Empleo%20para%20la%20Posici%C3%B3n%20de%20%5BNombre%20de%20la%20Posici%C3%B3n%5D&body=Estimados%2C%0A%0AMe%20dirijo%20a%20ustedes%20para%20expresar%20mi%20inter%C3%A9s%20en%20la%20posici%C3%B3n%20de%20%5BNombre%20de%20la%20Posici%C3%B3n%5D%20publicada%20en%20su%20p%C3%A1gina%20web.%20Adjunto%20a%20este%20correo%20encontrar%C3%A1%20mi%20Curr%C3%ADculum%20Vitae%20para%20su%20revisi%C3%B3n.%0A%0AAsimismo%2C%20agradecer%C3%A9%20considerar%20mis%20datos%20personales%3A%0A-%20Nombre%3A%20%5BNombre%20del%20Postulante%5D%0A-%20Correo%20Electr%C3%B3nico%3A%20%5BCorreo%20Electr%C3%B3nico%20del%20Postulante%5D%0A-%20Tel%C3%A9fono%3A%20%5BN%C3%BAmero%20de%20Tel%C3%A9fono%20del%20Postulante%5D%0A%0AEstoy%20muy%20entusiasmado%2Fa%20con%20la%20oportunidad%20de%20formar%20parte%20de%20su%20equipo%20aportar%20con%20mis%20habilidades%20y%20experiencia%20en%20la%20empresa.%20%0A%0AQuedo%20a%20la%20espera%20de%20su%20respuesta.%0ASaludos%20cordiales%2C";
?>
<div class="work-page" >
    <div class="work-banner">
        <div class="desktop" style="background-image:url(<?php echo THEME_IMGS.'work-banner.jpg' ?>);"></div>
        <div class="mobile" style="background-image:url(<?php echo THEME_IMGS.'work-banner.jpg' ?>);"></div>
        <div class="container">
            <h1>Trabaja con Nosotros</h1>
            <div class="search">
                <form method="GET" action="<?php echo site_url('trabaja-con-nosotros') ?>" class="form">
                    <div class="input-search">
                        <i class="fab fa-sistrix"></i>
                        <input name="s" type="text" placeholder="Cargo, categoría o palabra clave">
                    </div>
                    <div class="input-location">
                        <i class="fas fa-map-marker-alt"></i>
                        <input name="l"  type="text" placeholder="Lugar">
                    </div>
                    <div class="input-button">
                        <button class="button" type="submit">BUSCAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="work-body container">

        <div class="row">
            <div class="col-lg-3">
                <div class="work-filter">
                    <h2>Filtros <i class="fas fa-sliders-h"></i></h2>
                    <div class="work-scroll">
                        <div class="work-scroll-block">
                            <div class="filter">
                                <div class="label">
                                    Tipo de posición <i class="fas fa-angle-down"></i>
                                </div>
                                <div class="check-list">
                                    <div class="check">
                                        <div class="square"></div> <label>Oficina administrativa</label>
                                    </div>
                                    <div class="check">
                                        <div class="square"></div> <label>Agencia</label>
                                    </div>
                                </div>
                            </div>
                            <div class="filter">
                                <div class="label">
                                Modalidad <i class="fas fa-angle-down"></i>
                                </div>
                                <div class="check-list">
                                    <div class="check active">
                                        <div class="square"></div> <label>full time </label>
                                    </div>
                                    <div class="check">
                                        <div class="square"></div> <label>part time</label>
                                    </div>
                                </div>
                            </div>
                            <div class="filter">
                                <div class="label">
                                Gerencias <i class="fas fa-angle-down"></i>
                                </div>
                                <div class="check-list">
                                    <div class="check active">
                                        <div class="square"></div> <label>Tecnología</label>
                                    </div>
                                    <div class="check">
                                        <div class="square"></div> <label>Auditoría</label>
                                    </div>
                                    <div class="check">
                                        <div class="square"></div> <label>Gestión de clientes</label>
                                    </div>
                                    <div class="check">
                                        <div class="square"></div> <label>Legal</label>
                                    </div>
                                    <div class="check">
                                        <div class="square"></div> <label>Finanzas</label>
                                    </div>
                                    <div class="check">
                                        <div class="square"></div> <label>Auditoría</label>
                                    </div>
                                    <div class="check">
                                        <div class="square"></div> <label>Alianzas</label>
                                    </div>
                                    <div class="check">
                                        <div class="square"></div> <label>Comercial</label>
                                    </div>
                                    <div class="check">
                                        <div class="square"></div> <label>Riesgo Crediticio</label>
                                    </div>
                                </div>
                            </div>
                            <div class="filter">
                                <div class="label">
                                Departamento <i class="fas fa-angle-down"></i>
                                </div>
                                <div class="check-list">
                                    <div class="check active">
                                        <div class="square"></div> <label>Lima</label>
                                    </div>
                                    <div class="check">
                                        <div class="square"></div> <label>Trujillo</label>
                                    </div>
                                    <div class="check">
                                        <div class="square"></div> <label>Chiclayo</label>
                                    </div>
                                    <div class="check">
                                        <div class="square"></div> <label>Cajamarca</label>
                                    </div>
                                    <div class="check">
                                        <div class="square"></div> <label>Ica</label>
                                    </div>
                                    <div class="check">
                                        <div class="square"></div> <label>Piura</label>
                                    </div>
                                    <div class="check">
                                        <div class="square"></div> <label>Ancash</label>
                                    </div>
                                    <div class="check">
                                        <div class="square"></div> <label>Arequipa</label>
                                    </div>
                                    <div class="check">
                                        <div class="square"></div> <label>Huanuco</label>
                                    </div>
                                    <div class="check">
                                        <div class="square"></div> <label>Tumbes</label>
                                    </div>
                                </div>
                            </div>
                            <div class="filter">
                                <div class="label">
                                    Gerencia <i class="fas fa-angle-down"></i>
                                </div>
                                <div class="check-list">
                                    <div class="check active">
                                        <div class="square"></div> <label>Tecnología</label>
                                    </div>
                                    <div class="check">
                                        <div class="square"></div> <label>Auditoría</label>
                                    </div>
                                    <div class="check">
                                        <div class="square"></div> <label>Gestión de Clientes</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col">
                <div class="work-list">
                    <div class="work-item">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3><?php the_title() ?></h3>
                            </div>
                            <div class="col-4 col-md-2">
                                <a class="option" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink() ?>" target="_blank">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                <a class="option" href="whatsapp://send?text=<?php echo get_permalink() ?>" data-action="share/whatsapp/share" target="_blank">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a class="option" href="<?php echo $maillink ?>" target="_blank">
                                    <i class="fa fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="work-detail">
                        <div class="row mb-3">
                            <div class="col">
                                <strong><?php echo $info['location'] ?></strong> &nbsp;&bull;&nbsp; <?php echo get_the_date('',$post) ?>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo $maillink ?>" target="_blank" class="link">POSTULAR</a>
                            </div>
                        </div>
                        <h2>Sobre el cargo</h2>
                        <div class="block">
                            <?php the_content() ?>
                        </div>
                    </div>
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
