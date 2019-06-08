<?php get_header(); ?>

		<?php if (have_posts()) : ?>
			<?php
			if (have_posts()) :
			$post = $posts[0]; // Hack. Set $post so that the_date() works.
			if (is_category()) { // If this is a category archive
				echo sprintf('<h2>Archivo para la categoría &laquo; %s &raquo;</h2>', single_cat_title("", false));
			 } elseif( is_tag() ) { // If this is a tag archive
				 echo sprintf('<h2>Publicaciones etiquetadas &laquo; %s &raquo;</h2>', single_tag_title("", false));
			} elseif (is_day()) { // If this is a daily archive
				echo sprintf('<h2>Archivo del día %s</h2>', get_the_time('F jS, Y'));
			} elseif (is_month()) { // If this is a monthly archive
				echo sprintf('<h2>Archivo del mes %s</h2>', get_the_time('F, Y'));
			} elseif (is_year()) {// If this is a yearly archive */
				echo sprintf('<h2>Archivo del año %s</h2>', get_the_time('Y'));
			} elseif (is_author()) {// If this is an author archive
				echo ('<h2>Archivo de autor</h2>');
			} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { // If this is a paged archive
				echo ('<h2>Blog</h2>');
			} ?>


			<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

			<?php while (have_posts()) : the_post(); ?>
				<div <?php post_class() ?>>

						<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
						<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
						<div class="entry">
							<?php the_content(); ?>
						</div>

				</div>
			<?php endwhile; ?>
			<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

	<?php else : ?>

		<h2>No encontramos ninguna Noticia :(</h2>

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
