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
	<body <?php body_class(); ?>>
		<div class="book">
			<?php get_sidebar(); ?>
			<div class="book-body">
					<div class="body-inner">