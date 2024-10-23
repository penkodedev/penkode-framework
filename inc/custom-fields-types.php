<?php

//*-------------------------------------------------
//*      "Author Custom Field" for News CPT
//*-------------------------------------------------

// FUNCTION TO SHOW META BOX CONTENT
function news_author_meta_callback($post) {
    wp_nonce_field(basename(__FILE__), 'news_author_nonce');
    $news_author = get_post_meta($post->ID, 'news_author', true);
    echo '<label for="news_author_field">'.__('Author Name - ', 'textdomain').'</label>';
    echo '<input type="text" id="news_author_field" name="news_author_field" value="'.esc_attr($news_author).'" size="25" />';
}

// SAVE THE VALUES OF CUSTOM FIELDS
function save_news_custom_fields($post_id) {
    if (!isset($_POST['news_author_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['news_author_nonce'], basename(__FILE__))) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_POST['news_author_field'])) {
        update_post_meta($post_id, 'news_author', sanitize_text_field($_POST['news_author_field']));
    }
}
add_action('save_post_news', 'save_news_custom_fields');


//*-------------------------------------------------
//*      "Location" for Cities CPT
//*-------------------------------------------------


// Step 1: Create a Meta Box
add_action('add_meta_boxes', 'city_meta_box');

function city_meta_box() {
    add_meta_box(
        'city_google_info',
        'Google Information',
        'city_google_info_callback',
        'cities',
        'normal',
        'high'
    );
}

// Step 2: Meta Box Callback Function
function city_google_info_callback($post) {
    // Add your HTML structure here
    ?>
    <label for="city_address">City Address:</label>
    <input type="text" id="city_address" name="city_address" style="width: 100%;" value="<?php echo esc_attr(get_post_meta($post->ID, 'city_address', true)); ?>">
    <button id="get_map">Get Map</button>
    <div id="map_canvas" style="width: 100%; height: 300px;"></div>
    <script>
        jQuery(document).ready(function ($) {
            var input = document.getElementById('city_address');
            var mapCanvas = document.getElementById('map_canvas');
            var getMapButton = document.getElementById('get_map');

            var mapOptions = {
                center: new google.maps.LatLng(0, 0),
                zoom: 2,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var map = new google.maps.Map(mapCanvas, mapOptions);

            var marker = new google.maps.Marker({
                position: mapOptions.center,
                map: map,
                draggable: true
            });

            var autocomplete = new google.maps.places.Autocomplete(input, { types: ['geocode'] });

            autocomplete.bindTo('bounds', map);

            autocomplete.addListener('place_changed', function () {
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    console.error('Place details not available for input: ' + input.value);
                    return;
                }

                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                }

                marker.setPosition(place.geometry.location);
            });

            getMapButton.addEventListener('click', function () {
                var address = input.value;
                if (address !== '') {
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({ 'address': address }, function (results, status) {
                        if (status == 'OK') {
                            var location = results[0].geometry.location;
                            map.setCenter(location);
                            marker.setPosition(location);
                        } else {
                            console.error('Geocode was not successful for the following reason: ' + status);
                        }
                    });
                }
            });
        });
    </script>
    <?php
}



// Step 3: Enqueue Google Maps API
function enqueue_google_maps() {
    wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDhYFofX3EFznkUG5wYO20Icj9mR_Dv29I', array(), null, true);
}

add_action('admin_enqueue_scripts', 'enqueue_google_maps');

// Step 4 (continued): Enqueue Google Maps JavaScript
function enqueue_google_maps_script() {
    wp_enqueue_script('google-maps-script', get_template_directory_uri() . '/js/google-maps-script.js', array('jquery'), null, true);
}

add_action('admin_enqueue_scripts', 'enqueue_google_maps_script');

// Step 5: Save Meta Box Data
function save_city_google_info($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (isset($_POST['city_address'])) {
        update_post_meta($post_id, 'city_address', sanitize_text_field($_POST['city_address']));
    }
}

add_action('save_post', 'save_city_google_info');
?>
