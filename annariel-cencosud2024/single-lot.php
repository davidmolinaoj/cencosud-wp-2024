<?php 
/**
 * @package annariel-cencosud2023
 * @subpackage single
 */

 
get_header(); 


$page = get_page_by_path('sorteos');
$page_info=get_fields($page);
$page_video = $page_info['banner']['video_desktop']['url'];

$content=get_fields($page);
        
$image= wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
$image = $image[0];

$info=get_fields($l);

?>
<div class="lot-page" > 
    <?php get_banner_block('lot-banner',$content['banner']) ?>  
    <div class="lot-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="lot-sidebar d-none d-md-block">
                        <h2>Filtro</h2>
                        <div class="lot-sidebar-select">
                            <select
                                data-link="<?php echo site_url('sorteos') ?>"
                                class="form-select form-select-lg"
                                name="filtro-lot"
                                id="filtro-lot"
                            >
                                <option selected>Seleccionar año</option>
                                <option value="2024">2024</option>
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
                                <div class="image" <?php echo get_image_bg($image) ?>></div>
                            </div>
                            <div class="col">
                                <div class="info">
                                    <h1><?php the_title() ?></h1>
                                    <div class="date">Fecha del sorteo: <?php echo $info['date_lot'] ?></div>
                                    <div class="price">Premio: <br><?php echo $info['price'] ?></div>
                                    <div class="terms tab-nav tab-accordeon" data-tab="tab-terms" data-group="tab-terms">
                                        Términos y Condiciones 
                                        <i class="fas fa-angle-right"></i> 
                                    </div>
                                    <div class="term-text tab-block" data-tab="tab-terms" data-group="tab-terms">
                                        <?php echo $info['terms'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="winner">
                            <?php the_content() ?>                            
                        </div>

                    </div>
                </div>
            </div>
        
        </div>
    </div>


    

</div>
<?php 

get_footer(); 
