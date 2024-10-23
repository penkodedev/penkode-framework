<?php
ob_start();
/*
* Template Name: 
*/
get_header(); // Calls the WordPress Header

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<section class="page-title">
    <h1><?php the_title( );?> Tax</h1>
</section>

<main class="grid-main animate fadeIn" id="main-container">
    <article class="grid-article">
        <?php if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
        } ?>
        <div class="time"><?php the_time('j/F/Y'); ?></div>

        <div class="category-desc">
			<?php echo category_description(); ?>
			<div class="category-list">
				<?php wp_list_categories( array(
								'orderby'    => 'name',
								'title_li'   => '',
								'post_type'  => 'extension',
	 							'taxonomy'   => 'countries', // taxonomy name
								'show_count' => false,
								'hide_empty' => false,
								'exclude'    => array( )
							) ); ?>
			</div>
		</div>

    </article>

    <nav id="nav-single">
        <div class="pag-previous"><?php previous_post_link('%link', __('&laquo; Anterior', 'foo')); ?></div>
        <div class="pag-next"><?php next_post_link('%link', __('Siguiente &raquo;', 'foo')); ?></div>
    </nav>
</main>
<?php get_footer(); ?>