<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class CompilationModel
{
    protected $builder;

    public function __construct(ConnectionInterface &$db)
    {
        $dataBase =& $db;
        $this->builder = $dataBase->table('Lists');
    }

    function getAll()
    {
        return $this->builder
                    ->get()                     
                    ->getResult();
    }

    function countAll()
    {
        return $this->builder
                    ->countAllResults();
    }

    function getAllWithTitles($perPage, $page)
    {
        $lists = $this->builder
                        ->limit($perPage, ($page-1)*$perPage)
                        ->get()
                        ->getResult();
        
        $ids = array();
        for ($i = 0; $i < count($lists); $i++) {
            $lists[$i]->titles = array();
            array_push($ids, $lists[$i]->id);
        }

        $titles = $this->builder
                        ->select('Titles.*')
                        ->select('TitlesLists.list_id')
                        ->join('TitlesLists', 'Lists.id = TitlesLists.list_id')
                        ->join('Titles', 'Titles.id = TitlesLists.title_id')
                        ->whereIn('TitlesLists.list_id', $ids)
                        ->get()                     
                        ->getResult();

        for ($i = 0; $i < count($lists); $i++) {
            for ($t = 0; $t < count($titles); $t++) {
                if ($titles[$t]->list_id == $lists[$i]->id) {
                    array_push($lists[$i]->titles, $titles[$t]);
                }
            }
        }

        return $lists;
    }

    function getById($id, $perPage, $page)
    {
        return $this->builder
                    ->select('Titles.*')
                    ->join('TitlesLists', 'Lists.id = TitlesLists.list_id')
                    ->join('Titles', 'Titles.id = TitlesLists.title_id')
                    ->where(['TitlesLists.list_id =' => $id])
                    ->limit($perPage, ($page-1)*$perPage)
                    ->get()                     
                    ->getResult();
    }

    function countById($id)
    {
        return $this->builder
                    ->select('Titles.*')
                    ->join('TitlesLists', 'Lists.id = TitlesLists.list_id')
                    ->join('Titles', 'Titles.id = TitlesLists.title_id')
                    ->where(['TitlesLists.list_id =' => $id])
                    ->countAllResults();
    }

    function getNameById($id)
    {
        return $this->builder
                    ->select('Lists.name')
                    ->where(['Lists.id =' => $id])
                    ->get()                     
                    ->getRow();
    }
}