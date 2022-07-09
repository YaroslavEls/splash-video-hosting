<?php

namespace App\Controllers;

use App\Models\FriendModel;

class FriendController extends BaseController
{
    public $friendsModel;

    public function __construct()
    {
        $db = db_connect();
        $this->friendsModel = new FriendModel($db);
    }

    public function invite($arg)
    {
        $data = [
            'profile1_id' => session()->get('id'),
            'profile2_id' => $arg
        ];

        $this->friendsModel->postInvite($data);

        return redirect()->to('/user/'.session()->get('id').'/friends');
    }

    public function cancel($arg)
    {
        $data = [
            'profile1_id' => session()->get('id'),
            'profile2_id' => $arg
        ];

        $this->friendsModel->declineInvite($data);

        return redirect()->to('/user/'.session()->get('id').'/friends');
    }

    public function accept($arg)
    {
        $data = [
            'profile1_id' => $arg,
            'profile2_id' => session()->get('id'),
        ];

        $this->friendsModel->acceptInvite($data);

        session()->push('friends', [$arg]);

        return redirect()->to('/user/'.session()->get('id').'/friends');
    }

    public function decline($arg)
    {
        $data = [
            'profile1_id' => $arg,
            'profile2_id' => session()->get('id')
        ];

        $this->friendsModel->declineInvite($data);

        return redirect()->to('/user/'.session()->get('id').'/friends');
    }

    public function remove($arg)
    {
        $data = [
            'profile1_id' => $arg,
            'profile2_id' => session()->get('id')
        ];

        $this->friendsModel->deleteFriend($data);

        $tmp = session()->get('friends');
        unset($tmp[array_search($arg, $tmp)]);
        $tmp = array_values($tmp);
        session()->remove('friends');
        session()->set(['friends' => $tmp]);

        return redirect()->to('/user/'.$arg);
    }
}