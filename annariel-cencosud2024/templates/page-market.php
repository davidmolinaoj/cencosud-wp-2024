<?php
/**
 * Template Name: Page - Comportamiento de Mercado
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */
get_header(); 


if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();

        $page_info=get_page_banner( get_the_ID() ); 
        $page_content=$page_info['content'];
        
?>
<div class="market-page"> 

    <?php get_template_part('templates/section-banner'); ?>
        
    <section class="market-best" >
        <div class="container">
            <h2 class="title-h">
                <?php echo $page_content['code']['title'] ?>
            </h2>
            <?php echo $page_content['code']['content'] ?>            
        </div>
    </section>
    
    <section class="market-pep" >
        <div class="container">
            <h2 class="title-h">
                <?php echo $page_content['pep']['title'] ?>
            </h2> 
            <div class="dialog">
                <?php echo $page_content['pep']['content'] ?>
            </div>            
        </div>
    </section>

    
    <section class="market-card" >
        <div class="container">
            <h2 class="title-h">
                Tarjetas <strong>de Crédito</strong>
            </h2>

            <div class="tab-block">
                <div class="tab-nav-block">
                    <nav class="tab-nav row">
                        <a href="#tab-1" class="link col active">
                            <span><?php echo $page_content['card-tax']['title'] ?></span>
                        </a>      
                        <a href="#tab-2" class="link col">
                            <span><?php echo $page_content['card-info']['title'] ?></span>
                        </a>
                        <a href="#tab-3" class="link col">
                            <span><?php echo $page_content['card-other']['title'] ?></span>
                        </a>              
                    </nav>
                </div>

                <div class="tab-panel">
                    <div class="panel active" id="tab-1">        
                        <?php echo $page_content['card-tax']['content'] ?>
                    </div>
                    <div class="panel" id="tab-2">        
                        <?php echo $page_content['card-info']['content'] ?>
                    </div>
                    <div class="panel" id="tab-3">        
                        <?php echo $page_content['card-other']['content'] ?>    
                    </div>
                </div>
            </div>

        </div>
    </section>
    
    <section class="market-system" >
        <div class="container">
            <h2 class="title-h"><?php echo $page_content['finantial']['title'] ?></h2>
            <?php echo $page_content['finantial']['content'] ?>
        </div>
    </section>
    
    <section class="market-preferential" >
        <div class="container">
            <h2 class="title-h"><?php echo $page_content['preferential']['title'] ?></h2>            
            <div class="dialog">
                <?php echo $page_content['preferential']['content'] ?>
            </div>            
        </div>
    </section>

    <section class="market-rule" >
        <div class="container">
            <h2 class="title-h"><?php echo $page_content['rule']['title'] ?></h2>
            <?php echo $page_content['rule']['content'] ?>
        </div>
    </section>

    <section class="market-protection" >
        <div class="container">
            <h2 class="title-h"><?php echo $page_content['protection']['title'] ?></h2>

            <div class="row">
                <div class="col-lg-6">
                    <div class="accordeon">
                        <?php 
                        $page=ceil( count($page_content['protection']['items']) /2);
                        foreach(array_slice($page_content['protection']['items'],0, $page) as $item){ ?>
                        <div class="item">
                            <div class="item">
                                <div class="label">
                                    <i class="fas fa-angle-up icon"></i>
                                    <?php echo $item['title'] ?>
                                </div>
                                <div class="text">
                                    <?php echo $item['content'] ?>
                                </div>
                            </div>
                        </div> 
                        <?php } ?>
                    </div>          
                </div>
                <div class="col-lg-6">
                    <div class="accordeon">
                        <?php 
                        $page=ceil( count($page_content['protection']['items']) /2);
                        foreach(array_slice($page_content['protection']['items'], $page ) as $item){ ?>
                        <div class="item">
                            <div class="item">
                                <div class="label">
                                    <i class="fas fa-angle-up icon"></i>
                                    <?php echo $item['title'] ?>
                                </div>
                                <div class="text">
                                    <?php echo $item['content'] ?>
                                </div>
                            </div>
                        </div> 
                        <?php } ?>
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
