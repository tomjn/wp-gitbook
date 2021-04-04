<?php

/**
 * Proper way to enqueue scripts and styles.
 */
function gitbook_scripts() : void {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_script( 'gitbook.js', get_template_directory_uri() . '/gitbook.js', array(), '1.0.0', true );
	wp_enqueue_script( 'gitbook-theme.js', get_template_directory_uri() . '/theme.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'gitbook_scripts' );

add_action( 'after_setup_theme', 'gitbook_register_nav_menu' );
function gitbook_register_nav_menu() : void {
	register_nav_menu( 'summary', 'Summary' );
}

add_filter( 'nav_menu_css_class', 'githook_nav_classes', 10, 1 );
function githook_nav_classes( $classes ) : array {
	$classes[] = 'chapter';
	if ( in_array( 'current_page_item', $classes ) ) {
		$classes[] = 'active';
	}
	return $classes;
}

function get_next_menu_item( string $menu_name ) {
	if ( ! get_the_ID() ) {
		return false;
	}

	$locations = get_nav_menu_locations();
	$menu      = wp_get_nav_menu_object( $locations[ $menu_name ] );
	$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'nopaging' => true ) );
	if ( empty( $menuitems ) ) {
		return false;
	}
	$i = -1;
	$current_idx = -1;
	foreach ( $menuitems as $item ) {
		$i++;
		$id = get_post_meta( $item->ID, '_menu_item_object_id', true );
		if ( intval( $id ) === get_the_ID() ) {
			$current_idx = $i;
			break;
		}
	}

	$next = false;
	if ( -1 === $current_idx ) {
		$next = $menuitems[0];
	}

	if ( isset( $menuitems[ $current_idx + 1 ] ) ) {
		$next = $menuitems[ $current_idx + 1  ];
	}

	if ( $next ) {
		$next = get_post_meta( $next->ID, '_menu_item_object_id', true );
		return get_post( $next );
	}
	return false;
}

function get_previous_menu_item( string $menu_name ) {
	if ( ! get_the_ID() ) {
		return false;
	}
	$locations = get_nav_menu_locations();
	$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
	$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'nopaging' => true ) );
	if ( empty( $menuitems ) ) {
		return false;
	}
	$i = -1;
	$current_idx = -1;
	foreach ( $menuitems as $item ) {
		$i++;
		$id = get_post_meta( $item->ID, '_menu_item_object_id', true );
		if ( intval( $id ) === get_the_ID() ) {
			$current_idx = $i;
			break;
		}
	}

	$next = false;
	if ( -1 === $current_idx ) {
		return false;
	}
	
	if ( isset( $menuitems[ $current_idx - 1 ] ) ) {
		$next = $menuitems[ $current_idx - 1  ];
	}
	
	if ( $next ) {
		$next = get_post_meta( $next->ID, '_menu_item_object_id', true );
		return get_post( $next );
	}
	return false;
}
