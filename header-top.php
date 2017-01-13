<div class="book-header" role="navigation">
	<!-- Title -->
	<h1>
		<i class="fa fa-circle-o-notch fa-spin"></i>
		<?php
		if ( is_singular() ) {
			?>
			<a href="<?php the_permalink(); ?>" >
				<?php the_title(); ?>
			</a>
			<?php
		} else if ( is_search() ) {
			?>
			<a href="<?php echo esc_url( get_search_link() ); ?>" >
				Search for: "<?php echo esc_html( get_search_query() ); ?>"
			</a>
			<?php
		} else {
			?>
			<a href="#">
				Archive
			</a>
			<?php
		}
		?>
	</h1>
</div>
