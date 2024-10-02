<?php 
/**
 * @package annariel-cencosud2023 Resultados Esperados
 * @subpackage archive
 */
get_header(); 

//get term data
$term = get_queried_object();  

?>
<div class="page-content archive-content" >  
    
    <section class="page-banner" <?php echo $img?'style="background-image: url('.$img[0].')"':'' ?> >
        <div class="container">
            <div class="block">
                <div class="row">                                
                    <div class="offset-1 col-10 col-md-8 col-md-5">
                        <?php if ( is_category() || is_tag() ) {
                                echo '<h1 class="archive-title">'.$term->name.'</h1>';
                        } else { ?>
                            <h1 class="archive-title">							
                                <?php
                                    if ( is_author() ) :
                                            /* Queue the first post, that way we know
                                                    * what author we're dealing with (if that is the case).
                                            */
                                            the_post();
                                            printf( ___( 'Author: %s'), '<span class="vcard">' . get_the_author() . '</span>' );
                                            /* Since we called the_post() above, we need to
                                                    * rewind the loop back to the beginning that way
                                                    * we can run the loop properly, in full.
                                                    */
                                            rewind_posts();

                                    elseif ( is_day() ) :
                                            printf( ___( 'Day: %s'), '<span>' . get_the_date() . '</span>' );

                                    elseif ( is_month() ) :
                                            printf( ___( 'Month: %s'), '<span>' . get_the_date( 'F Y' ) . '</span>' );

                                    elseif ( is_year() ) :
                                            printf( ___( 'Year: %s'), '<span>' . get_the_date( 'Y' ) . '</span>' );

                                    elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                                            __e( 'Resultados Esperados - Asides');

                                    elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                                            __e( 'Resultados Esperados - Images');

                                    elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
                                            __e( 'Resultados Esperados - Videos');

                                    elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
                                            __e( 'Resultados Esperados - Quotes');

                                    elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
                                            __e( 'Resultados Esperados - Links');
                                    else :
                                            __e( 'Resultados Esperados');

                                    endif;
                                ?>
                            </h1>
                        <?php } ?>
                    </div>                        
                </div>
            </div>
        </div>
    </section>
    
    <section class="container">
        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
            <?php if(function_exists('bcn_display'))
            {
                bcn_display();
            }?>
        </div>
    </section>
    
    <div class="container archive-service">
        <?php 
            if ( have_posts() ) : 
                while ( have_posts() ) : 
                    the_post();

                    $img= wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large');

                    ?>
                <article class="article">
                    <?php if($img) { ?>
                        <a href="<?php echo get_permalink() ?>" class="article-image">
                            <img src="<?php echo $img[0] ?>" alt="<?php the_title()?>" />
                        </a>
                    <?php } ?>
                    <div class="article-block">
                        <div class="block">
                            <h2 class=" mb-2"><a href="<?php echo get_permalink() ?>"><?php the_title()?></a></h2>
                            <div class="text"><?php the_excerpt() ?></div>
                        </div>
                    </div>
                </article>    
                    <?php  

                endwhile; // end of the loop. 

                the_posts_pagination( array(
                        'mid_size' => 2,
                        'prev_text' => ___( '&laquo;', 'textdomain' ),
                        'next_text' => ___( '&raquo;', 'textdomain' ),
                ) );

            else:
                get_template_part( 'templates/empty' ); // loading our custom file    
            endif;
        ?>
    </div>    
</div>
<?php 
get_footer(); 
