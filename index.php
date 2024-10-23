<?php
ob_start();

get_header(); // Calls the WordPress Header

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

    <section class="page-title"><h1><?php _e( 'Blog', 'penkode' ); ?></h1></section>

    <main class="grid-main animate fadeIn" id="main-container">
        <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>

        <section class="post-grid">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="post-col" id="grid-col-3" data-aos="zoom-in"><!-- Choose number of columns with grid-col -->
                <div class="grid-item">
                    <figure><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('large'); ?></a>
                    </figure>
                    <div class="grid-item-content">
                        <h5>
                            <?php the_title(); ?>
                        </h5>
                        <time class="time">
									<?php the_time('j/F/Y'); ?>
						</time>
                        <p class="grid-item-excerpt">
                            <?php echo excerpt('24'); ?>
                        </p>

                        <a class="button" href="<?php the_permalink(); ?>"><?php _e('leer más', 'penkode' ); ?></a>
                    </div>
                </div>
            </div>
            
            <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.', 'penkode' ); ?></p>
        <?php endif; ?>

            <nav class="pagination">
                <?php echo paginate_links( ); ?>
            </nav>

        </section>
        
    </main>

<?php get_footer(); ?>