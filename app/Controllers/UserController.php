<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\FriendModel;
use App\Models\CompilationModel;
use App\Models\TitlesCompsModel;
use \CodeIgniter\Exceptions\PageNotFoundException;

class UserController extends BaseController
{
    public $userModel, $compModel, $friendModel;

    public function __construct()
    {
        $db = db_connect();
        $this->userModel = new UserModel($db);
        $this->compModel = new CompilationModel($db);
        $this->friendModel = new FriendModel($db);
        $this->tcModel = new TitlesCompsModel($db);
    }

    public function index($arg)
    {
        $user = $this->userModel->getById($arg);
        if (!$user) {
            throw new PageNotFoundException('No such user found');
        }

        $listId = $this->request->getVar('list');
        if (!$listId) {
            $listId = $user->compsDefault[0]->id;
        }

        $data = [
            'user'      => $user,
            'favourite' => $this->compModel->getOneByUser('Любимое', $user->id),
            'list'      => $this->compModel->getById($listId),
            'active'    => $listId
        ];
        return view('pages/user.php', $data);
    }

    public function friends($arg)
    {
        $user = $this->userModel->getById($arg);
        if (!$user) {
            throw new PageNotFoundException('No such user found');
        }

        $data = [
            'user'      => $user,
            'favourite' => $this->compModel->getOneByUser('Любимое', $user->id),
            'friends'   => $this->friendModel->getFriendsByUser($user->id),
            'invites'   => ($arg == session()->get('id')) ? $this->friendModel->getInvitesByUser($user->id) : [],
            'active'    => 'friends'
        ];
        return view('pages/user.php', $data);
    }

    //

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
        $model->postOne($data);

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
        
        $this->tcModel->postOne($data);

        return redirect()->to('/user/'.session()->get('id').'?list='.$data['list_id']);
    }
}