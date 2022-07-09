<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class UserModel
{
    protected $builder;

    public function __construct(ConnectionInterface &$db)
    {
        $dataBase =& $db;
        $this->builder = $dataBase->table('Profiles');
    }

    // getting data

    function getByEmail($str)
    {
        $user = $this->builder
            ->where(['email' => $str])
            ->get()                     
            ->getRow();
        
        if (!$user) return;

        $friends = $this->builder
            ->select('Friends.profile2_id')
            ->join('Friends', 'Friends.profile1_id = Profiles.id')
            ->where(['Profiles.email' => $str])
            ->get()
            ->getResult();

        $user->friends = array_column($friends, 'profile2_id');

        $comps = $this->builder
            ->select('Lists.*')
            ->join('Lists', 'Profiles.id = Lists.owner')
            ->where(['Profiles.email' => $str])
            ->get()                     
            ->getResult();

        $user->comps = [];
        $user->compsDefault = [];

        for ($i = 0; $i < count($comps); $i++) {
            if ($comps[$i]->default == 't') {
                array_push($user->compsDefault, $comps[$i]);
            } else {
                array_push($user->comps, $comps[$i]);
            }
        }

        return $user;
    }

    function getById($num)
    {
        $user = $this->builder
            ->where(['Profiles.id' => $num])
            ->get()                     
            ->getRow();
        
        if (!$user) return;

        $comps = $this->builder
            ->select('Lists.*')
            ->join('Lists', 'Profiles.id = Lists.owner')
            ->where(['Profiles.id' => $num])
            ->get()                     
            ->getResult();

        $user->comps = [];
        $user->compsDefault = [];

        for ($i = 0; $i < count($comps); $i++) {
            if ($comps[$i]->default == 't') {
                array_push($user->compsDefault, $comps[$i]);
            } else {
                array_push($user->comps, $comps[$i]);
            }
        }

        return $user;
    }

    // posting data

    function postOne($data)
    {
        $this->builder->insert($data);
    }
}