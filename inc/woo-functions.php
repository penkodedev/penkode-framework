<?php

//************************* DECLARE WOOCOMERCE ON THEME ********************
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


//*************************Woocommerce Add CATEGORY DROPDOWN Shortcode ********************
add_shortcode( 'product_categories_dropdown', 'woo_product_categories_dropdown' );
function woo_product_categories_dropdown( $atts ) {
    
    // Attributes
    $atts = shortcode_atts( array(
        'hierarchical' => '0', // or '1'
        'hide_empty'   => '0', // or '1'
        'show_count'   => '0', // or '1'
        'depth'        => '2', // or Any integer number to define depth
        'orderby'      => 'order', // or 'name'
    ), $atts, 'product_categories_dropdown' );

    ob_start();

    wc_product_dropdown_categories( apply_filters( 'woocommerce_product_categories_shortcode_dropdown_args', array(
        'depth'              => $atts['depth'],
        'hierarchical'       => $atts['hierarchical'],
        'hide_empty'         => $atts['hide_empty'],
        'orderby'            => $atts['orderby'],
        'show_uncategorized' => 0,
        'show_count'         => $atts['show_count'],
    ) ) );

    ?>
    <script type='text/javascript'>
        jQuery(function($){
            var product_cat_dropdown = $(".dropdown_product_cat");
            function onProductCatChange() {
                if ( product_cat_dropdown.val() !=='' ) {
                    location.href = "<?php echo esc_url( home_url() ); ?>/?product_cat=" +product_cat_dropdown.val();
                }
            }
            product_cat_dropdown.change( onProductCatChange );
        });
    </script>
    <?php

    return ob_get_clean();
}

//************************* Customize NUMBER OF COLUMNS & IMAGE SIZE on shop and category pages ********************
function custom_woocommerce_layout() {
    add_filter('loop_shop_columns', 'custom_shop_columns', 999);
    function custom_shop_columns() {
        return 4; // Change this number to the DESIRED NUMBER OF COLUMNS
    }

    add_action('after_setup_theme', 'custom_product_thumbnail_size');
    function custom_product_thumbnail_size() {
        add_image_size('custom-product-thumbnail', 100, 100, true); // SET THE THUMBNAIL SIZE
    }
}

add_action('wp', 'custom_woocommerce_layout');