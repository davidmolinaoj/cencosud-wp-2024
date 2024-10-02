<?php
/**
 * Template Name: Cencosud 2023 - Trabaja con Nosotros
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */

global $wp_query;

get_header(); 
        
$location=sanitize_text_field( trim( @$_GET['l']) );
$key=sanitize_text_field( trim( @$_GET['k'] ) );

$content=get_fields();

$args = [
    'post_type' => 'work', 
    'posts_per_page' => -1,
    'orderby'	=> 'date',
    'order'	=> 'DESC'
];
if($location) {
    $args['meta_query'][] = array(
        'key' => 'location',
        'value' => $location,
        'compare' => 'LIKE'
    );
}

$workItems = get_posts($args);

$result=array();
if( $workItems ) { 
    foreach ( $workItems as $post ) { 


        $post_terms = [];
        $post_terms_id = [];
        $terms_ls = wp_get_post_terms($post->ID,'work_filter');
        $tags_ls = get_tags($post->ID);

        if($terms_ls) {
            foreach($terms_ls as $t) {
                $post_terms[ $t->term_id ] = $t->name;
                $post_terms_id[] = $t->term_id;
            }
        }

        if(
            !$key
                ||
            (
                strstr($post->post_title, $key)
                    ||
                strstr($post->post_content, $key)
                    ||
                strstr($post->post_excerpt, $key)       
                    ||
                in_array($key, $post_terms)             
            )
            
        ) {
            $post->terms = $post_terms_id;
            $post->tags = $tags_ls;
            $result[]=$post;
        }

        
    }
}

$terms = get_terms(array(
    'taxonomy' => 'work_filter',
    'parent' => 0
));

$banner = $content['banner'];

?>
<div class="work-page" > 
    <div class="work-banner" <?php echo $banner['color_bg'] ? 'style="background-color: '.$banner['color_bg'].';"' :'' ?> >
        <div class="desktop" style="background-image:url(<?php echo $banner['image_desktop']['url'] ?>);"></div>
        <div class="mobile" style="background-image:url(<?php echo $banner['image_mobile']['url'] ?>);"></div>
        <div class="container">
            <?php echo $banner['content'] ?>
            <div class="search">
                <form id="work-search" role="search" method="get" action="<?php echo esc_url(home_url('/trabaja-con-nosotros/')); ?>" class="form">
                    <div class="input-search">
                        <i class="fab fa-sistrix"></i>
                        <input name="k" value="<?php echo $key; ?>" type="text" placeholder="Cargo, categoría o palabra clave">
                    </div>
                    <div class="input-location">
                        <i class="fas fa-map-marker-alt"></i>
                        <input name="l" value="<?php echo $location; ?>" type="text" placeholder="Lugar">
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
                            <?php 
                            if($terms){ 
                                foreach($terms as $t) {    
                                    $tchild=get_terms(array(
                                        'taxonomy' => 'work_filter',
                                        'parent' => $t->term_id,
                                        'order' => 'name'
                                    ));

                                    if($tchild) {
                            ?>
                            <div class="filter">
                                <div class="label">
                                    <?php echo $t->name ?> <i class="fas fa-angle-down"></i>
                                </div>
                                <div class="check-list">
                                    <?php foreach($tchild as $tc) {?>        
                                    <div class="check" data-filter="<?php echo $tc->term_id ?>" data-item="work-item" > 
                                        <div class="square"></div> <label><?php echo $tc->name ?> </label>
                                    </div>
                                    <?php }?>         
                                </div>
                            </div>    
                            <?php   
                                    }
                                }
                            }  
                            ?>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="col">
                <div class="work-list">
                    <?php //print_r($args);
                    if( $result ) { 
                        foreach ( $result as $post ) {  
                            $classTerms = 'filter-' . implode(' filter-' , $post->terms);                    
                            $info=get_fields($post);
                            ?>
                            <div class="work-item <?php echo $classTerms ?>" >
                                <a href="<?php echo get_permalink($post) ?>" class="link"></a>
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3><?php echo $post->post_title ?></h3>
                                        <?php echo substr(get_the_excerpt($post),0,50) ?>
                                    </div>
                                    <div class="col-3">
                                        <div class="place"><?php echo $info['location'] ?></div>
                                    </div>   
                                    <div class="col-3">
                                        <?php echo get_the_date('',$post) ?>
                                    </div>                       
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    
    </div>

</div>
<?php 

get_footer(); 
