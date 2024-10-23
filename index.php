<?php
ob_start();

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header(); // Calls the WordPress Header
?>

<section class="page-title">
    <h1><?php esc_html_e( 'Blog', 'penkode' ); ?></h1>
</section>

<main class="grid-main animate fadeIn" id="main-container">
    <?php if ( function_exists( 'yoast_breadcrumb' ) ) {
        yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
    } ?>

    <section class="post-grid">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="post-col" id="grid-col-3" data-aos="zoom-in"><!-- Choose number of columns with grid-col -->
                <div class="grid-item">
                    <figure>
                        <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail( 'large' ); ?>
                        </a>
                    </figure>
                    <div class="grid-item-content">
                        <h5><?php the_title(); ?></h5>
                        <time class="time" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                            <?php echo esc_html( get_the_date( 'j/F/Y' ) ); ?>
                        </time>
                        <p class="grid-item-excerpt">
                            <?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?>
                        </p>

                        <a class="button" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Leer más', 'penkode' ); ?></a>
                    </div>
                </div>
            </div>

        <?php endwhile; else : ?>
            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'penkode' ); ?></p>
        <?php endif; ?>
    </section>

    <nav class="pagination">
        <?php
        // Use paginate_links for pagination
        echo paginate_links();
        ?>
    </nav>
</main>

<?php get_footer(); ?>