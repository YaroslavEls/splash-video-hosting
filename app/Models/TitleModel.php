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

    function getAllPerPage($perPage, $page) 
    {
        return $this->builder
                    ->limit($perPage, ($page-1)*$perPage)
                    ->get()                     
                    ->getResult();
    }

    function countAll()
    {
        return $this->builder
                    ->countAllResults();
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
                    ->like(['name' => $str], '', 'both', null, true)
                    ->get()                     
                    ->getResult();
    }

    function getLikePerPage($str, $perPage, $page)
    {
        return $this->builder
                    ->like(['name' => $str], '', 'both', null, true)
                    ->limit($perPage, ($page-1)*$perPage)
                    ->get()                     
                    ->getResult();
    }

    function countTitlesLike($str)
    {
        return $this->builder
                    ->like(['name' => $str])
                    ->countAllResults();
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

    function countTitlesPerTag($id)
    {
        return $this->builder
                    ->select('Titles.*')
                    ->join('TitlesTags', 'Titles.id = TitlesTags.title_id')
                    ->join('Tags', 'TitlesTags.tag_id = Tags.id')
                    ->where(['Tags.id =' => $id])
                    ->countAllResults();
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

    function getByTagPerPage($id, $perPage, $page) {
        return $this->builder
                    ->select('Titles.*')
                    ->join('TitlesTags', 'Titles.id = TitlesTags.title_id')
                    ->join('Tags', 'TitlesTags.tag_id = Tags.id')
                    ->where(['Tags.id =' => $id])
                    ->limit($perPage, ($page-1)*$perPage)
                    ->get()                     
                    ->getResult();
    }
}