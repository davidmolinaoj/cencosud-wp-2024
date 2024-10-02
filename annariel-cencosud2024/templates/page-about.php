<?php 
/**
 * Template Name: Cencosud 2023 - Nosotros
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */
get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();

        $content=get_fields();

        $years=get_terms([
            'taxonomy'   => 'year-group'
        ]);

        $docsM=$docsF=array();
        foreach($years as $y) {
            $docsF[ $y->name ]=get_posts([
                'post_type' => 'finantial-info',
                'numberposts' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'year-group',
                        'field' => 'id',
                        'terms' => $y->term_id 
                    )
                )
            ]);
            $docsM[ $y->name ]=get_posts([
                'post_type' => 'anual-memory',
                'numberposts' => -1,
                'tax_query' => array(
                    array(
                    'taxonomy' => 'year-group',
                    'field' => 'id',
                    'terms' => $y->term_id
                    )
                )
            ]);
        }
?>
<div class="about-page">    
    <?php get_banner_block('about-banner',$content['banner']) ?>  
    <section class="about-history">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="block">
                        <?php echo $content['history']['content'] ?>
                    </div>
                </div>
                <div class="col-md-5">
                    <?php echo get_image( $content['history']['image'] ,'banner') ?>
                </div>
                <div class="col-md-6">
                    <div class="location">  
                        <div class="row align-items-center">
                            <div class="col-9">
                                <?php echo $content['history']['country'] ?>
                            </div>
                            <div class="col-3">
                                <?php echo get_image( THEME_IMGS.'about-location-icon.png' ,'icon') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-value">
        <div class="container">
            <?php echo $content['value']['content'] ?>
            
            <div class="row align-items-md-center items">
                <div class="col-6 col-md-3">
                    <div class="item">
                        <div class="row align-items-center">
                            <div class="col-12">                                
                                <?php echo get_image( $content['value']['value_1']['image']['url'] ,'icon') ?>
                            </div>
                            <div class="col">
                                <?php echo $content['value']['value_1']['content'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="item">
                        <div class="row align-items-center">
                            <div class="col-12">                                
                                <?php echo get_image( $content['value']['value_2']['image']['url'] ,'icon') ?>
                            </div>
                            <div class="col">
                                <?php echo $content['value']['value_2']['content'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="item">
                        <div class="row align-items-center">
                            <div class="col-12">                                
                                <?php echo get_image( $content['value']['value_3']['image']['url'] ,'icon') ?>
                            </div>
                            <div class="col">
                                <?php echo $content['value']['value_3']['content'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="item">
                        <div class="row align-items-center">
                            <div class="col-12">                                
                                <?php echo get_image( $content['value']['value_4']['image']['url'] ,'icon') ?>
                            </div>
                            <div class="col">
                                <?php echo $content['value']['value_4']['content'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-info">
        <div class="container">
            <nav class="tabs">
                <div class="row align-items-end">
                    <div class="col">
                        <div class="tab tab-nav active" data-tab="tab-location" data-group="tab-info" >
                            Dónde ubicarnos
                        </div>
                    </div>
                    <div class="col">
                        <div class="tab tab-nav" data-tab="tab-directive"  data-group="tab-info" >
                            Nuestros Directivos
                        </div>
                    </div>
                    <div class="col">
                        <div class="tab tab-nav " data-tab="tab-investment"  data-group="tab-info" >
                            Información al inversionista
                        </div>
                    </div>
                </div>
            </nav>
            <div class="tab-block tab-item active" data-tab="tab-location"  data-group="tab-info" >
                <div class="block">
                    <div class="row">
                        <div class="col-4">
                            <div class="item active tab-nav tab-block" data-tab="tab-digital" data-group="tab-location">
                                <div class="row">
                                    <div class="col-12 trigger">
                                        <?php echo get_image( THEME_IMGS.'about-tab-1.png' ,'icon on') ?>
                                        <?php echo get_image( THEME_IMGS.'about-tab-1-off.png' ,'icon off') ?>
                                    </div>
                                    <div class="col-12">
                                        <h3 class="trigger"><i class="fas fa-angle-down"></i> Canales Digitales</h3>
                                        <div class="info">
                                            <div class="info-block">
                                                <div class="cell">
                                                    <div class="row align-items-center">
                                                        <div class="col-2 col-md-1">
                                                            <?php echo get_image( THEME_IMGS.'about-tab-phone.png' ,'icon-cell') ?>
                                                        </div>
                                                        <div class="col-10 col-md-11 text">
                                                            <?php get_link_content($content['channel']['card'],'link') ?> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <div class="row align-items-center">
                                                        <div class="col-2 col-md-1">
                                                            <?php echo get_image( THEME_IMGS.'about-tab-app.png' ,'icon-cell') ?>
                                                        </div>
                                                        <div class="col-10 col-md-11 text">
                                                            App mi Tarjeta Cencosud
                                                            <div class="download-icon">                                                            
                                                                <a href="<?php echo $content['channel']['app-store']['url'] ?>" target="_blank"><?php echo get_image(THEME_IMGS.'download-appstore.png','download-appstore') ?></a>
                                                                <a href="<?php echo $content['channel']['google-play']['url'] ?>" target="_blank"><?php echo get_image(THEME_IMGS.'download-googleplay.png','download-googleplay') ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <div class="row align-items-center">
                                                        <div class="col-2 col-md-1 ">
                                                            <?php echo get_image( THEME_IMGS.'about-tab-mail.png' ,'icon-cell') ?>
                                                        </div>
                                                        <div class="col-10 col-md-11 text">
                                                            <?php get_link_content($content['channel']['contact'],'link') ?> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="item tab-nav tab-block" data-tab="tab-traditional" data-group="tab-location">
                                <div class="row">
                                    <div class="col-12">
                                        <?php echo get_image( THEME_IMGS.'about-tab-2.png' ,'icon on') ?>
                                        <?php echo get_image( THEME_IMGS.'about-tab-2-off.png' ,'icon off') ?>
                                    </div>
                                    <div class="col-12">
                                        <h3><i class="fas fa-angle-down"></i>Canales Tradicionales </h3>
                                        <div class="info">
                                            <div class="info-block">
                                                <div class="cell">
                                                    <div class="row align-items-center">
                                                        <div class="col-2 col-md-1">
                                                            <?php echo get_image( THEME_IMGS.'about-tab-contact.png' ,'icon-cell') ?>
                                                        </div>
                                                        <div class="col-10 col-md-11 text">
                                                            <?php echo $content['traditional']['central'] ?> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <div class="row align-items-center">
                                                        <div class="col-2 col-md-1">
                                                            <?php echo get_image( THEME_IMGS.'about-tab-store.png' ,'icon-cell') ?>
                                                        </div>
                                                        <div class="col-10 col-md-11 text">
                                                            <?php echo $content['traditional']['agency'] ?> 
                                                        </div>   
                                                    </div>                                             
                                                </div>
                                                <div class="cell">
                                                    <div class="row align-items-center">
                                                        <div class="col-2 col-md-1">
                                                            <?php echo get_image( THEME_IMGS.'about-tab-agency.png' ,'icon-cell') ?>
                                                        </div>
                                                        <div class="col-10 col-md-11 text">
                                                            <?php echo $content['traditional']['main'] ?> 
                                                        </div>      
                                                    </div>                                               
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="item tab-nav tab-block" data-tab="tab-rrss" data-group="tab-location" >
                                <div class="row">
                                    <div class="col-12">
                                        <?php echo get_image( THEME_IMGS.'about-tab-3.png' ,'icon on') ?>
                                        <?php echo get_image( THEME_IMGS.'about-tab-3-off.png' ,'icon off') ?>
                                    </div>
                                    <div class="col-12">
                                        <h3><i class="fas fa-angle-down"></i> Redes <br>sociales </h3>
                                        <div class="info">
                                            <div class="info-block">
                                                <div class="cell">
                                                    <div class="row align-items-center">
                                                        <div class="col-2 col-md-1">
                                                            <?php echo get_image( THEME_IMGS.'about-tab-instagram.png' ,'icon-cell') ?>
                                                        </div>
                                                        <div class="col-10 col-md-11 text">
                                                            <?php get_link_content($content['rrss']['instagram'],'link') ?> 
                                                        </div>  
                                                    </div> 
                                                </div>
                                                <div class="cell">
                                                    <div class="row align-items-center">
                                                        <div class="col-2 col-md-1">
                                                            <?php echo get_image( THEME_IMGS.'about-tab-facebook.png' ,'icon-cell') ?>
                                                        </div>
                                                        <div class="col-10 col-md-11 text">
                                                            <?php get_link_content($content['rrss']['facebook'],'link') ?> 
                                                        </div>  
                                                    </div>                                                
                                                </div>  
                                                <div class="cell">
                                                    <div class="row align-items-center">
                                                        <div class="col-2 col-md-1">
                                                            <?php echo get_image( THEME_IMGS.'about-tab-tiktok.png' ,'icon-cell') ?>
                                                        </div>
                                                        <div class="col-10 col-md-11 text">
                                                            <?php get_link_content($content['rrss']['tiktok'],'link') ?> 
                                                        </div>  
                                                    </div>                                                
                                                </div>
                                            </div>
                                             
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-block tab-item "  data-tab="tab-directive"  data-group="tab-info" >
                <div class="block directive-block">
                <?php 
                $info = $content['team'];
                $info = preg_split('/\r\n|[\r\n]/',$info);
                if($info) {
                    foreach($info as $i) {
                        $i_dt=explode('-', $i);
                        echo '<div class="directive-item">'.$i_dt[0].' - <strong>'.$i_dt[1].'</strong></div>';
                    }
                }
                ?> 
                </div>
            </div>
            <div class="tab-block tab-item "  data-tab="tab-investment"  data-group="tab-info" >
                <div class="block">

                    <div class="investment-block">
                        <h3 class="tab-nav tab-accordeon active" data-tab="tab-investor"  data-group="tab-investor">
                            Principales accionistas
                            <i class="fas fa-angle-down"></i>
                        </h3>
                        <div class="tab-block active" data-tab="tab-investor"  data-group="tab-investor">
                            <?php echo $content['investment'] ?>
                        </div>
                    </div>

                    <div class="row about-files align-items-end">
                        <div class="col-6">
                            <label>Memoria Anual</label>                            
                        </div>
                        <div class="col-6">
                            <div class="about-selector-block">
                                <select class="about-selector" data-ref="memorial">
                                    <option value="">Seleccionar año</option>
                                    <?php foreach($years as $y){ ?>
                                        <option><?php echo $y->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>  
                        </div>
                    </div>
					<div class="about-files-block">
                        <?php foreach($docsM as $y=>$doc){ ?>
                            <div class="memorial-<?php echo $y ?>">
                                <?php foreach($doc as $d){ ?>
                                    <a href="<?php echo get_field('document',$d)['url'] ?>" target="_blank" class="link">
                                        <?php echo get_image( THEME_IMGS.'icon-pdf.png' ,'icon-item') ?>
                                        <?php echo $d->post_title ?>
                                    </a>
                                    <br>
                                <?php } ?>   
                            </div>
                        <?php } ?>  
                    </div>
					<hr>
                    <div class="row about-files align-items-end">
                        <div class="col-6">
                            <label>Informes Financieros</label>
                        </div>
                        <div class="col-6">
                            <div class="about-selector-block">
                                <select class="about-selector" data-ref="finantial">
                                    <option value="">Seleccionar año</option>
                                    <?php foreach($years as $y){ ?>
                                        <option><?php echo $y->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>                            
                        </div>
                    </div>
                    <div class="about-files-block">
                        <?php foreach($docsF as $y=>$doc){ ?>
                            <div class="finantial-<?php echo $y ?>">
                                <?php foreach($doc as $d){ ?>
                                    <a href="<?php echo get_field('document',$d)['url'] ?>" target="_blank" class="link">
                                        <?php echo get_image( THEME_IMGS.'icon-pdf.png' ,'icon-item') ?>
                                        <?php echo $d->post_title ?>
                                    </a>
                                    <br>
                                <?php } ?>   
                            </div>
                        <?php } ?>  
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <section class="about-work">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <?php echo get_image( $content['job']['image']['url'] ,'banner') ?>
                </div>
                <div class="col">
                    <div class="info">
                        <?php echo $content['job']['content'] ?>
                        <a href="<?php echo site_url('trabaja-con-nosotros') ?>" class="link">Descubre más</a>
                    </div>    
                </div>
            </div>
        </div>
    </section>
    
</div>

    <?php endwhile; ?>
<?php else: ?>
    <?php get_404_template(); ?>
<?php endif; ?>
<?php get_footer(); 
