<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class FriendModel
{
    protected $builder;

    public function __construct(ConnectionInterface &$db)
    {
        $dataBase =& $db;
        $this->builder = $dataBase->table('Friends');
    }

    // getting data

    function getFriendsByUser($id)
    {
        return $this->builder
            ->select('Profiles.id, Profiles.username, Profiles.image, Friends.pending')
            ->join('Profiles', 'Profiles.id = Friends.profile2_id')
            ->where(['profile1_id' => $id, 'pending' => false])
            ->get()                     
            ->getResult();
    }

    function getInvitesByUser($id)
    {
        $outgoing = $this->builder
            ->select('Profiles.id, Profiles.username, Profiles.image')
            ->join('Profiles', 'Profiles.id = Friends.profile2_id')
            ->where(['profile1_id' => $id, 'pending' => true])
            ->get()                     
            ->getResult();

        $incoming = $this->builder
            ->select('Profiles.id, Profiles.username, Profiles.image')
            ->join('Profiles', 'Profiles.id = Friends.profile1_id')
            ->where(['profile2_id' => $id, 'pending' => true])
            ->get()                     
            ->getResult();

        for ($i = 0; $i < count($outgoing); $i++) {
            $outgoing[$i]->direction = 'outgoing';
        }

        for ($i = 0; $i < count($incoming); $i++) {
            $incoming[$i]->direction = 'incoming';
        }

        $invites = array_merge($incoming, $outgoing);
        
        return $invites;
    }

    // posting data

    function postInvite($data)
    {
        $value = $this->builder
            ->where($data)
            ->get()
            ->getResult();

        if ($value) {
            return;
        }
        
        $newData = [
            'profile1_id' => $data['profile2_id'],
            'profile2_id' => $data['profile1_id'],
        ];

        $value = $this->builder
            ->where($newData)
            ->get()
            ->getResult();

        if ($value) {
            $newData['pending'] = false;
            $this->acceptInvite($newData);
            return;
        }

        $this->builder->insert($data);
    }

    function acceptInvite($data)
    {
        $this->builder->delete($data);
        $data['pending'] = false;
        $this->builder->insert($data);
        $newData = [
            'profile1_id' => $data['profile2_id'],
            'profile2_id' => $data['profile1_id'],
            'pending'     => false
        ];
        $this->builder->insert($newData);
    }

    function declineInvite($data)
    {
        $this->builder->delete($data);
    }

    function deleteFriend($data)
    {
        $this->builder->delete($data);
        $newData = [
            'profile1_id' => $data['profile2_id'],
            'profile2_id' => $data['profile1_id']
        ];
        $this->builder->delete($newData);
    }
}