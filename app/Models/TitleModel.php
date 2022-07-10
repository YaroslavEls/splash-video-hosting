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

    // getting data

    function getAll($perPage = 0, $page = 0) 
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

    function getLike($str, $perPage = 0, $page = 0)
    {
        return $this->builder
            ->like(['name' => $str], '', 'both', null, true)
            ->limit($perPage, ($page-1)*$perPage)
            ->get()                     
            ->getResult();
    }

    function countLike($str)
    {
        return $this->builder
            ->like(['name' => $str])
            ->countAllResults();
    }

    function getByTag($id, $perPage = 0, $page = 0) 
    {
        return $this->builder
            ->select('Titles.*')
            ->join('TitlesTags', 'Titles.id = TitlesTags.title_id')
            ->join('Tags', 'TitlesTags.tag_id = Tags.id')
            ->where(['Tags.id =' => $id])
            ->limit($perPage, ($page-1)*$perPage)
            ->get()                     
            ->getResult();
    }

    function countByTag($id)
    {
        return $this->builder
            ->select('Titles.*')
            ->join('TitlesTags', 'Titles.id = TitlesTags.title_id')
            ->join('Tags', 'TitlesTags.tag_id = Tags.id')
            ->where(['Tags.id =' => $id])
            ->countAllResults();
    }

    function getBySomeTags($ids, $perPage = 0, $page = 0) 
    {
        $pairs = $this->builder
            ->select('TitlesTags.*')
            ->join('TitlesTags', 'Titles.id = TitlesTags.title_id')
            ->join('Tags', 'TitlesTags.tag_id = Tags.id')
            ->orWhereIn('TitlesTags.tag_id', $ids)
            ->get()                     
            ->getResult();

        $count = array_count_values(array_column($pairs, 'title_id'));
        $title_ids = [];

        foreach ($count as $key => $value) {
            if ($value == count($ids)) {
                array_push($title_ids, $key);
            }
        }
        unset($value);

        $titles = $this->builder
            ->select('Titles.*')
            ->orWhereIn('Titles.id', $title_ids)
            ->limit($perPage, ($page-1)*$perPage)
            ->get()                     
            ->getResult();

        return $titles;
    }

    function countBySomeTags($ids)
    {
        $pairs = $this->builder
            ->select('TitlesTags.*')
            ->join('TitlesTags', 'Titles.id = TitlesTags.title_id')
            ->join('Tags', 'TitlesTags.tag_id = Tags.id')
            ->orWhereIn('TitlesTags.tag_id', $ids)
            ->get()                     
            ->getResult();

        $count = array_count_values(array_column($pairs, 'title_id'));
        $title_ids = [];

        foreach ($count as $key => $value) {
            if ($value == count($ids)) {
                array_push($title_ids, $key);
            }
        }
        unset($value);

        return count($title_ids);
    }

    function getByName($name)
    {
        $title = $this->builder
            ->where(['Titles.name =' => $name])
            ->get()                     
            ->getRow();

        if (!$title) return;

        $genres = $this->builder
            ->select('Tags.name')
            ->join('TitlesTags', 'Titles.id = TitlesTags.title_id')
            ->join('Tags', 'TitlesTags.tag_id = Tags.id')
            ->where(['Titles.name =' => $name])
            ->get()                     
            ->getResultArray();

        $title->genres = array_column($genres, 'name');
        return $title;
    }

    function getIdByName($name)     // ???
    {
        return $this->builder
                    ->select('id')
                    ->where(['Titles.name =' => $name])
                    ->get()                     
                    ->getRow();
    }
}