<?php get_header(); ?>

<?php
if(get_post_type() !== \KN\ProjectsPlugin\ProjectPostType::POST_TYPE):
?>
<div class="container mx-auto my-8">
<?php endif; ?>

	<?php if ( have_posts() && !is_front_page() ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<?php get_template_part( 'template-parts/content', get_post_type() ); ?>

		<?php endwhile; ?>

	<?php endif; ?>
<?php
if(get_post_type() !== \KN\ProjectsPlugin\ProjectPostType::POST_TYPE):
?>
</div>
<?php endif; ?>

<?php
get_footer();
