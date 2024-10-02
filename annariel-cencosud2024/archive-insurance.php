<?php 
/**
 * @package annariel-cencosud2023 - Seguros
 * @subpackage archive
 */

//get term data

$pageParent=get_page_by_path( 'seguros-y-asistencias' );
set_query_var( 'pageParent', $pageParent );

get_template_part( 'templates/page-insurance' );
