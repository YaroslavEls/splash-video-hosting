<?php

namespace App\Controllers;

use App\Models\ProfileModel;
use \CodeIgniter\Exceptions\PageNotFoundException;

class ProfileController extends BaseController
{
    public function index($arg)
    {
        $model = new ProfileModel();
        $profile = $model->find($arg);

        if ($profile) {
            $data = ['id' => $profile['username']];
        } else {
            throw new PageNotFoundException();
        }

        return view('profile.php', $data);
    }
}