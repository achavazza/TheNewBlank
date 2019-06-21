<?php
/*
Template Name: Contacto
*/
get_header(); ?>
<div class="grid">
	<div class="row">
		<div class="quad-3">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><?php the_title(); ?></h2>

				<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
				<div class="entry">
					<?php the_content(); ?>
					<?php //wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				</div>
				<?php //edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
			</div>
			<?php
			//pr(dirname( __FILE__ ));
			include ('/inc/contact-form.php' );
			//include (get_template_directory_uri() . '/inc/contact-form.php' );
			?>
			<?php //comments_template(); ?>
			<?php endwhile; endif; ?>
		</div>
		<div class="quad-1">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
</div>
<?php get_footer(); ?>
