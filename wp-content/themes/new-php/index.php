<?php get_header(); ?>
	<div class="container">
		<div class="box-coverage row">
			<div id="owl-demo">
			tin moi
			<?php 
				$i = 1 ; while ( $hot_news -> have_posts() ) : $hot_news -> the_post();
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
			
			</div>
			<script type="text/javascript">
			    $(document).ready(function() {
				    $("#owl-demo").owlCarousel({    
				    autoPlay: false,    
				    items : 1,
				    itemsDesktop : [1199,1],
				    itemsDesktopSmall : [979,1],
				    pagination: false,
				    navigation: true,
  					navigationText: ["<span class='fa fa-angle-left'></span>","<span class='fa fa-angle-right'></span>"]
				    }); 
			    });
			</script>
			<div class="box-content-index row"> 
				<div class="box-list-categories ">
					<div class="box-lecture-1" id="box-67">
						<div class="title_category">
							<a href=" <?php echo get_category_link(67); ?>" >
								<?php echo get_cat_name(67);?>
							</a>
						</div>
						<?php query_posts('cat=67'); ?>
							<?php $count = 1; ?>
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<div class="post-mar" id="post-<?php echo $count; ?>">
								<div class="box-lecture-67">
									<div class="box-lecture-img">
										<a href="<?php the_permalink(); ?>" class="box-lecture-img-67" >
											<?php the_post_thumbnail("large", array( "title" => get_the_title(), "alt" => get_the_title() )); ?>
										</a>
									</div>
									<div class="box-lecture-content">
										<h2><a href="<?php the_permalink(); ?>" class="box-lecture-title-67" > <?php the_title(); ?> </a></h2>
										<p class="box-lecture-desc-67">
											<?php the_excerpt(); ?>
										</p>
									</div>
								</div> 
							</div>
							<?php $count++; ?>
						<?php endwhile; endif; ?>
					</div>
					<div class="box-lecture-1" id="box-68">
						<div class="title_category">
							<a href=" <?php echo get_category_link(68); ?>" >
								<?php echo get_cat_name(68);?>
							</a>
						</div>
						<?php query_posts('cat=68'); ?>
							<?php $count = 1; ?>
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<div class="post-mar" id="post-<?php echo $count; ?>">
								<div class="box-lecture-67">
									<div class="box-lecture-img">
										<a href="<?php the_permalink(); ?>" class="box-lecture-img-67" >
											<?php the_post_thumbnail("large", array( "title" => get_the_title(), "alt" => get_the_title() )); ?>
										</a>
									</div>
									<div class="box-lecture-content">
										<h2><a href="<?php the_permalink(); ?>" class="box-lecture-title-67" > <?php the_title(); ?> </a></h2>
										<p class="box-lecture-desc-67">
											<?php the_excerpt(); ?>
										</p>
									</div>
								</div> 
							</div>
							<?php $count++; ?>
						<?php endwhile; endif; ?>
					</div>
				</div>
				<div class="sidebar-col">
					<div class="sidebar-content"> 
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>	
	</div>
<?php get_footer(); ?>