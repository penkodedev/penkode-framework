<?php


//************************* INCLUDE JS FUNCTIONS **************************************

function enqueue_scripts()
{

// ******************  CUSTOM INCLUDES *************************
// ** True(load on FOOTER)
// ** False(load on HEADER)

  wp_enqueue_script(
    'accordion',
    get_template_directory_uri() . '/js/custom/accordion.js',
    array('jquery'), // Dependency on jQuery
    '', // Dependencies
    true 
  );
  
  wp_enqueue_script(
    'back-to-top-js',
    get_template_directory_uri() . '/js/custom/back-to-top.js',
    array('jquery'), // Dependency on jQuery
    '', // Dependencies
    true 
  );
  
  wp_enqueue_script(
    'float-menu-js',
    get_template_directory_uri() . '/js/custom/float-menu.js',
    array(),
    '', // Dependencies
    true 
  );
  
  wp_enqueue_script(
    'modals',
    get_template_directory_uri() . '/js/custom/modals.js',
    array('jquery'), // Dependency on jQuery
    false 
  );
  
  wp_enqueue_script(
    'scrolling-text',
    get_template_directory_uri() . '/js/custom/scrolling-text.js',
    array('jquery'), // Dependency on jQuery
    false 
  );
  
  wp_enqueue_script(
    'secure-login',
    get_template_directory_uri() . '/js/custom/secure-login.js',
    array(''), // Dependency on jQuery
    '', // Dependencies
    true 
  );
  
  wp_enqueue_script(
    'see-more',
    get_template_directory_uri() . '/js/custom/see-more.js',
    array('jquery'), // Dependency on jQuery
    false 
  );
  

  // ******************  VENDOR INCLUDES *************************
  // ** True(load on FOOTER)
  // ** False(load on HEADER)

  wp_enqueue_script(
    'bootstrap.min', // Unique identifier for "prognroll"
    get_template_directory_uri() . '/js/vendor/bootstrap.min.js',
    array(''), // Dependency on jQuery
    '', // Dependencies
    true 
  );
  
  wp_enqueue_script(
    'cookies',
    get_template_directory_uri() . '/js/vendor/cookies.js',
    array('jquery'), // Dependency on jQuery
    true
  );

  wp_enqueue_script(
    'flickity',
    get_template_directory_uri() . '/js/vendor/flickity.pkgd.min.js',
    array('jquery'), // Dependency on jQuery
    true
  );

// LOAD NATIVE WORDPRESS JQUERY
  wp_enqueue_script('jquery');


  wp_enqueue_script(
    'prognroll-script', 
    get_template_directory_uri() . '/js/vendor/prognroll.js',
    array('jquery'), // Dependencia en jQuery
    '', 
    true  // True(load on FOOTER) - False(load on HEADER)
  );


}
add_action('wp_enqueue_scripts', 'enqueue_scripts');



//************************* INCLUDE GSAP (Animation JS) scripts **************************************

// Función para encolar los scripts de GSAP (GreenSock Animation Platform)
// function theme_gsap_script() {
//     // La biblioteca principal de GSAP
//     wp_enqueue_script('gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js', array(), false, true);

//     // ScrollTrigger - con gsap.js como dependencia
//     wp_enqueue_script('gsap-st', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/ScrollTrigger.min.js', array('gsap-js'), false, true);

//     // Tu archivo de código de animaciones - con gsap.js como dependencia
//     wp_enqueue_script('gsap-js2', get_template_directory_uri() . '/js/gsap.js', array('gsap-js'), false, true);
// }
// Engancha la función theme_gsap_script a la acción wp_enqueue_scripts
// add_action('wp_enqueue_scripts', 'theme_gsap_script');

//************************* INCLUDE REACT **************************************

// Función para encolar los scripts de React
// function enqueue_react_scripts() {
//     // Encola el archivo de desarrollo de React
//     wp_enqueue_script('react', get_stylesheet_directory_uri() . '/js/react/react.development.js', array(), '16.0.0', true);

//     // Encola el archivo de producción de React DOM
//     wp_enqueue_script('react-dom', get_stylesheet_directory_uri() . '/js/react/react-dom.production.min.js', array(), '16.0.0', true);
// }
// Engancha la función enqueue_react_scripts a la acción wp_enqueue_scripts
// add_action('wp_enqueue_scripts', 'enqueue_react_scripts');


