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

    // getting data

    function getAll()
    {
        $result = $this->builder
            ->orderBy('name', 'ASC')
            ->get()                     
            ->getResult();

        $data = [
            'tags' => [],
            'genres' => []
        ];

        for ($i = 0; $i < count($result); $i++) {
            if ($result[$i]->genre == 'f') {
                array_push($data['tags'], $result[$i]);
            } else {
                array_push($data['genres'], $result[$i]);
            }
        }

        return $data;
    }

    function getByName($names)
    {
        return $this->builder
            ->orWhereIn('name', $names)
            ->get()                     
            ->getResult();
    }
}