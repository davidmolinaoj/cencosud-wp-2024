<?php
/**
 * Template Name: Cencosud 2023 - Sorteos Detalle
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */

global $wp_query;

get_header(); 
        

?>
<div class="lot-page" > 
    <div class="lot-banner">
        <div class="desktop" style="background-image:url(<?php echo THEME_IMGS.'lot-banner.png' ?>);"></div>
        <div class="mobile" style="background-image:url(<?php echo THEME_IMGS.'lot-banner-m.png' ?>);"></div>
        <div class="container">
            <div class="block">
                <h1>Siempre ganas más usando tu tarjeta Cencosud</h1>
                <p>Participa de los premios que otorgamos todos los meses</p>
                <a href="#" class="link">VER TODOS LOS PREMIOS</a>
            </div>
        </div>
    </div>
    <div class="lot-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="lot-sidebar d-none d-md-block">
                        <h2>Filtro</h2>
                        <div class="lot-sidebar-select">
                            <select
                                class="form-select form-select-lg"
                                name=""
                                id=""
                            >
                                <option selected>Seleccionar año</option>
                                <option value="">2024</option>
                                <option value="">2023</option>
                                <option value="">2022</option>
                            </select>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg">
                    <div class="lot-detail">
                        <div class="link-back">
                            <a href="<?php echo site_url('sorteos') ?>"><i class="fas fa-angle-left"></i> Volver a Sorteos</a>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="image" <?php echo get_image_bg(THEME_IMGS.'lot-item.png') ?>></div>
                            </div>
                            <div class="col">
                                <div class="info">
                                    <h1>Nombre del sorteo</h1>
                                    <div class="date">Fecha del sorteo: 00/00/00</div>
                                    <div class="terms tab-nav tab-accordeon active" data-tab="tab-terms" data-group="tab-terms">
                                        Términos y Condiciones 
                                        <i class="fas fa-angle-right"></i> 
                                    </div>
                                    <div class="term-text tab-block active" data-tab="tab-terms" data-group="tab-terms">
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                                        laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit
                                        in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan
                                        et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                                        Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                                        laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                                        laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit
                                        in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan
                                        et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                                        Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                                        laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="winner">
                            <h3>GANADORES</h3>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>
                                            Nombre Completo 
                                        </th>
                                        <td>
                                            N° de DNI
                                        </td>
                                        <td>
                                            00/00/00
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Nombre Completo 
                                        </th>
                                        <td>
                                            N° de DNI
                                        </td>
                                        <td>
                                            00/00/00
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Nombre Completo 
                                        </th>
                                        <td>
                                            N° de DNI
                                        </td>
                                        <td>
                                            00/00/00
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Nombre Completo 
                                        </th>
                                        <td>
                                            N° de DNI
                                        </td>
                                        <td>
                                            00/00/00
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Nombre Completo 
                                        </th>
                                        <td>
                                            N° de DNI
                                        </td>
                                        <td>
                                            00/00/00
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Nombre Completo 
                                        </th>
                                        <td>
                                            N° de DNI
                                        </td>
                                        <td>
                                            00/00/00
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Nombre Completo 
                                        </th>
                                        <td>
                                            N° de DNI
                                        </td>
                                        <td>
                                            00/00/00
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        
        </div>
    </div>


    

</div>
<?php 

get_footer(); 
