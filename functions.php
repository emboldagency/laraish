<?php

use Illuminate\Http\Request;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Foundation\Http\Events\RequestHandled;

if (defined('ARTISAN_BINARY')) {
    return;
}


define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is maintenance / demo mode via the "down" command we
| will require this file so that any prerendered template can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists(__DIR__.'/../storage/framework/maintenance.php')) {
    require __DIR__.'/../storage/framework/maintenance.php';
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__ . '/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$kernel->handle(Request::capture());

$app['events']->listen(RequestHandled::class, function (RequestHandled $event) use ($kernel) {
    $event->response->send();

    $kernel->terminate($event->request, $event->response);
});

// require all files in the functions folder
foreach (glob(get_template_directory() . "/functions/*.php") as $function) {
	require_once get_template_directory() . '/functions/' . basename($function);
}

// disable xmlrpc
add_filter( 'xmlrpc_enabled', '__return_false' );

add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );

// page slug body class
function add_page_slug_body_class( $classes ) {
  global $post;
  
  if ( isset( $post ) ) {
      $classes[] = 'page-' . $post->post_name;
  }
  return $classes;
}

add_filter( 'body_class', 'add_page_slug_body_class' );

// enable svg upload support
function add_svg_to_upload_mimes( $upload_mimes ) {
  $upload_mimes['svg'] = 'image/svg+xml';
  $upload_mimes['svgz'] = 'image/svg+xml';
  return $upload_mimes;
}

add_filter( 'upload_mimes', 'add_svg_to_upload_mimes', 10, 1 );
