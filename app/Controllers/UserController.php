<?php

namespace App\Controllers;

use App\Models\UserModel;
use \CodeIgniter\Exceptions\PageNotFoundException;

class UserController extends BaseController
{
    public function index($arg)
    {
        $model = new UserModel();
        $profile = $model->find($arg);

        if ($profile) {
            $data = ['id' => $profile['username']];
        } else {
            throw new PageNotFoundException('No such user found');
        }

        return view('pages/user.php', $data);
    }
}