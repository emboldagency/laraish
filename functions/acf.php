<?php

/**
 * Register ACF options page
 */
if( function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

/**
 * Read default ACF fields for blocks from JSON
 * Note: These fields will not be displayed with the rest of the field groups. They will only appear where the location rules are set for.
 */
function embold_acf_register_json_fields() {
	if (function_exists("acf_add_local_field_group")) {
		$acf_json_data = get_template_directory() . '/acf-fields.json';

		if (file_exists($acf_json_data)) {
			$custom_fields = $acf_json_data ? json_decode(file_get_contents($acf_json_data), true) : array();

			if ($custom_fields) {
				foreach ($custom_fields as $custom_field) {
					// TODO: uncomment
					acf_add_local_field_group($custom_field);
				}
			}
		}
	}
}

add_action("acf/init", "embold_acf_register_json_fields");