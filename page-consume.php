<?php
ob_start();

/*
* Template Name: Consumer Page
*/

get_header(); // Llama al encabezado de WordPress

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Sale si se accede directamente
}
?>

<!-- Preloader -->
<div id="preloader">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/loader.gif" alt="Cargando..." class="loader-logo">
</div>


<section class="page-title">
    <div class="page-title-container">
        <h1><?php the_title(); ?></h1>
    </div>
</section>

<main class="grid-main animate fadeIn" id="main-container">
	
	<?php if (function_exists('yoast_breadcrumb')) {
			yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
		} ?>
	
    <article class="grid-article">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile;
		else : ?>
		<?php endif; ?>
	</article>
    
    <section class="post-grid" id="api-posts">
        <!-- THE API ENDPOINT CONTENT WILL BE CONSUMED HERE BY AJAX -->
    </section>
</main>

<?php get_footer(); ?>



<!-- Script de consumo de la API -->
<script>
jQuery(document).ready(function ($) {
    $('#preloader').show();

    $.ajax({
        url: 'https://www.pauloramalho.com/wp-json/wp/v2/posts?per_page=12&_embed',
        type: 'GET',
        success: function (data) {
            var content = '';

            if (data.length > 0) {
                data.forEach(function (item) {
                    var image_url = '';
                    if (item._embedded && item._embedded['wp:featuredmedia']) {
                        var media = item._embedded['wp:featuredmedia'][0];
                        if (media.media_details && media.media_details.sizes && media.media_details.sizes.medium) {
                            image_url = media.media_details.sizes.medium.source_url;
                        }
                    }
                    image_url = image_url || 'https://penkode.com/framework/wp-content/themes/penkode-framework-2.2-beta/assets/images/no-image2.png';

                    // Convertir la fecha del post
                    var date = new Date(item.date);
                    var formattedDate = date.toLocaleDateString('es-ES', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });

                    // Construcción del contenido HTML
                    content += '<div class="post-col" id="grid-col-3" data-aos="zoom-in">' +
                        '<div class="grid-item">' +
                        '<figure><a title="' + item.title.rendered + '" href="' + item.link + '">' +
                        '<img src="' + image_url + '" alt="' + item.title.rendered + '">' +
                        '</a></figure>' +
                        '<div class="grid-item-content">' +
                        '<h5>' + item.title.rendered + '</h5>' +
                        //'<p>' + formattedDate + '</p>' + // Mostrar la fecha formateada
                        '<p>' + item.excerpt.rendered.split(" ").slice(0, 17).join(" ") + '...</p>' +
                        '<a href="' + item.link + '" class="button">Ver más</a>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                });

                $('#api-posts').append(content);
            } else {
                $('#api-posts').append('<p>Ninguna entrada disponible</p>');
            }

            $('#preloader').hide();
        },
        error: function (error) {
            console.error('AJAX request failed:', error);
            $('#api-posts').append('<p>Error al cargar las entradas. Por favor, intenta nuevamente más tarde.</p>');
            $('#preloader').hide();
        }
    });
});

</script>


<style>
#preloader {
    display: block;
    position: absolute;
    top: 100px;
    left: 0;
    width: 100%;
    height: 100%;
    /*background-color: rgba(255, 255, 255, 0.9);*/
    z-index: 9999;
}

.loader-logo {
    width: 360px;
    height: auto;
    position: absolute;
    top: 50%;
    left: 50%;
    filter: grayscale(100%); /* Convierte la imagen a blanco y negro */
    transform: translate(-50%, -50%);
    animation: fade 1.5s ease-in-out infinite;
}

@keyframes fade {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}
</style>