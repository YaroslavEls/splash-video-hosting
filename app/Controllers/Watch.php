<?php

namespace App\Controllers;

class Watch extends BaseController
{
    public function index($arg)
    {
        $data = ['name' => $arg];
        return view('watch.php', $data);
    }
}