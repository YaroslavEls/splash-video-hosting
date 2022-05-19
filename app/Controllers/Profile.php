<?php

namespace App\Controllers;

class Profile extends BaseController
{
    public function index($arg)
    {
        $data = ['id' => $arg];
        return view('profile.php', $data);
    }
}