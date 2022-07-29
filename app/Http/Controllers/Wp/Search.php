<?php

namespace App\Http\Controllers\Wp;

use App\Http\Controllers\Controller;

class Search extends Controller
{
    /**
     * Search constructor.
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

        return $this->resolveView('wp.search', $data);
    }
}
