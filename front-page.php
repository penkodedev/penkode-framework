<?php
ob_start();
/*
* Template Name: Index Full Width
*/
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header(); // Calls the WordPress Header

// Include home slider only on front page
if ( is_front_page() ) {
    get_template_part( 'template-parts/home-slider' );
}
?>

<main class="grid-main animate fadeIn" id="main-container">
    <section class="section-01">
        <article id="article">
            <?php 
            if ( have_posts() ) : 
                while ( have_posts() ) : the_post(); 
                    the_content(); 
                endwhile; 
            else : 
                // Optionally, you can add a message for no posts found
                // echo '<p>No content available.</p>';
            endif; 
            ?>
        </article>
    </section>

    <h1 class="blog-highlights-title">Blog Highlights</h1>
    <?php get_template_part( 'template-parts/carousel-posts' ); ?>

    <section class="section-03">
        <article id="article">
            <!-- Content for section-03 can be added here -->
        </article>
    </section>
</main>

<?php get_footer(); ?>
