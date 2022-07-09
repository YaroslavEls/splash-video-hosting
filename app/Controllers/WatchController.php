<?php

namespace App\Controllers;

use App\Models\TitleModel;
use App\Models\CommentModel;
use \CodeIgniter\Exceptions\PageNotFoundException;

class WatchController extends BaseController
{
    public $titleModel, $commentModel;

    public function __construct()
    {
        helper('pagination');
        $db = db_connect();
        $this->titleModel = new TitleModel($db);
        $this->commentModel = new CommentModel($db);
    }

    public function index($arg)
    {
        $data = $this->titleModel->getByName($arg);
        if (!$data) {
            throw new PageNotFoundException('no such title');
        } 

        $data = [
            'data'      => $data,
            'novelties' => $this->titleModel->getByTag(1), // 1 = id of tag 'new'
            'count'     => $this->commentModel->countByTitle($data->id),
            'comments'  => $this->commentModel->getByTitle($data->id)
        ];
        return view('pages/watch.php', $data);
    }

    public function comment($arg)
    {
        $title = $this->titleModel->getIdByName($arg);
        
        $data = [
            'text'     => $this->request->getVar('text'),
            'user_id'  => session()->get('id'),
            'title_id' => $title->id
        ];

        $this->commentModel->postOne($data);
        
        return redirect()->to('/watch/'.$arg.'#comments'); 
    }
}