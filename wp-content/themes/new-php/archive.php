<?php get_header(); ?>
	<div class="container">
		<div class="box-coverage row">
			<div class="archive-title">
				<h2>
					<?php 
						if ( is_tag() ) : 
							printf( __( 'Posts Tagged : %1$s' , 'newphp' ), single_tag_title( '', false ) );
						elseif ( is_category() ) : 
							printf( __( 'Posts Categorized : %1$s', 'newphp' ), single_cat_title( '', false ) );
						elseif ( is_day() ) :
							printf( __( 'Daily Archives : %1$s', 'newphp' ), get_the_time('l, F j, Y') );
						elseif ( is_month() ) :
							printf( __( 'Monthly Archives : %1$s', 'newphp' ), get_the_time('F Y') );
						elseif ( is_year() ) :
							printf( __( 'Yearly Archives : %1$s', 'newphp' ), get_the_time('Y') );
						endif;
					?>
				</h2>
			</div>
			<?php if ( is_tag() || is_category() ) : ?>
				<div class="archive-description">
					<?php echo term_description(); ?>
				</div>
				<?php 
				$i = 1 ; while ( have_posts() ) : the_post();
			?>
			<?php if ($i==1) {
				?> 
				<div class="first-post-63 item">
					<div class="blog-img">
						<a href="<?php the_permalink(); ?>" class="first-post-img-63" >
							<?php the_post_thumbnail("large", array( "title" => get_the_title(), "alt" => get_the_title() )); ?>
						</a>
					</div>
					<div class="blog-content">
						<h2><a href="<?php the_permalink(); ?>" class="first-post-title-63" > <?php the_title(); ?> </a></h2>
						<p class="first-post-desc-63">
							<?php the_excerpt(); ?>
							<?php newphp_entry_meta() ?>
						</p>
					</div>
				</div> 
				<?php 
			} else {
				?>
				<div class="other-post-63 item">
					<a href="<?php the_permalink(); ?>" > <?php the_title();  ?> </a>
				</div>
				<?php
			}
			?>
			<?php endwhile ; wp_reset_query(); ?>
			<?php endif; ?>
		</div>	
	</div>
<?php get_footer(); ?>