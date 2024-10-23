<?php
/*
Template Name: Single API Post
*/
get_header(); // Llama al encabezado de WordPress

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Sale si se accede directamente
}

// Obtener el ID del post de la API desde la query variable
$api_post_id = get_query_var('api_post_id');
$api_post_id = intval($api_post_id);

if ($api_post_id) {
    $api_url = 'https://www.pauloramalho.com/wp-json/wp/v2/posts/' . $api_post_id;

    $response = wp_remote_get($api_url);
    if (is_wp_error($response)) {
        echo '<p>Error en la solicitud a la API.</p>';
    } else {
        $body = wp_remote_retrieve_body($response);
        $post_data = json_decode($body);

        if (json_last_error() === JSON_ERROR_NONE && $post_data) {
            ?>

            <section class="page-title">
                <h1><?php echo esc_html($post_data->title->rendered); ?></h1>
            </section>

            <main class="grid-main animate fadeIn" id="main-container">
                <article class="grid-article">
                    <div class="time"><?php echo esc_html(date('j/F/Y', strtotime($post_data->date))); ?></div>
                    <figure class="post-image">
                        <?php
                        if (!empty($post_data->_embedded->{'wp:featuredmedia'})) {
                            $media = $post_data->_embedded->{'wp:featuredmedia'}[0];
                            $image_url = $media->media_details->sizes->medium->source_url;
                            echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($post_data->title->rendered) . '">';
                        }
                        ?>
                    </figure>
                    <div class="content">
                        <?php echo wp_kses_post($post_data->content->rendered); ?>
                    </div>
                </article>
            </main>

            <?php
        } else {
            echo '<p>Post no encontrado o error en el formato de la respuesta de la API.</p>';
        }
    }
} else {
    echo '<p>ID del post no especificado.</p>';
}

get_footer(); // Llama al pie de página de WordPress
