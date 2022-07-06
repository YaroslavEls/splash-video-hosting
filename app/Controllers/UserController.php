<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CompilationModel;
use \CodeIgniter\Exceptions\PageNotFoundException;

class UserController extends BaseController
{
    public function index($arg)
    {
        $db = db_connect();
        $model = new UserModel($db);
        $user = $model->getUserById($arg);

        if (!$user) {
            throw new PageNotFoundException('No such user found');
        }

        $listId = $this->request->getVar('list');
        if (!$listId) {
            $listId = $user->compilationsDefault[0]->id;
        }
        $model = new CompilationModel($db);
        $favourite = $model->getFavouriteByUser($user->id);
        $list = $model->getAllById($listId);

        return view('pages/user.php', ['user' => $user, 'favourite' => $favourite, 'list' => $list]);
    }
}