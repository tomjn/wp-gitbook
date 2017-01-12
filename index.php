<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<title><?php wp_title(); ?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="HandheldFriendly" content="true"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<?php wp_head(); ?>
	</head>
	<body>
		<div class="book">
			<div class="book-summary">
				<div id="book-search-input" role="search">
					<form method="get">
						<input type="text" name="s" placeholder="Type to search">
					</form>
				</div>
				<?php /*get_search_form();*/ ?>
				<nav role="navigation">
				<?php get_template_part( 'summary' ); ?>
				</nav>
			</div>

			<div class="book-body">
					<div class="body-inner">
					<?php
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
					?>
					</div>
					<?php
					?>
					<?php
					$prev_post = get_previous_menu_item( 'summary' );
					$next_post = get_next_menu_item( 'summary' );
					if ( ! empty( $prev_post ) ) {
						?>
						<a href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>" class="navigation navigation-prev <?php if ( !empty( $next_post ) ) { echo "navigation-unique"; } ?>" aria-label="Previous page: <?php echo esc_attr( $prev_post->post_title ); ?>">
							<i class="fa fa-angle-left"></i>
						</a>
						<?php
					}
					if ( ! empty( $next_post ) ) {
						?>
						<a href="<?php echo esc_url( get_permalink( $next_post ) ); ?>" class="navigation navigation-next <?php if ( !empty( $prev_post ) ) { echo "navigation-unique"; } ?>" aria-label="Next page: <?php echo esc_attr( $next_post->post_title ); ?>">
							<i class="fa fa-angle-right"></i>
						</a>
						<?php
					}
					?>
			</div>

			<script>
				var gitbook = gitbook || [];
				gitbook.push(function() {
					gitbook.page.hasChanged( {
						"page":{
							"title":"<?php the_title(); ?>"
						},
						"config":{},
						"file":{
							"path":"themes/README.md",
							"mtime":"2017-01-12T10:45:03.000Z",
							"type":"markdown"
						},
						"gitbook":{
							"version":"3.2.2",
							"time":"2017-01-12T10:46:10.915Z"
						},
						"basePath":"..",
						"book":{
							"language":""
						}
					}
					);
				});
			</script>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>
