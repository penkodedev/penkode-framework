<?php

function custom_patterns() {
    $podcast_embed = "<!-- wp:group {\"align\":\"wide\",\"backgroundColor\":\"black\",\"className\":\"podcast-embed\"} -->\n<div class=\"wp-block-group alignwide podcast-embed has-black-background-color has-background\"><!-- wp:spacer {\"height\":46} -->\n<div style=\"height:46px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:embed {\"url\":\"https://open.spotify.com/episode/5yuiJNugd6LupxUH2p4FmH?si=HOuq8K5sTIWcB_MX0LraNA\\u0026dl_branch=1\",\"type\":\"rich\",\"providerNameSlug\":\"spotify\",\"responsive\":true,\"className\":\"wp-embed-aspect-21-9 wp-has-aspect-ratio\"} -->\n<figure class=\"wp-block-embed is-type-rich is-provider-spotify wp-block-embed-spotify wp-embed-aspect-21-9 wp-has-aspect-ratio\"><div class=\"wp-block-embed__wrapper\">\nhttps://open.spotify.com/episode/5yuiJNugd6LupxUH2p4FmH?si=HOuq8K5sTIWcB_MX0LraNA\&amp;dl_branch=1\n</div></figure>\n<!-- /wp:embed -->\n\n<!-- wp:buttons {\"contentJustification\":\"center\",\"align\":\"wide\"} -->\n<div class=\"wp-block-buttons alignwide is-content-justification-center\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">Apple Podcasts</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">Spotify</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">Overcast</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">RSS</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->\n\n<!-- wp:spacer {\"height\":63} -->\n<div style=\"height:63px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer --></div>\n<!-- /wp:group -->";
    $cta = "<!-- wp:group {\"align\":\"wide\",\"style\":{\"color\":{\"gradient\":\"linear-gradient(160deg,rgb(0,0,0) 0%,rgb(53,97,116) 49%,rgb(0,0,0) 100%)\"}},\"textColor\":\"white\"} -->\n<div class=\"wp-block-group alignwide has-white-color has-text-color has-background\" style=\"background:linear-gradient(160deg,rgb(0,0,0) 0%,rgb(53,97,116) 49%,rgb(0,0,0) 100%)\"><!-- wp:spacer {\"height\":27} -->\n<div style=\"height:27px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:columns {\"verticalAlignment\":\"center\",\"align\":\"wide\"} -->\n<div class=\"wp-block-columns alignwide are-vertically-aligned-center\"><!-- wp:column {\"verticalAlignment\":\"center\",\"width\":\"66.66%\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\" style=\"flex-basis:66.66%\"><!-- wp:heading -->\n<h2>Ready to get Started?</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Click the button to schedule your FREE 30 minute consult.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\",\"width\":\"33.33%\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\" style=\"flex-basis:33.33%\"><!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"backgroundColor\":\"white\",\"textColor\":\"black\"} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-black-color has-white-background-color has-text-color has-background\">Schedule Now</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:spacer {\"height\":27} -->\n<div style=\"height:27px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer --></div>\n<!-- /wp:group -->";
    $penkode_pat = "<!-- wp:group {\"backgroundColor\":\"cyan-bluish-gray\",\"layout\":{\"type\":\"constrained\"}} -->\n\n<div class=\"wp-block-group has-cyan-bluish-gray-background-color has-background\"><!-- wp:columns {\"verticalAlignment\":null,\"className\":\"padd40\"} -->\n\n<div class=\"wp-block-columns padd40\"><!-- wp:column {\"verticalAlignment\":\"center\"} -->\n\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:heading -->\n\n<h2 class=\"wp-block-heading\">This is my first pattern<\/h2>\n\n<!-- \/wp:heading -->\n\n\n\n<!-- wp:paragraph -->\n\n<p>You can click in the botton to see how I've created this beautiful WordPress Pattern.<\/p>\n\n<!-- \/wp:paragraph --><\/div>\n\n<!-- \/wp:column -->\n\n\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:buttons {\"layout\":{\"type\":\"flex\",\"justifyContent\":\"center\"}} -->\n\n<div class=\"wp-block-buttons\"><!-- wp:button -->\n\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link wp-element-button\">Click here to discover<\/a><\/div>\n\n<!-- \/wp:button --><\/div>\n\n<!-- \/wp:buttons --><\/div>\n\n<!-- \/wp:column --><\/div>\n\n<!-- \/wp:columns --><\/div>\n\n<!-- \/wp:group -->";
    

    register_block_pattern( 
        'custom-patterns/penkode-pat', // The Name of the Pattern
        array( 
            'title' => __( "Penkode Pat", 'foo' ),
            'description' => _x( 'My first pattern', 'foo' ),
            'content' => $penkode_pat,
            'categories' => array( 'penkode' ),
        )
    );
    
    
    
    register_block_pattern( 
        'custom-patterns/podcast-embed', // The Name of the Pattern
        array( 
            'title' => __( "Podcast Embed", 'foo' ),
            'description' => _x( 'A set of blocks that embed a Spotify podcast episode with buttons', 'foo' ),
            'content' => $podcast_embed,
            'categories' => array( 'penkode' ),
        )
    );


    register_block_pattern( 
        'custom-patterns/cta', // The Name of the Pattern
        array( 
            'title' => __( "My Call to Action", 'foo' ),
            'description' => _x( 'a 2-column CTA with button', 'foo' ),
            'content' => $cta,
            'categories' => array( 'penkode', 'material' ),
        )
    );
}

add_action( 'init', 'custom_patterns' );



/**** REGISTERING BLOCK PATTERNS CATEGORIES *****/

function register_custom_block_categories() {
    register_block_pattern_category(
        'penkode',
        array( 'label' => __( 'Penkode', 'custom_patterns' ) )
    );

    register_block_pattern_category(
        'material',
        array( 'label' => __( 'Material', 'custom_patterns' ) )
    );
}

add_action( 'init', 'register_custom_block_categories' );