<?php get_header();?>

<div class = "container">

<h1 class = "text-center title"><?php single_cat_title();?></h1>

</div>




<div class = "content">

    
    <div class = "container">
        <?php if(have_posts()) : while(have_posts()) : the_post();?>

        <div class = "row archive-header">
            <div class = "col-lg-12">
            <a class = "blog-link" href = "<?php the_permalink();?>">
                <div class = "archive-bg" style = "background-image: url('<?php the_post_thumbnail_url('blog-archive-thumbnail');?>');">
                    <div class = "overlay d-flex justify-content-center align-items-center">
                            <h2 class = "text-center"><?php the_title();?></h2>
                    </div>
                </div>
            </a>
            </div>

        </div>

            

        <?php endwhile; else: endif;?>
    </div>



        <div class = "container text-center paginate">
        <?php
            global $wp_query;

            $big = 999999999; // need an unlikely integer

            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $wp_query->max_num_pages,
                'prev_text'          => __( '&laquo; NEWER' ),
                'next_text'          => __( 'OLDER &raquo;' ),
                
            ) );
        ?>
        </div>

    



</div>

<?php get_footer();?>