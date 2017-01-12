<?php
get_header();
if ( have_posts() ) {
	get_template_part( 'header', 'top' );
	?>
	<div class="page-wrapper" tabindex="-1" role="main">
	<?php
	while ( have_posts() ) {
		the_post();
		?>
		<div class="page-inner">
				<section class="normal markdown-section">
					<h1><?php
					if ( is_archive() || is_home() ) {
						?><a href="<?php the_permalink();?>"><?php
					}
					the_title();
					if ( is_archive() || is_home() ) {
						?></a><?php
					}
					?></h1>
					<?php
					the_content();
					?>
				</section>
		</div>
		<?php
	}
	?>
	</div>
	<?php
}
get_footer();
