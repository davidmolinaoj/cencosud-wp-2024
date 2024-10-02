<?php 
/**
 * @package annariel-cencosud2023
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
                                            __e( 'Asides');

                                    elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                                            __e( 'Images');

                                    elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
                                            __e( 'Videos');

                                    elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
                                            __e( 'Quotes');

                                    elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
                                            __e( 'Links');
                                    else :
                                            __e( 'Publicaciones');

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
    <div class="container archive-publish">
        <div class="row">
            <div class="col-12 col-lg-8">
                <?php 
                    if ( have_posts() ) : 
                        while ( have_posts() ) : 
                            the_post();
                            $img= wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium');
                            
                            ?>
                        <article class="article pt-3 pb-3">
                            <div class="row">
                                <div class="col-2 col-md-1 date">
                                    <a href="<?php echo get_permalink() ?>" class="icon">
                                        <i class="far fa-file-pdf"></i>
                                    </a>
                                </div>
                                <div class="col-10 col-md-11">
                                    <h2 class=" mb-2"><a href="<?php echo get_permalink() ?>"><?php the_title()?></a></h2>
                                    <div class="text mb-2"><?php the_excerpt() ?></div>

                                    <div class="control">
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-2">
                                                <a href="<?php echo get_permalink() ?>" class="link"><i class="fa fa-arrow-right"></i>&nbsp;<?php __e('Ver más')?></a>
                                            </div>
                                            <div class="col-12 col-md-6 text-right">
                                                <?php echo get_social_code() ?>     
                                            </div>
                                        </div>
                                    </div>
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
            <div class="col-12 col-lg-4 pt-2">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>    
</div>
<?php 
get_footer(); 
