<?php 
/**
 * @package annariel-cencosud2023
 * @subpackage post
 */


if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();

        $pageParent=get_page_by_path( 'seguros-y-asistencias' );
        set_query_var( 'pageParent', $pageParent );

        $pageCategory=get_the_terms( get_the_ID() ,'insurance_cat');   
        if($pageCategory) {
            set_query_var( 'pageCategory', $pageCategory[0] );
        }
        
        get_template_part( 'templates/page-insurance' );

    endwhile;
endif;