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

    function getAll()
    {
        return $this->builder
                    ->get()                     
                    ->getResult();
    }

    function getSome($amount)
    {
        return $this->builder
                    ->where(['id <=' => $amount])
                    ->get()                     
                    ->getResult();
    }

    function getLike($str)
    {
        return $this->builder
                    ->like(['name' => $str])
                    ->get()                     
                    ->getResult();
    }

    function getByName($name)
    {
        $title = $this->builder
                        ->where(['Titles.name =' => $name])
                        ->get()                     
                        ->getRow();

        if (!$title) {
            return;
        }

        $genres = $this->builder
                        ->select('Tags.name')
                        ->join('TitlesTags', 'Titles.id = TitlesTags.title_id')
                        ->join('Tags', 'TitlesTags.tag_id = Tags.id')
                        ->where(['Titles.name =' => $name])
                        ->get()                     
                        ->getResultArray();

        $title->genres = [];
        for ($i = 0; $i < count($genres); $i++) {
            $title->genres[$i] = $genres[$i]['name'];
        }

        return $title;
    }

    function getByTag($id)
    {
        return $this->builder
                    ->select('Titles.*')
                    ->join('TitlesTags', 'Titles.id = TitlesTags.title_id')
                    ->join('Tags', 'TitlesTags.tag_id = Tags.id')
                    ->where(['Tags.id =' => $id])
                    ->get()                     
                    ->getResult();
    }
}