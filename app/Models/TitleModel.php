<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class TitleModel
{
    protected $builder;

    public function __construct(ConnectionInterface &$db)
    {
        $dataBase =& $db;
        $this->builder = $dataBase->table('Titles');
    }

    function getSome($amount)
    {
        return $this->builder
                    ->where(['id <=' => $amount])
                    ->get()                     
                    ->getResult();
    }

    function getByName($name)
    {
        return $this->builder
                    ->where(['name =' => $name])
                    ->get()                     
                    ->getRowArray();
    }
}