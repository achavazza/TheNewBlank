<?php
/*
_Template Name: Blog
*/
get_header(); ?>

<div class="grid">
<?php the_breadcrumb(); ?>

<h2 class="h2 title"><?php single_post_title(); ?></h2>
<div class="row">
	<div class="triad-2">
	<?php if (have_posts()) : ?>
		<?php $i = 0 ?>
		<div class="post-list">
			<?php while (have_posts()) : the_post(); ?>
				<?php the_title(); ?>
				<?php the_excerpt(); ?>
			<?php endwhile; ?>
		</div>
	<?php else : ?>
	<?php endif; ?>
	<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

	</div>

	<div class="triad-1">
		<?php get_sidebar(); ?>
	</div>
</div>
</div>
<?php get_footer(); ?>
