  <!-- Float Nav BEGIN -->
  <div id="nav-float" role="navigation" aria-label="<?php echo esc_attr__('Floating Navigation', 'text-domain'); ?>">
    <figure id="logo-container-float">
      <a href="<?php echo esc_url(get_bloginfo('url')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?> | <?php echo esc_attr(get_bloginfo('description')); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/framework-logo.png" /></a></figure>
    
<nav><?php get_template_part('/template-parts/mobile-nav'); ?></nav>

  </div>
  <!-- Float Nav END -->
