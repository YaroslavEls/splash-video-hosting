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

        $compilations = $this->builder
                            ->select('Lists.*')
                            ->join('Lists', 'Profiles.id = Lists.owner')
                            ->where(['Profiles.id' => $num])
                            ->get()                     
                            ->getResult();

        $user->compilations = $compilations;
        return $user;
    }
}