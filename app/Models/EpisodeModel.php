<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class EpisodeModel
{
    protected $builder;

    public function __construct(ConnectionInterface &$db)
    {
        $dataBase =& $db;
        $this->builder = $dataBase->table('Serias');
    }

    function getOne($title_id, $num)
    {
        return $this->builder
                    ->where(['title_id =' => $title_id])
                    ->where(['number' => $num])
                    ->get()                     
                    ->getRow();
    }
}