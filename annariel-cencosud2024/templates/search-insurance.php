<?php 
/**
 * Template Name: Search - Seguros y asistencias
 *
 * @package annariel-cencosud2023
 * @subpackage search
 */
get_header(); 

$search=isset($_GET['search'])?$_GET['search']:'';
$search=strip_tags(trim($search));
$search = filter_var($search,FILTER_SANITIZE_SPECIAL_CHARS);
        
?>
<div class="search-insurance">
    <?php get_template_part('templates/section-banner'); ?>

    <section class="insurance-result">
        <div class="container">
            <h2 class="title-h">
                Buscador
            </h2>

<?php

if ( $search && have_posts() ) : 
    while ( have_posts() ) : 
        the_post();

        $result=get_posts(array(
            'numberposts'=>-1,
            'post_type'=> 'insurance',
            'orderby'    => 'menu_order',
            'sort_order' => 'asc',
            //'s'=>$_GET['search'],
            'meta_query' => array(
                'relation' => 'OR',
                array(
                   'key'        => 'info',
                   'value'      => $search,
                   'compare'    => 'LIKE'
                ),
                array(
                   'key'        => 'condition',
                   'value'      => $search,
                   'compare'    => 'LIKE'
                ),
                array(
                   'key'        => 'condition_mobile',
                   'value'      => $search,
                   'compare'    => 'LIKE'
                ),
                array(
                   'key'        => 'additional_info',
                   'value'      => $search,
                   'compare'    => 'LIKE'
                ),
                array(
                   'key'        => 'cover',
                   'value'      => $search,
                   'compare'    => 'LIKE'
                ),
                array(
                   'key'        => 'not_cover',
                   'value'      => $search,
                   'compare'    => 'LIKE'
                ),
                array(
                   'key'        => 'use',
                   'value'      => $search,
                   'compare'    => 'LIKE'
                ),
                array(
                   'key'        => 'request',
                   'value'      => $search,
                   'compare'    => 'LIKE'
                ),
                array(
                   'key'        => 'requirement',
                   'value'      => $search,
                   'compare'    => 'LIKE'
                ),
                array(
                   'key'        => 'disclaimer',
                   'value'      => $search,
                   'compare'    => 'LIKE'
                )
             )
        ));

        ?>
            <div class="info">
                Aproximadamente <?php echo count($result) ?> resultados:
            </div>

            <?php if($result) {
                    foreach($result as $r){
            ?>
            <div class="item">
                <a href="<?php echo get_the_permalink($r->ID) ?>" class="link"></a>
                <h3><?php echo $r->post_title ?></h3>
                <span><?php echo get_the_permalink($r->ID) ?></span>
                <p><?php echo get_the_excerpt($r->ID) ?></p>
            </div>
            <?php }
            } else {
                echo '<strong>No se encontraron coincidencias</strong>';
            }
            ?>	
            
            <div class="text-center">
                <a href="<?php echo get_link_by_path('seguros-y-asistencias') ?>" class="btn-pri-orange">Regresar</a>
                <!-- <a href="javascript:history.back()" class="btn-pri-orange">Regresar</a> -->
            </div>
    <?php endwhile; ?>
<?php else: ?>
    <?php get_404_template(); echo '<strong>No se encontraron coincidencias</strong>'; ?>
<?php endif; ?>

        </div>
    </section> 
</div>
<?php get_footer(); 
