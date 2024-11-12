<?php
ob_start();

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header(); // Calls the WordPress Header
?>

<section class="page-title">
    <div class="page-title-container">
        <h1><?php the_title(); ?>adfadfadf</h1>
    </div>
</section>

<main class="grid-main animate fadeIn" id="main-container">
    <?php if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    } ?>

    <article class="grid-article">
        <?php if ( have_posts() ) : 
            while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; 
        else : ?>
            <p><?php _e('Lo sentimos, no hay contenido disponible.', 'tu-text-domain'); ?></p>
        <?php endif; ?>
    </article>
</main>

<?php get_footer(); // Omit closing PHP tag to avoid "headers already sent" issues. ?>