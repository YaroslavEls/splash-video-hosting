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

    // getting data

    function getAll($perPage = 0, $page = 0)
    {
        $lists = $this->builder
            ->where(['public' => true, 'default' => false])
            ->limit($perPage, ($page-1)*$perPage)
            ->get()
            ->getResult();
        
        $ids = array_column($lists, 'id');

        $titles = $this->builder
            ->select('Titles.*')
            ->select('TitlesLists.list_id')
            ->join('TitlesLists', 'Lists.id = TitlesLists.list_id')
            ->join('Titles', 'Titles.id = TitlesLists.title_id')
            ->whereIn('TitlesLists.list_id', $ids)
            ->get()                     
            ->getResult();

        for ($i = 0; $i < count($lists); $i++) {
            $lists[$i]->titles = array();
        }

        for ($i = 0; $i < count($titles); $i++) {
            $key = array_search($titles[$i]->list_id, array_column($lists, 'id'));
            array_push($lists[$key]->titles, $titles[$i]);
        }

        return $lists;
    }

    function countAll()
    {
        return $this->builder
            ->where(['public' => true, 'default' => false])
            ->countAllResults();
    }

    function getById($id)
    {
        $compilation = $this->builder
            ->select('id, name')
            ->where(['id' => $id])
            ->get()                     
            ->getRow();

        $titles = $this->builder
            ->select('Titles.*')
            ->join('TitlesLists', 'Lists.id = TitlesLists.list_id')
            ->join('Titles', 'Titles.id = TitlesLists.title_id')
            ->where(['TitlesLists.list_id =' => $id])
            ->get()                     
            ->getResult();

        $compilation->titles = $titles;
        return $compilation;
    }

    function getOneByUser($list_name, $user_id)
    {
        return $this->builder
            ->select('Titles.*')
            ->join('TitlesLists', 'Lists.id = TitlesLists.list_id')
            ->join('Titles', 'Titles.id = TitlesLists.title_id')
            ->where(['Lists.owner' => $user_id, 'Lists.name' => $list_name])
            ->get()                     
            ->getResult();
    }

    function getTitles($id, $perPage = 0, $page = 0)
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

    function countTitles($id)
    {
        return $this->builder
            ->select('Titles.*')
            ->join('TitlesLists', 'Lists.id = TitlesLists.list_id')
            ->join('Titles', 'Titles.id = TitlesLists.title_id')
            ->where(['TitlesLists.list_id =' => $id])
            ->countAllResults();
    }

    function getLike($str, $perPage = 0, $page = 0)
    {
        $lists = $this->builder
            ->like(['name' => $str], '', 'both', null, true)
            ->limit($perPage, ($page-1)*$perPage)
            ->get()
            ->getResult();

        if (!$lists) return $lists;
        
        $ids = array_column($lists, 'id');
        
        $titles = $this->builder
            ->select('Titles.*')
            ->select('TitlesLists.list_id')
            ->join('TitlesLists', 'Lists.id = TitlesLists.list_id')
            ->join('Titles', 'Titles.id = TitlesLists.title_id')
            ->whereIn('TitlesLists.list_id', $ids)
            ->get()                     
            ->getResult();

        for ($i = 0; $i < count($lists); $i++) {
            $lists[$i]->titles = array();
        }

        for ($i = 0; $i < count($titles); $i++) {
            $key = array_search($titles[$i]->list_id, array_column($lists, 'id'));
            array_push($lists[$key]->titles, $titles[$i]);
        }

        return $lists;
    }

    function countLike($str)
    {
        return $this->builder
            ->like(['name' => $str])
            ->countAllResults();
    }

    function getNameById($id)       // ???
    {
        return $this->builder
                    ->select('Lists.name')
                    ->where(['Lists.id =' => $id])
                    ->get()                     
                    ->getRow();
    }

    // posting data
    
    function postOne($data)
    {
        $this->builder->insert($data);
    }

    function postDefaults($id)
    {
        $data = [
            [
                'name'    => 'Просмотрено',
                'owner'   => $id,
                'public'  => true,
                'default' => true
            ],
            [
                'name'    => 'Любимое',
                'owner'   => $id,
                'public'  => true,
                'default' => true
            ],
            [
                'name'    => 'Буду смотреть',
                'owner'   => $id,
                'public'  => true,
                'default' => true
            ]
        ];
        $this->builder->insertBatch($data);
    }
}