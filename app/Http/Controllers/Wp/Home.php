<?php

namespace App\Http\Controllers\Wp;

use App\Http\Controllers\Controller;

class Home extends Controller
{
    public function index()
    {
        $data = $this->get_data(new Post());

        return $this->view('wp.home', $data);
    }
}
