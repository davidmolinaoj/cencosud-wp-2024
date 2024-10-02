<?php 
/**
 * Template Name: Page - Elige tu Reprogramación
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */
get_header(); 

$pFields=get_fields( get_the_ID() );

$main_image=get_the_post_thumbnail_url();
?>
<div class="page-eligetureprogramacion">
    <div class="container">
        <section class="page-block" >
            <?php echo get_image($main_image,'page-image') ?>

            <?php the_content() ?>

            <?php if($pFields['pay_minimum']['button_text']) { ?>
            <div class="button-pay-minimum">
                <a href="<?php echo $pFields['pay_minimum']['button_link'] ?>" <?php echo $pFields['pay_minimum']['button_open']?'target="_blank"':'' ?> class="button">
                    <?php echo $pFields['pay_minimum']['button_text'] ?>
                </a>
                <div class="detail">
                    <?php echo $pFields['pay_minimum']['detail'] ?>
                </div>
            </div>
            <?php } ?>
            <?php if($pFields['pay_total']['button_text']) { ?>
            <div class="button-pay-total">
                <a href="<?php echo $pFields['pay_total']['button_link'] ?>" <?php echo $pFields['pay_total']['button_open']?'target="_blank"':'' ?> class="button">
                    <?php echo $pFields['pay_total']['button_text'] ?>
                </a>
                <div class="detail">
                    <?php echo $pFields['pay_total']['detail'] ?>
                </div>
            </div>
            <?php } ?>
        </section>
    </div>
</div>
<?php get_footer();