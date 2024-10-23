<div class="author-container">
    <img><?php echo get_avatar(get_the_author_meta('user_email'), '80'); ?></img>
    <div class="author-name"><?php _e('', 'foo'); ?> <?php the_author(); ?></div>
    <div class="author-desc"><p><?php echo get_the_author_meta('description'); ?></p></div>
</div>
