<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-thumbnail">
                <?php newphp_thumbnail('thumbnail'); ?>
        </div>
        <header class="entry-header">
                <?php newphp_entry_header(); ?>
                <?php newphp_entry_meta() ?>
        </header>
        <div class="entry-content">
                <?php newphp_entry_content(); ?>
                <?php ( is_single() ? newphp_entry_tag() : '' ); ?>
        </div>
</article>