<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class TagModel
{
    protected $builder;

    public function __construct(ConnectionInterface &$db)
    {
        $dataBase =& $db;
        $this->builder = $dataBase->table('Tags');
    }

    function getAllGenres()
    {
        return $this->builder
                    ->where(['genre =' => true])
                    ->get()                     
                    ->getResult();
    }

    function getGenreByName($name)
    {
        return $this->builder
                    ->where(['genre =' => true])
                    ->where(['name =' => $name])
                    ->get()                     
                    ->getRow();
    }
}