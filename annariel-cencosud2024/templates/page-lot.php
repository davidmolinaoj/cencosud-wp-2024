<?php
/**
 * Template Name: Cencosud 2023 - Sorteos
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */

global $wp_query;

get_header(); 
        
$content=get_fields();

$filter=@$_GET['filter'];

$args=array(
    'post_type'=>'lot',
    'numberposts' => -1
);

$lots = get_posts($args);

?>
<div class="lot-page" > 
    <?php get_banner_block('lot-banner',$content['banner']) ?>  
    <div class="lot-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="lot-sidebar">
                        <h2>Filtro</h2>
                        <div class="lot-sidebar-select">
                            <select
                                data-link="<?php echo site_url('sorteos') ?>"
                                class="form-select form-select-lg"
                                name="filtro-lot"
                                id="filtro-lot"
                            >
                                <option value="">Seleccionar año</option>
                                <?php for($y=(date('Y')-1);$y<=(date('Y')+2);$y++) { ?>
                                    <option <?php echo $filter==$y?'selected':'' ?> ><?php echo $y ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg">
                    <div class="lot-collection">
                        <?php
                        if($lots){
                            foreach($lots as $l) {
                                $image= wp_get_attachment_image_src( get_post_thumbnail_id( $l->ID ), 'full');
                                $image = $image[0];

                                $info=get_fields($l);

                                $date_lot= explode('/',$info['date_lot']);
                                
                                if( $filter && $filter!=$date_lot[2]  ) {
                                    continue;
                                }
                        ?>
                        <div class="lot-item">
                            <a href="<?php echo get_permalink( $l )?>" class="link"></a>
                            <div class="image" <?php echo get_image_bg($image) ?>></div>
                            <h3><?php echo $l->post_title ?></h3>
                            <div class="desc">
                                Premio: <?php echo $info['price'] ?>
                                <br>
                                Fecha: <?php echo $info['date_lot'] ?>
                            </div>
                        </div>
                        <?php }
                        }?>
                    </div>
                    
                    <!-- <nav class="promo-pages">
                        <a href="#" class="current">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                    </nav> -->
                </div>
            </div>
        
        </div>
    </div>


    

</div>
<?php 

get_footer(); 
