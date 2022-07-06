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

    function postUser($data)
    {
        $this->builder->insert($data);
    }

    function getUserByEmail($str)
    {
        $user = $this->builder
                    ->where(['email' => $str])
                    ->get()                     
                    ->getRow();
        
        if (!$user) {
            return;
        }

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

    function getUserById($num)
    {
        $user = $this->builder
                    ->where(['Profiles.id' => $num])
                    ->get()                     
                    ->getRow();
        
        if (!$user) {
            return;
        }

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
}