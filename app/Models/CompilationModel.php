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

    function getAll()
    {
        return $this->builder
                    ->get()                     
                    ->getResult();
    }

    function countAll()
    {
        return $this->builder
                    ->where(['public' => true, 'default' => false])
                    ->countAllResults();
    }

    function getAllWithTitles($perPage, $page)
    {
        $lists = $this->builder
                        ->where(['public' => true, 'default' => false])
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

    function getAllById($id)
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

    function getFavouriteByUser($id)
    {
        return $this->builder
                    ->select('Titles.*')
                    ->join('TitlesLists', 'Lists.id = TitlesLists.list_id')
                    ->join('Titles', 'Titles.id = TitlesLists.title_id')
                    ->where(['Lists.owner' => $id, 'Lists.name' => 'Любимое'])
                    ->get()                     
                    ->getResult();
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

    function getLike($str, $perPage, $page)
    {
        $lists = $this->builder
                        ->like(['name' => $str], '', 'both', null, true)
                        ->limit($perPage, ($page-1)*$perPage)
                        ->get()
                        ->getResult();

        if (!$lists) {
            return $lists;
        }
        
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

    function countLike($str)
    {
        return $this->builder
                    ->like(['name' => $str])
                    ->countAllResults();
    }
}