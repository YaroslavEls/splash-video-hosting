<?php

namespace App\Controllers;

use App\Models\TitleModel;
use App\Models\CommentModel;
// use App\Models\EpisodeModel;
use \CodeIgniter\Exceptions\PageNotFoundException;

class WatchController extends BaseController
{
    public function index($arg)
    {
        $db = db_connect();
        $model = new TitleModel($db);
        $data = $model->getByName($arg);

        if (!$data) {
            throw new PageNotFoundException('no such title');
        } 
        
        $novelties = $model->getByTag(1); // 1 = id of tag 'new'

        $model = new CommentModel($db);
        $count = $model->countByTitle($data->id);
        $comments = $model->getByTitle($data->id);

        return view('pages/watch.php', ['data' => $data, 'novelties' => $novelties, 'count' => $count, 'comments' => $comments]);
    }

    public function comment($arg)
    {
        $db = db_connect();
        $model = new TitleModel($db);
        $title = $model->getIdByName($arg);
        
        $data = [
            'text'     => $this->request->getVar('text'),
            'user_id'  => session()->get('id'),
            'title_id' => $title->id
        ];

        $model = new CommentModel($db);
        $model->addComment($data);
        
        return redirect()->to('/watch/'.$arg.'#comments'); 
    }

    public function episode($arg1, $arg2)
    {
        // $db = db_connect();
        // $model = new TitleModel($db);
        // $data = $model->getByName($arg1);

        // if (!$data) {
        //     throw new PageNotFoundException('no such title');
        // }

        // $info = new \stdClass;
        // $info->title = $data;

        // $model = new EpisodeModel($db);
        // $data = $model->getOne($data->id, $arg2);

        // if (!$data) {
        //     throw new PageNotFoundException('no such episode');
        // }

        // $data->number = $arg2;
        // $info->episode = $data;

        // return view('pages/episode.php', ['data' => $info]);
    }
}