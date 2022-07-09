<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class CommentModel
{
    protected $builder;

    public function __construct(ConnectionInterface &$db)
    {
        $dataBase =& $db;
        $this->builder = $dataBase->table('Comments');
    }

    // getting data

    function getByTitle($id)
    {
        return $this->builder
            ->select('Comments.text, Comments.created_at, Profiles.id, Profiles.username, Profiles.image')
            ->join('Profiles', 'Profiles.id = Comments.user_id')
            ->where(['title_id =' => $id])
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getResult();
    }

    function countByTitle($id)
    {
        return $this->builder
            ->where(['title_id =' => $id])
            ->countAllResults();
    }

    // posting data

    function postOne($data)
    {
        $this->builder->insert($data);
    }
}