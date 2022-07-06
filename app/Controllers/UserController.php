<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CompilationModel;
use App\Models\TitlesCompsModel;
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
            $listId = $user->compsDefault[0]->id;
        }
        $model = new CompilationModel($db);
        $favourite = $model->getFavouriteByUser($user->id);
        $list = $model->getAllById($listId);

        return view('pages/user.php', ['user' => $user, 'favourite' => $favourite, 'list' => $list]);
    }

    public function create()
    {
        $data = [
            'name'    => $this->request->getVar('name'),
            'owner'   => session()->get('id'),
            'public'  => true,
            'default' => false
        ];

        $db = db_connect();
        $model = new CompilationModel($db);
        $model->create($data);

        $data = (object) $data;
        $data->id = $db->insertID();
        session()->push('comps', [$data]);

        return redirect()->to('/user/'.session()->get('id'));
    }

    public function add()
    {
        $data = [
            'title_id' => $this->request->getVar('title'),
            'list_id'  => $this->request->getVar('list')
        ];

        $db = db_connect();
        $model = new TitlesCompsModel($db);
        $model->create($data);

        return redirect()->to('/user/'.session()->get('id').'?list='.$data['list_id']);
    }
}