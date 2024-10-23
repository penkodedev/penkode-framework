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
		<h1><?php $post_type = get_post_type_object(get_post_type($post));
			echo $post_type->label; ?></h1>
	</section>

	<main class="grid-main animate fadeIn" id="main-container">
		<?php if (function_exists('yoast_breadcrumb')) {
			yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
		} ?>

		<section class="post-grid animate fadeIn one">
			<?php new WP_Query(array(
				'post_type' => 'cities',
				'has_archive' => true,
				'orderby' => 'ASC',
				'paged' => $paged,
			)); ?>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
						<div class="post-col" id="grid-col-3" data-aos="zoom-in"><!-- Choose number of columns with grid-col -->
						<div class="grid-item">
						<div class="grid-item-content">
								<h5>
									<?php the_title(); ?>
								</h5>
							</div>
							<figure><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('medium'); ?></a>
							</figure>
							<p class="grid-item-excerpt">
                                    <?php echo excerpt('15'); ?>
                                </p>
						</div>
					</div>
		
				<?php endwhile;
			else : ?>
				<p class="no-post-msj"><?php _e('Lo sentimos, ninguna entrada coincide con tus criterios de búsqueda. Utilize el menú de la parte superior para navegar por nuestra web.', 'foo'); ?></p>
			<?php endif; ?>
		</section>

		<nav class="pagination">
			<?php echo paginate_links(); ?>
		</nav>

	</main>
	<?php get_footer(); ?>