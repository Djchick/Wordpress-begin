<?php get_header(); ?>
 
<div id="content">
        <section id="main-content">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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

                <?php endwhile; ?>
                <?php else : ?>
                        <?php get_template_part( 'content', 'none' ); ?>
                <?php endif; ?>
        </section>
        <section id="sidebar">
                <?php get_sidebar(); ?>
        </section>
</div>
 
<?php get_footer(); ?>