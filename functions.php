<?php


function load_stylesheets()
{

    //Default style sheet file needed for custom WP themes
    wp_register_style('default-css', get_template_directory_uri() . '/style.css', '', 1, 'all');
    wp_enqueue_style('default-css');

    //Main style sheet for general css styles
    wp_register_style('main', get_template_directory_uri() . '/css/main.css', '', 1, 'all');
    wp_enqueue_style('main');

    //Bootstrap css via CDN
    wp_enqueue_style('bootstrap-cdn-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css' );

    //Bootstrap icons CDN
    wp_enqueue_style('bootstrap-cdn-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css' );

    //Desktop header/nav css
    wp_register_style('header', get_template_directory_uri() . '/css/header.css', '', 1, 'all');
    wp_enqueue_style('header');

    //Mobile header/nav css
    wp_register_style('header_mobile', get_template_directory_uri() . '/css/header_mobile.css', '', 1, 'all');
    wp_enqueue_style('header_mobile');

    //Footer css styles
    wp_register_style('footer', get_template_directory_uri() . '/css/footer.css', '', 1, 'all');
    wp_enqueue_style('footer');

    //Custom CSS styles and overrides for woocommerce styles
    wp_register_style('woocommerce', get_template_directory_uri() . '/css/woocommerce.css', '', 1, 'all');
    wp_enqueue_style('woocommerce');



    //Google font
    wp_enqueue_style('font', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet', false);

    
}
add_action('wp_enqueue_scripts', 'load_stylesheets');




function load_javascript()
{
    //Default js file needed for custom WP themes
    wp_register_script('default-js', get_template_directory_uri() . '/app.js', 'jquery', 1, true);
    wp_enqueue_script('default-js');

    //Handles burger icon and menu opening on mobile screens
    wp_register_script('menu', get_template_directory_uri() . '/js/menu.js', 'jquery', 1, true);
    wp_enqueue_script('menu');

    //Bootstrap js via CDN
    wp_enqueue_script( 'bootstrap-cdn-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js' );

    //JQuery dependency via CDN
    wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.6.0.min.js' );


}
add_action('wp_enqueue_scripts', 'load_javascript');


//Adds function support
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');
add_theme_support('align-wide');

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

//Woocommerce support
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

//Removes "Add to Cart" buttons from the shop archives and category pages
add_action( 'woocommerce_after_shop_loop_item', 'remove_add_to_cart_buttons', 1 );

    function remove_add_to_cart_buttons() {
      if( is_product_category() || is_shop()) { 
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
      }
    }



//Adds image size options
add_image_size('blog-archive-thumbnail', 3000, 300, true);
add_image_size('blog-post-thumbnail', 2000, 400, true);




//Register navigation menus
register_nav_menus(

    array(
        'top-menu' => 'Top Menu Location',
        'footer-menu' => 'Footer Menu Location',
    )
);








//Ensure cart contents update when products are added to the cart via AJAX
function update_cart_counter( $fragments ) {
 
    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?><a href = "<?php echo WC()->cart->get_cart_url(); ?>" title = "<?php _e( 'View your shopping cart' ); ?>"><?php
    if ( $count > 0 ) {
        ?>
        <span class="cart-counter"><?php echo esc_html( $count ); ?></span>
        <?php            
    }
        ?></a><?php
 
    $fragments['.cart-icon a .cart-counter'] = ob_get_clean(); //only targets the number in the span tag
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'update_cart_counter' );



// Show only lowest prices in WooCommerce variable products

add_filter( 'woocommerce_variable_sale_price_html', 'wpglorify_variation_price_format', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'wpglorify_variation_price_format', 10, 2 );
 
function wpglorify_variation_price_format( $price, $product ) {
 
// Main Price
$prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
$price = $prices[0] !== $prices[1] ? sprintf( __( 'From %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
 
// Sale Price
$prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
sort( $prices );
$saleprice = $prices[0] !== $prices[1] ? sprintf( __( 'From %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
 
if ( $price !== $saleprice ) {
$price = '<del>' . $saleprice . $product->get_price_suffix() . '</del> <ins>' . $price . $product->get_price_suffix() . '</ins>';
}
return $price;
}


?>
