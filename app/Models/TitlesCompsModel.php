<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class TitlesCompsModel
{
    protected $builder;

    public function __construct(ConnectionInterface &$db)
    {
        $dataBase =& $db;
        $this->builder = $dataBase->table('TitlesLists');
    }

    // posting data

    function postOne($data)
    {
        $this->builder->insert($data);
    }
}