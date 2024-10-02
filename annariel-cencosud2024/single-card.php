<?php 
/**
 * @package annariel-cencosud2023
 * @subpackage post
 */


if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();        
        get_template_part( 'templates/page-cards' );

    endwhile;
endif;