<?php get_header(); ?>
	<div class="container">
		<div class="box-coverage row">
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
			                <?php the_content(); ?>
			                <?php ( is_single() ? newphp_entry_tag() : '' ); ?>
			                <?php get_template_part( 'author-bio' ); ?>
							<?php comments_template(); ?>
			        </div>
			</article>
			<?php endwhile; ?>
			<?php else : ?>
                <?php get_template_part( 'content', 'none' ); ?>
        <?php endif; ?>
		</div>	
	</div>
<?php get_footer(); ?>