<?php

namespace App\Http\Controllers\Wp;

use App\Http\Controllers\Controller;

class NotFound extends Controller
{
    /**
     * Page constructor.
     */
    public function __construct()
    {
        if (!empty($GLOBALS['post'])) {
            setup_postdata($GLOBALS['post']);
        }
    }
    public function index()
    {
        $data = $this->get_data(new Post());

        return $this->resolveView('wp.not-found', $data);

    }
}
