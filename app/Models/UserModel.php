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
        return $this->builder
                    ->where(['email' => $str])
                    ->get()                     
                    ->getRow();
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

        $compilations = $this->builder
                            ->select('Lists.*')
                            ->join('Lists', 'Profiles.id = Lists.owner')
                            ->where(['Profiles.id' => $num])
                            ->get()                     
                            ->getResult();

        $user->compilations = [];
        $user->compilationsDefault = [];

        for ($i = 0; $i < count($compilations); $i++) {
            if ($compilations[$i]->default == 't') {
                array_push($user->compilationsDefault, $compilations[$i]);
            } else {
                array_push($user->compilations, $compilations[$i]);
            }
        }

        return $user;
    }
}