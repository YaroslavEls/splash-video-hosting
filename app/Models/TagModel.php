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

    function getAll()
    {
        return $this->builder
                    ->get()                     
                    ->getResult();
    }

    function getAllTags() 
    {
        return $this->builder
                    ->where(['genre =' => false])
                    ->get()                     
                    ->getResult();
    }

    function getTagByName($name)
    {
        return $this->builder
                    ->where(['genre =' => false])
                    ->where(['name =' => $name])
                    ->get()                     
                    ->getRow();
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