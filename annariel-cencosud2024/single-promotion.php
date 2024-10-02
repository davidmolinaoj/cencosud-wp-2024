<?php 
/**
 * @package annariel-cencosud2023
 * @subpackage post
 */


if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();   
        
        set_query_var( 'promotion_item', get_post() );
        
        get_template_part( 'templates/page-promo' );
        
    endwhile;
endif;