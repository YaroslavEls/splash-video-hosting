<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\FriendsModel;
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
        $active = $list->id;

        return view('pages/user.php', ['user' => $user, 'favourite' => $favourite, 'list' => $list, 'active' => $active]);
    }

    public function friends($arg)
    {
        $db = db_connect();
        $model = new UserModel($db);
        $user = $model->getUserById($arg);

        if (!$user) {
            throw new PageNotFoundException('No such user found');
        }

        $model = new CompilationModel($db);
        $favourite = $model->getFavouriteByUser($user->id);
        $model = new FriendsModel($db);
        $friends = $model->getUsersFriends($user->id);
        if ($arg == session()->get('id')) {
            $invites = $model->getUsersInvites($user->id);
        } else {
            $invites = [];
        }
        $active = 'friends';

        return view('pages/user.php', ['user' => $user, 'favourite' => $favourite, 'friends' => $friends, 'invites' => $invites, 'active' => $active]);
    }

    public function invite($arg)
    {
        $db = db_connect();
        $model = new FriendsModel($db);
        
        $data = [
            'profile1_id' => session()->get('id'),
            'profile2_id' => $arg
        ];

        $model->addPendingInvite($data);

        return redirect()->to('/user/'.session()->get('id').'/friends');
    }

    public function cancel($arg)
    {
        $db = db_connect();
        $model = new FriendsModel($db);
        
        $data = [
            'profile1_id' => session()->get('id'),
            'profile2_id' => $arg
        ];

        $model->declineInvite($data);

        return redirect()->to('/user/'.session()->get('id').'/friends');
    }

    public function accept($arg)
    {
        $db = db_connect();
        $model = new FriendsModel($db);
        
        $data = [
            'profile1_id' => $arg,
            'profile2_id' => session()->get('id'),
        ];

        $model->acceptInvite($data);

        session()->push('friends', [$arg]);

        return redirect()->to('/user/'.session()->get('id').'/friends');
    }

    public function decline($arg)
    {
        $db = db_connect();
        $model = new FriendsModel($db);
        
        $data = [
            'profile1_id' => $arg,
            'profile2_id' => session()->get('id')
        ];

        $model->declineInvite($data);

        return redirect()->to('/user/'.session()->get('id').'/friends');
    }

    public function remove($arg)
    {
        $db = db_connect();
        $model = new FriendsModel($db);
        
        $data = [
            'profile1_id' => $arg,
            'profile2_id' => session()->get('id')
        ];

        $model->deleteFriend($data);

        $tmp = session()->get('friends');
        unset($tmp[array_search($arg, $tmp)]);
        $tmp = array_values($tmp);
        session()->remove('friends');
        session()->set(['friends' => $tmp]);

        return redirect()->to('/user/'.$arg);
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