<?php 
/**
 * @package annariel-cencosud2023
 * @subpackage taxonomy
 */

get_header(); 

$page=get_page_by_path( 'blog' );

$content=get_fields($page);
$video      = $content['banner']['video_desktop']['url'];

$category= get_terms( 'category', array(
    'parent'       => 0
));
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
                <?php the_content() ?>
            </div>
        </div>
    </section>          
    <section class="blog-body">            
        <div class="container"> 
            <h2>Categorias</h2>
        </div>
    </section>        
</div>    
<?php get_footer(); 
