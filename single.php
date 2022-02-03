<?php get_header();?>


<div class = "container post-title">

<h1 class = "text-center title"><?php the_title();?></h1>

</div>


<div class = "content">

        <?php if(have_posts()) : while(have_posts()) : the_post();?>

            <div class = "container">

            <div class = "d-flex align-items-center justify-content-center">
                <img src = "<?php the_post_thumbnail_url('blog-post-thumbnail');?>" alt = "" class = "img-fluid">
            </div>
            <p class = "text-end pub-date">
                <?php echo get_the_date(); echo " by "; echo get_the_author();?>
            </p>

            <?php the_content();?>

        </div>

        <?php endwhile; else: endif;?>


</div>

<div class = "container">
    
    <div class = "post-nav">
        <?php next_post_link('%link', "&laquo Next Post")?>
        <?php echo " | ";?>
        <?php previous_post_link('%link', "Previous Post &raquo")?>
        
    </div>

    

    <?php $categories = get_the_category();
            foreach ($categories as $category) : endforeach; ?>

    <a class = "back-link" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"> &laquo; Back To Blog </a>

    


</div>



<?php get_footer();?>