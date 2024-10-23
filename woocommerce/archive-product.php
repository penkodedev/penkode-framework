<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Scrolling Text')) ?>
<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */

//do_action( 'woocommerce_before_main_content' );

?>

<section class="page-title">
         <div class="page-title-container"><h1><?php _e( 'Shop', 'foo' ); ?></h1></div>
    </section>
	
	 <main class="animate fadeIn" id="main-container">
		<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>	
		 
        <article id="container" class="news secondady primary">
        
            <nav class="productos-meta">

             <!-- Modal BEGIN -->
             <span id="modal-open"></span>
                        <div id="modal-window" class="modal">
                        <span class="modal-close"> X </span>
                            <div class="modal-content animate fadeInRight">
                                
                                <?php echo do_shortcode ('[wcpf_filters id="242"]'); ?>
                                <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Modal Content 01')) ?>
                            </div>
                        </div>
                        <!-- Modal END -->

                <?php echo do_shortcode("[product_categories_dropdown  hierarchical='1']"); ?>
                <?php do_action( 'woocommerce_before_shop_loop' ); //woocommerce ordering products ?>
				
            </nav>

            <?php if ( have_posts() ) : ?>

            <?php woocommerce_product_loop_start(); ?>
            <?php woocommerce_product_subcategories(); ?>
            <?php while ( have_posts() ) : the_post(); ?>
            <?php do_action( 'woocommerce_shop_loop' );?>
            <?php wc_get_template_part( 'content', 'product' ); ?>
            <?php endwhile; // end of the loop. ?>
            <?php woocommerce_product_loop_end(); ?>

            <?php do_action( 'woocommerce_after_shop_loop' );
			?>

            <?php elseif ( ! woocommerce_product_subcategories( array(
				'before' => woocommerce_product_loop_start( false ),
				'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

            <?php do_action( 'woocommerce_no_products_found' );?>
            <?php endif; ?>

        </article>
    </main>
    <?php get_footer( );