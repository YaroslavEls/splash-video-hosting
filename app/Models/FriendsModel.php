<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class FriendsModel
{
    protected $builder;

    public function __construct(ConnectionInterface &$db)
    {
        $dataBase =& $db;
        $this->builder = $dataBase->table('Friends');
    }

    function getUsersFriends($id)
    {
        return $this->builder
                    ->select('Profiles.id, Profiles.username, Profiles.image')
                    ->join('Profiles', 'Profiles.id = Friends.profile2_id')
                    ->where(['profile1_id' => $id])
                    ->get()                     
                    ->getResult();
    }
}