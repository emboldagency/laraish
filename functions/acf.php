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
 */
add_action( 'admin_init', 'em_sync_acf_fields' );
function em_sync_acf_fields() {
    $groups = acf_get_field_groups();
    $sync = array();

		// return if no field groups
		if (empty($groups)) {
			return;
		}

    // find JSON field groups which have not yet been imported
    foreach ($groups as $group) {
			$local = acf_maybe_get($group, 'local', false);
			$modified = acf_maybe_get($group, 'modified', 0);
			$private = acf_maybe_get($group, 'private', false);

			// ignore DB / PHP / private field groups
			if ($local !== 'json' || $private) {
				// do nothing
			} elseif (!$group['ID']) {
				$sync[$group['key']] = $group;
			} elseif ($modified && $modified > get_post_modified_time('U', true, $group['ID'], true)) {
				$sync[$group['key']]  = $group;
			}
    }

		// return if no sync needed
    if (empty($sync)) {
			return;
		}

    if (!empty($sync)) {
			$new_ids = array();

			foreach ($sync as $key => $v) {
				// append fields
				if (acf_have_local_fields($key)) {
					$sync[$key]['fields'] = acf_get_local_fields($key);
				}

				// import field group
				$field_group = acf_import_field_group($sync[$key]);
			}
    }
}
