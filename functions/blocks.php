<?php

/*
** Enqueue the main stylesheet once for all blocks
*/

add_action( 'admin_enqueue_scripts', 'enqueue_main_css_in_admin' );
function enqueue_main_css_in_admin() {
  global $pagenow;

  if ($pagenow == 'post.php' && has_blocks()) {
    wp_enqueue_style( 'main_css', get_template_directory_uri() . '/public/css/app.css' );
    wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/public/css/admin.css' );
  }

}

add_filter( 'block_categories', 'embold_block_category', 10, 2);
function embold_block_category( $categories, $post ) {
  $new_categories = [
    [
      'slug' => 'embold',
      'title' => __( 'emBold', 'embold' ),
    ],
  ];

	return array_merge($categories,$new_categories);
}

// create blocks
add_action('acf/init', function() {
  if( function_exists('acf_register_block') ) {
    // get all blocks
    $dir = new DirectoryIterator(locate_template("resources/views/blocks/"));

    // set the allowed blocks
    $allowed_block_options = [
      'name' => 'Name',
      'title' => 'Title',
      'description' => 'Description',
      'category' => 'Category',
      'icon' => 'Icon',
      'keywords' => 'Keywords',
      'post_types' => 'Post Types',
      'mode' => 'Mode',
      'align' => 'Align',
      'align_text' => 'Align Text',
      'align_content' => 'Align Content',
      'enqueue_style' => 'Enqueue Style',
      'enqueue_script' => 'Enqueue Script',
    ];

    // loop through blocks
    foreach ($dir as $fileinfo) {
      if (!$fileinfo->isDot()) {
        $slug = str_replace('.php', '', $fileinfo->getFilename());

        // Get info from file
        $file_path = locate_template("resources/views/blocks/${slug}.php");
        $file_headers = get_file_data($file_path, $allowed_block_options);

        if(empty($file_headers['title']) ) {
          dd( _e('This block needs a title: ' . $file_path));
        }

        if (empty($file_headers['category']) ) {
          $file_headers['category'] = 'embold';
        }

        // register new block
        $data = [
          'name' => $slug,
					'render_template' => "resources/views/blocks/${slug}.php"
        ];

        // register block arguments
        foreach ($file_headers as $key => $value) {
          // if $key is not in the allowed options, skip to the next one
          if (!$value || !array_key_exists($key, $allowed_block_options)) {
            continue;
          }

          if ($key === 'keywords' || $key === 'post_types') {
            $data[$key] = explode(' ', $value);
            continue;
          }

          if (strpos($key, 'enqueue') !== false) {
            $data[$key] = get_template_directory_uri() . "/". $value;
            continue;
          }

          $data[$key] = $value;
        }

        acf_register_block_type($data);
      }
    }
  }
});