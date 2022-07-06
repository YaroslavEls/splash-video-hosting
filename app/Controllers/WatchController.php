<?php

namespace App\Controllers;

use App\Models\TitleModel;
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
        return view('pages/watch.php', ['data' => $data, 'novelties' => $novelties]);
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