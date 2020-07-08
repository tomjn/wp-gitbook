<?php

/**
 * Proper way to enqueue scripts and styles.
 */
function gitbook_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_script( 'gitbook.js', get_template_directory_uri() . '/gitbook.js', array(), '1.0.0', true );
	wp_enqueue_script( 'gitbook-theme.js', get_template_directory_uri() . '/theme.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'gitbook_scripts' );

add_action( 'after_setup_theme', 'gitbook_register_nav_menu' );
function gitbook_register_nav_menu() {
	register_nav_menu( 'summary', 'Summary' );
}

add_filter( 'nav_menu_css_class', 'githook_nav_classes', 10, 1 );
function githook_nav_classes( $classes ) {
	$classes[] = 'chapter';
	if ( in_array( 'current_page_item', $classes ) ) {
		$classes[] = 'active';
	}
	return $classes;
}

function get_next_menu_item( $menu_name ) {
	global $post;

	if ( empty( $post ) ) {
		return false;
	}

	$locations = get_nav_menu_locations();
	$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
	$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
	if ( empty( $menuitems ) ) {
		return false;
	}
	$i = -1;
	$next_id = -1;
	foreach ( $menuitems as $item ) {
		$i++;
		$id = get_post_meta( $item->ID, '_menu_item_object_id', true );
		if ( $id == $post->ID ) {
			$next_id = $i;
		}
	}

	$next = false;
	if ( -1 === $next_id ) {
		$next = $menuitems[0];
	}

	if ( count( $menuitems ) > $next_id + 1  ) {
		$next = $menuitems[ $next_id + 1  ];
	}

	if ( $next ) {
		$next = get_post_meta( $next->ID, '_menu_item_object_id', true );
		return get_post( $next );
	}
	return false;

}

function get_previous_menu_item( $menu_name ) {
	global $post;
	$locations = get_nav_menu_locations();
	$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
	$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
	if ( empty( $menuitems ) ) {
		return false;
	}
	$i = -1;
	$next_id = -1;
	foreach ( $menuitems as $item ) {
		$i++;
		$id = get_post_meta( $item->ID, '_menu_item_object_id', true );
		if ( $id == $post->ID ) {
			$next_id = $i;
		}
	}
	$next = false;
	if ( -1 === $next_id ) {
		return false;
	}
	if ( $next_id > 0 ) {
		$next = $menuitems[ $next_id - 1 ];
	}
	if ( $next ) {
		$next = get_post_meta( $next->ID, '_menu_item_object_id', true );
		return get_post( $next );
	}
	return false;

}
