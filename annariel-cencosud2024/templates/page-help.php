<?php
/**
 * Template Name: Cencosud 2023 - Centro de Ayuda
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */
get_header(); 


if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();

        $content=get_fields();

        $faqs=  get_posts(array(
            'post_type'=>'faq',
            'numberposts' => 5,
            'meta_key'=>'featured',
            'meta_value'=>'Si'
        ));

        $faq_category= get_terms( 'faq_category', array(
            'parent'       => 0
        ));

        ?>
<div class="help-page"> 
    <?php get_banner_block('help-banner',$content['banner']) ?>  
    <section class="help-body">
        <div class="container">
            <form method="get" class="help-search">
                <input type="text" name="filter" class="help-search-input" placeholder="Buscar en Centro de Ayuda" />
                <i class="fab fa-sistrix"></i>
            </form>
            <div class="help-item">
                <?php if($faq_category) { 
                    foreach($faq_category as $ic=>$fc) {
                        $fc_info=get_fields($fc);
                        
                        $image = THEME_IMGS.'help-item-2.png';
                        $image = $fc_info['image'] ? $fc_info['image']['url'] : $image;    
                ?>
                <a href="<?php echo get_term_link($fc,'faq_category') ?>" class="item">
                    <span class="image" style="background-image:url(<?php echo $image ?>);" ></span>
                    <label class="name"><?php echo $fc->name ?></label>
                </a>
                <?php }
                }?> 
            </div>
        </div>
    </section>

    <section class="help-faq ">
        <div class="container clearfix">
            <h2>
                Las más vistas
            </h2>

            <?php if($faqs) { 
                foreach($faqs as $i=>$f) {?>
            <div class="item">
                <div class="tab tab-nav tab-accordeon" data-tab="tab-<?php echo $f->ID ?>" data-group="tab-faq">
                    <i class="fas fa-angle-right"></i>
                    <label>
                        <?php echo get_the_title($f) ?>
                    </label>
                </div>                
                <div class="block tab-block" data-tab="tab-<?php echo $f->ID ?>" data-group="tab-faq">
                    <?php echo get_the_content(null, false, $f) ?>
                </div>
            </div>
            <?php }
            }?>            
        </div>
    </section>
</div>
<?php endwhile; ?>
<?php else: ?>
<?php get_404_template(); ?>
<?php endif; ?>
<?php get_footer(); 
