<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Laraish\Routing\Traits\ViewDebugger;
use Laraish\Routing\Traits\ViewResolver;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ViewDebugger, ViewResolver;

    public function get_data($post) {
        $data = [];

        // set $data['site'] = to all theme options
        $data['site'] = get_fields('options');

        // page specific data
        if (isset($post->ID)) {
            $data['page'] = get_fields($post->ID);
        }

        return $data;
    }
}
