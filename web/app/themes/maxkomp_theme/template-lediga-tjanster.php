<?php
/**
 * Template Name: Lediga tjänster
 */
?>

<?php while (have_posts()) : the_post(); ?>
	<?php get_template_part('templates/page', 'header'); ?>
	<?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

	<section class="regionSelect bg-white">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h5>Välj län</h5>
				</div>
				<div class="col-12 col-md-3 mb-5 region">
					<div>
						<a href="?region=Stockholms+län">
							<img src="<?= \Roots\Sage\Assets\asset_path('images/stockholm.jpg'); ?>" class="img-fluid" />
							<div class="row justify-content-center align-items-center text-wrapper">
								<h5 class="text-uppercase fg-orange caption">Stockholms län</h5>
							</div>
						</a>
					</div>
				</div>
				<div class="col-12 col-md-3 mb-5 region">
					<div>
						<a href="?region=Västra+Götalands+län">
							<img src="<?= \Roots\Sage\Assets\asset_path('images/vgotaland.jpg'); ?>" class="img-fluid" />
							<div class="row justify-content-center align-items-center text-wrapper">
								<h5 class="text-uppercase fg-orange caption">Västra götalands län</h5>
							</div>
						</a>
					</div>
				</div>
				<div class="col-12 col-md-3 mb-5 region">
					<div>
						<a href="?region=Kronobergs+län">
							<img src="<?= \Roots\Sage\Assets\asset_path('images/kronoberg.jpg'); ?>" class="img-fluid" />
							<div class="row justify-content-center align-items-center text-wrapper">
								<h5 class="text-uppercase fg-orange caption">Kronobergs län</h5>
							</div>
						</a>
					</div>
				</div>
				<div class="col-12 col-md-3 mb-5 region">
					<div>
						<a href="?region=Skånes+län">
							<img src="<?= \Roots\Sage\Assets\asset_path('images/skane.jpg'); ?>" class="img-fluid" />
							<div class="row justify-content-center align-items-center text-wrapper">
								<h5 class="text-uppercase fg-orange caption">Skåne län</h5>
							</div>
						</a>
					</div>
				</div>
				<div class="col-12 col-md-3 mb-5 region">
					<div>
						<a href="?region=Hallands+län">
							<img src="<?= \Roots\Sage\Assets\asset_path('images/halland.jpg'); ?>" class="img-fluid" />
							<div class="row justify-content-center align-items-center text-wrapper">
								<h5 class="text-uppercase fg-orange caption">Hallands län</h5>
							</div>
						</a>
					</div>
				</div>
				<div class="col-12 col-md-3 mb-5 region">
					<div>
						<a href="?region=Jönköpings+län">
							<img src="<?= \Roots\Sage\Assets\asset_path('images/jonkoping.jpg'); ?>" class="img-fluid" />
							<div class="row justify-content-center align-items-center text-wrapper">
								<h5 class="text-uppercase fg-orange caption">Jönköpings län</h5>
							</div>
						</a>
					</div>
				</div>
				<div class="col-12 col-md-3 mb-5 region">
                    <div>
                        <a href="?region=Kalmars+län">
                            <img src="<?= \Roots\Sage\Assets\asset_path('images/kalmar.jpg'); ?>" class="img-fluid" />
                            <div class="row justify-content-center align-items-center text-wrapper">
                                <h5 class="text-uppercase fg-orange caption">Kalmar län</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-5 region">
                    <div>
                        <a href="?region=Västerbottens+län">
                            <img src="<?= \Roots\Sage\Assets\asset_path('images/vasterbotten.png'); ?>" class="img-fluid" />
                            <div class="row justify-content-center align-items-center text-wrapper">
                                <h5 class="text-uppercase fg-orange caption">Västerbottens län</h5>
                            </div>
                        </a>
                    </div>
                </div>
				<div class="col-12 col-md-3 mb-5 region">
					<div>
						<a href="?region=Sverige">
							<img src="<?= \Roots\Sage\Assets\asset_path('images/sverige.jpg'); ?>" class="img-fluid" />
							<div class="row justify-content-center align-items-center text-wrapper">
								<h5 class="text-uppercase fg-orange caption">Övrigt / Sverige</h5>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="bg-white jobslist">
		<div class="container">
			<div class="row">
				<div id="listWrapper">
					<iframe id="jobiframe" width="670" height="1000" scrolling="yes"></iframe>
				</div>
			</div>
		</div>
	</div>

<?php get_template_part('templates/section', 'stats'); ?>
<?php get_template_part('templates/section', 'companies'); ?>