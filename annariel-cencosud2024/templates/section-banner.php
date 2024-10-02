<?php

$PAGE_ID=get_the_ID();
if( isset($pageParent) ) {
    $PAGE_ID=$pageParent->ID;
}

$content=get_page_banner($PAGE_ID);

$template=get_page_template_slug();

?>
<section class="page-banner" <?php echo $content['banner-desktop'] ?> >
    <?php 
        if( $video ) {
            echo '<div class="video-block">'.$video.'</div>';
            if($videoMb) {
                echo '<div class="video-block-mobile">'.$videoMb.'</div>';
            }
        }
    ?>
    <div class="container">
        <div class="block">
            <?php echo @$content['banner-subtitle'] ?>
            <?php echo @$content['banner-title'] ?>
            <?php echo @$content['banner-button'] ?>
            <?php echo @$content['banner-link'] ?>
            <?php if( isset($insurance_page) ){?>
                <button class="btn-search btn-search-insurance"><i class="fas fa-search"></i></button>
            <?php }?>
        </div> 
        <?php if( isset($insurance_page) ){?>       
        <div class="insurance-search">
            <form method="get" action="<?php echo site_url('buscador-de-seguros') ?>" class="insurance-search-form">
                <input type="text" name="search" class="input-text" placeholder="Buscar por seguro, coberturas, clínicas…" />
                <button type="submit" class="input-button">Buscar</button>
            </form>
        </div>
        <?php }?>
    </div>
    <div class="border-moon"></div>
</section>