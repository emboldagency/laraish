<?php

namespace App\Http\Controllers\Wp;

use App\Http\Controllers\Controller;

class Post extends Controller
{
    /**
     * Single constructor.
     */
    public function __construct()
    {
        if ( ! empty($GLOBALS['post'])) {
            setup_postdata($GLOBALS['post']);
        }
    }

    public function index()
    {
        $data = $this->get_data(new Post());

        return $this->resolveView('wp.post', $data);
    }
}
