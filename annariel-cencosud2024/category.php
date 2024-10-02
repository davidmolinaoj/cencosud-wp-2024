<?php 
/**
 * @package annariel-cencosud2023
 * @subpackage category
 */

get_header(); 

$term=get_queried_object();
$term_id=get_queried_object()->term_id;
$term_info = get_fields($term);

$page=get_page_by_path( 'blog' );

$content=get_fields($page);
$video      = $content['banner']['video_desktop']['url'];

$category= get_terms( 'category', array(
    'parent'       => 0
));

$blogs=get_posts([
    'numberposts' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field' => 'term_id',
            'terms' => $term_id,
        )
    )
])

?>
<div class="blog-page">  
    <section class="blog-banner" <?php echo $content['banner']['color_bg'] ? 'style="background-color: '.$content['banner']['color_bg'].';"' :'' ?> >
        <?php 
        if($video){
            get_video($video,  null, 'video-banner desktop');
        }else{?>
            <div class="desktop" style="background-image:url(<?php echo $content['banner']['image_desktop']['url'] ?>);"></div>
        <?php }?>
        <div class="mobile" style="background-image:url(<?php echo $content['banner']['image_mobile']['url'] ?>);"></div>
        <div class="container">
            <div class="block">
                <?php echo get_the_content( null, false, $page ) ?>
            </div>
        </div>
    </section>          
    <section class="blog-body">            
        <div class="container"> 
            <div class="blog-category">  
                <i class="trigger fas fa-angle-down"></i>
                <a href="<?php echo site_url('blog') ?>" >Todos</a>
                <?php 
                if($category) {
                    foreach($category as $cat) {
                ?>
                <a href="<?php echo get_term_link($cat) ?>" <?php echo $cat->term_id==$term_id?'class="active"':'' ?> ><?php echo $cat->name ?></a>
                <?php 
                    }
                }
                ?>
            </div>
        
            <div class="blog-items">
                <?php if($blogs) {
                    foreach($blogs as $b){
                        $image=get_the_post_thumbnail_url( $b->ID, 'full');
                ?>
                    <div class="item">
                        <a href="<?php echo get_permalink( $b ) ?>" class="link"></a>
                        <div class="image" <?php echo get_image_bg($image) ?> ></div>
                        <h2><?php echo get_the_title( $b ) ?></h2>
                        <p><?php echo get_the_excerpt( $b ) ?></p>
                        <label>leer más <i class="fas fa-caret-right"></i></label>
                    </div>
                <?php }
                }?>   
            </div>             
        </div>
    </section>    
</div>    
<?php get_footer(); 
