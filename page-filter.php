<?php
ob_start();
/*
* Template Name: Page Filter
*/
get_header(); // Calls the WordPress Header

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
        // Get the selected taxonomy terms from the URL query parameters
        $news_category = isset( $_GET['news_category'] ) ? $_GET['news_category'] : '';
        $news_location = isset( $_GET['news_location'] ) ? $_GET['news_location'] : '';

        // Build the WP_Query arguments based on the selected taxonomies
        $args = array(
            'post_type' => 'news',
            'tax_query' => array(
                'relation' => 'AND',
            ),
            'paged' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
        );

        if ( ! empty( $news_category ) ) {
            $args['tax_query'][] = array(
                'taxonomy' => 'news_category',
                'field' => 'slug',
                'terms' => $news_category,
            );
        }

        if ( ! empty( $news_location ) ) {
            $args['tax_query'][] = array(
                'taxonomy' => 'news_location',
                'field' => 'slug',
                'terms' => $news_location,
            );
        }

        // Run the query
        $query = new WP_Query( $args );

        // Display the search form
        ?>
        <form method="get">
            <label for="news_category">News Category:</label>
            <select id="news_category" name="news_category">
                <option value="">-- Select --</option>
                <?php
                $categories = get_terms( array(
                    'taxonomy' => 'news_category',
                    'hide_empty' => false,
                ) );
                foreach ( $categories as $category ) {
                    printf( '<option value="%s" %s>%s</option>', esc_attr( $category->slug ), selected( $news_category, $category->slug ), esc_html( $category->name ) );
                }
                ?>
            </select>

            <label for="news_location">News Location:</label>
            <select id="news_location" name="news_location">
                <option value="">-- Select --</option>
                <?php
                $locations = get_terms( array(
                    'taxonomy' => 'news_location',
                    'hide_empty' => false,
                ) );
                foreach ( $locations as $location ) {
                    printf( '<option value="%s" %s>%s</option>', esc_attr( $location->slug ), selected( $news_location, $location->slug ), esc_html( $location->name ) );
                }
                ?>
            </select>

            <input type="submit" value="Search">
        </form>

        <?php
        // Display the News posts
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
                // Output the News post content here
            }
            // Display pagination links
            the_posts_pagination();
        } else {
            // If there are no results, display a message
            echo '<p>No news found.</p>';
        }

        wp_reset_postdata();
        ?>

<?php echo do_shortcode('[wpb_childpages]'); ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
