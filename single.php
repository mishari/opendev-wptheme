<?php get_header(); ?>

<?php if(have_posts()) : the_post(); ?>

	<article id="content" class="single-post">
		<header class="single-post-header" class="clearfix">
			<div class="container">
				<div class="eight columns">
					<?php the_category(); ?>
					<h1><?php the_title(); ?></h1>
				</div>
				<div class="three columns offset-by-one">
					<div class="post-meta">
						<p class="author"><span class="lsf">&#xE137;</span> <?php _e('by', 'jeo'); ?> <?php the_author(); ?></p>
						<p class="date"><span class="lsf">&#xE12b;</span> <?php the_date(); ?></p>
						<?php the_tags('<p class="tags"><span class="lsf">&#xE128;</span> ', ', ', '</p>'); ?>
					</div>
				</div>
			</div>
		</header>
		<?php
		if(jeo_has_marker_location()) {
			?>
			<section id="featured-media" class="row">
				<div class="container">
					<div class="twelve columns">
						<div style="height:500px;">
							<?php jeo_map(); ?>
						</div>
					</div>
				</div>
			</section>
			<?php
		}
		?>
		<?php get_template_part('section', 'related-datasets'); ?>
		<section class="content">
			<div class="container">
				<div class="eight columns">
					<?php the_content(); ?>
					<?php
					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'jeo' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					) );
					?>
					<?php comments_template(); ?>
				</div>
				<div class="three columns offset-by-one">
					<aside id="sidebar">
						<ul class="widgets">
							<li class="widget">
								<div class="share clearfix">
									<ul>
										<li>
											<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="box_count" data-show-faces="false" data-send="false"></div>
										</li>
										<li>
											<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-lang="en" data-count="vertical">Tweet</a>
										</li>
										<li>
											<div class="g-plusone" data-size="tall" data-href="<?php the_permalink(); ?>"></div>
										</li>
									</ul>
								</div>
							</li>
							<?php dynamic_sidebar('post'); ?>
						</ul>
					</aside>
				</div>
			</div>
		</section>
	</article>

<?php endif; ?>

<?php get_footer(); ?>