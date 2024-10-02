<?php

$deviceClass='';
$ua = htmlentities($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8');
if (preg_match('~MSIE|Internet Explorer~i', $ua) || (strpos($ua, 'Trident/7.0; rv:11.0') !== false)) {
	$deviceClass='browser-ie';
}

$pageOption=get_fields('options');
$pageSearch=$pageOption['search'];

$pageHome=get_page_by_path( 'home' );
$pageHome_content=get_fields($pageHome->ID);

$pageInfo=get_page_by_path( 'centro-de-ayuda' );
$pageInfo_content=get_fields($pageInfo->ID);

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="description" content="<?php echo esc_attr(get_bloginfo('description')); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo THEME_URL ?>/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo THEME_URL ?>/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo THEME_URL ?>/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo THEME_URL ?>/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo THEME_URL ?>/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo THEME_URL ?>/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo THEME_URL ?>/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo THEME_URL ?>/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo THEME_URL ?>/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo THEME_URL ?>/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo THEME_URL ?>/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo THEME_URL ?>/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo THEME_URL ?>/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo THEME_URL ?>/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo THEME_URL ?>/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <?php wp_head(); ?>    

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5SV6ZMH');</script>
    <!-- End Google Tag Manager -->
</head>
<body <?php body_class('page-loading '.$deviceClass . ($tirillas?'banner-top-enable':'')); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5SV6ZMH"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <a id="top"></a>
    <header class="header" id="header"> 
        <div class="header-partner">
            <a href="https://www.wong.pe/" target="_blank" class="link link-wong"></a>
            <a href="https://www.metro.pe/" target="_blank" class="link link-metro"></a>
            <a href="https://www.scotiabank.com.pe/" target="_blank" class="link link-scotiabank"></a>
        </div>
        

        <div class="header-control">
            <div class="container">
                <a href="<?php echo site_url() ?>" class="header-logo"></a>
                <nav class="header-menu">
                    <?php
                        wp_nav_menu( array( 
                            'theme_location' => 'primary', 
                            'container_class' => 'menu-main',
                            'walker' => new Cencosud_Walker_Nav_Menu()
                        ) ); 
                    ?> 
                </nav>
                <div class="header-buttons">
                    <a href="<?php echo site_url('solicitar-productos') ?>" class="button btn-orange"> 
                        SOLICITAR PRODUCTOS
                    </a>
                    <a href="https://servicios.tarjetacencosud.pe/#/sys/login" class="button btn-blue">
                       <i class="fas fa-lock"></i>&nbsp;&nbsp;MI TARJETA EN LINEA
                    </a>
                </div>
                <div class="header-icons">
                    <a href="<?php echo site_url() ?>?s=" class="button-icon btn-search">
                        <i class="fab fa-sistrix"></i>
                    </a>
                    <button class="button-icon btn-menu">
                        <i class="fas fa-bars"></i>
                    </button> 
                </div>  
        </div>
    </header>
    <?php #get_header_popup() ?>
    <main class="main" id="main">

