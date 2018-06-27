<?php
/**
 * Template Name: Registrera CV
 */
?>

<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'templates/page', 'header' ); ?>
	<?php get_template_part( 'templates/content', 'page' ); ?>
<?php endwhile; ?>

<section style="background: #fff;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php
				$id = null;
				if ( isset( $_GET['id'] ) ) {
					$id = $_GET['id'];
				}
				?>

				<?php if($id): ?>
				<iframe src="http://cv-maxkompetens.app.intelliplan.eu/WebCV/Registration?id=<?= $id; ?>"
				        width="100%"
				        height="875" scrolling="yes" frameborder="0"></iframe>
				<?php else: ?>
				<iframe src="http://cv-maxkompetens.app.intelliplan.eu/WebCV/Registration"
				        width="100%"
				        height="875" scrolling="yes" frameborder="0"></iframe>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
