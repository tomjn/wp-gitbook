					</div>
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
