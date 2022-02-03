<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php wp_title(' | ', 'echo', 'right'); ?><?php bloginfo('name'); ?></title>

    <?php wp_head();?>

    <meta name="viewport" content="width=device-width,initial-scale=1.0">

</head>
<body <?php body_class();?>>



<header>

    <div class = 'container-fluid'>
        
        <a href = "<?php bloginfo('url');?>">
            <img src = "<?php bloginfo('template_directory');?>/images/banner.png" 
            alt = 'banner image' class = "img-fluid banner" />
        </a>

        <div class = "cart-icon d-flex justify-content-end">

            <?php if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins' ) ) ) ) 
            {
                $count = WC()->cart->cart_contents_count;?>

                <a href = "<?php echo WC()->cart->get_cart_url(); ?>" 
                title = "<?php _e( 'View your shopping cart' ); ?>"> 
                    <i class="bi bi-cart2" style="font-size: 1.5rem;"></i>
                    <?php 
                    if ( $count > 0 ) { ?>
                    
                    <span class="cart-counter"><?php echo esc_html( $count ); ?></span>
                    
                    <?php } ?>

                </a>

            <?php } ?>

        </div>
        


    
    </div>

    <div class="burger">
        <div class = "line1"></div>
        <div class = "line2"></div>
        <div class = "line3"></div>
	</div>

    <div class = 'container nav'>

        <?php 
        wp_nav_menu(

            array(

                'theme_location' => 'top-menu',
                'menu_class' => 'top-menu')
            );?>


    </div>


</header>
