<?php
get_header();
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'header', 'top' ); ?>

		<div class="page-wrapper" tabindex="-1" role="main">
			<div class="page-inner">
					<section class="normal markdown-section">
						<h1><?php the_title(); ?></h1>
						<?php
						the_content();
						?>
					</section>
			</div>
		</div>
		<?php
	}
}
get_footer();
