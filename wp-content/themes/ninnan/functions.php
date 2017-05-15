<?php

// Cleaning
require(get_template_directory() . '/functions/clean.php');

// Custom post types
require(get_template_directory() . '/functions/cpt_chapter.php');

function get_template_parts( $parts = array() ) {
	foreach( $parts as $part ) {
		get_template_part( $part );
	};
}
