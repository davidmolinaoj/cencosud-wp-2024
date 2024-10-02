<?php 
/**
 * @package annariel-cencosud2023
 * @subpackage taxonomy
 */

get_header(); 

$term=get_queried_object();
$term_id=get_queried_object()->term_id;
$term_info = get_fields($term);

$page=get_page_by_path('centro-de-ayuda');
$content=get_fields($page);

$faqs=  get_posts(array(
    'post_type'=>'faq',
    'numberposts' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'faq_category',
            'field' => 'term_id',
            'terms' => $term_id,
        )
    )
));

$faq_category= get_terms( 'faq_category', array(
    'parent'       => 0
));

?>
<div class="help-page"> 
    <section class="help-banner" <?php echo $content['banner']['color_bg'] ? 'style="background-color: '.$content['banner']['color_bg'].';"' :'' ?>>
        <div class="desktop" style="background-image:url(<?php echo $content['banner']['image_desktop']['url'] ?>);"></div>
        <div class="mobile" style="background-image:url(<?php echo $content['banner']['image_mobile']['url'] ?>);"></div>
        <div class="container">
            <div class="block">
                <?php echo get_the_content(null, false, $page) ?>
            </div>
        </div>
    </section>
    <section class="help-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="scroll">
                        <?php 
                        if($faq_category) { 
                            foreach($faq_category as $ic=>$fc) {
                        ?>
                            <a href="<?php echo get_term_link($fc,'faq_category') ?>" class="link <?php echo $term_id==$fc->term_id?'active':'' ?>">
                                <?php echo $fc->name ?>
                            </a>
                        <?php }
                        }
                        ?>
                        </div>                        
                    </div>
                </div>
                <div class="col">

                    <form method="get" class="help-search">
                        <input type="text" name="filter" class="help-search-input" placeholder="Buscar en Tarjetas" />
                        <i class="fab fa-sistrix"></i>
                    </form>

                    <h2>
                        <i class="arrow fas fa-angle-down "></i>
                        <?php echo get_image($term_info['image']['url']).' '.$term->name ?>
                    </h2>

                <?php if($faqs) { 
                    foreach($faqs as $i=>$f) {?>
                    <div class="item">
                        <div class="tab tab-nav tab-accordeon" data-tab="tab-<?php echo $f->ID ?>" data-group="tab-faq">
                            <i class="trigger fas fa-plus"></i>
                            <i class="trigger fas fa-minus"></i>
                            <label>
                                <?php echo get_the_title($f) ?>
                            </label>
                        </div>                
                        <div class="block tab-block" data-tab="tab-<?php echo $f->ID ?>" data-group="tab-faq">
                            <?php echo get_the_content(null, false, $f) ?>
                        </div>
                    </div>
                <?php }
                } ?>           
                </div>
            </div>
        </div>
    </section>

</div>
<?php
 get_footer(); 
