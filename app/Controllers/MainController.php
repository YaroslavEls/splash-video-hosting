<?php

namespace App\Controllers;

use App\Models\TitleModel;
use \CodeIgniter\Exceptions\PageNotFoundException;

class MainController extends BaseController
{
    public $current = [
        'perPage' => 12,
        'pages' => 0
    ];

    public function __construct()
    {
        $db = db_connect();
        $model = new TitleModel($db);
        $count = $model->countAll();
        
        $this->current['pages'] = ceil($count/$this->current['perPage']);
    }

    public function index()
    {
        $db = db_connect();
        $model = new TitleModel($db);

        $page = $this->request->getVar('page');
        $page = $page == 0 ? 1 : $page;
        if ($page > $this->current['pages'] || $page < 0) {
            throw new PageNotFoundException();
        }

        $novelties = $model->getByTag(1); // 1 = id of tag 'new'
        $popular = $model->getAllPerPage($this->current['perPage'], $page);
        return view('pages/main.php', ['novelties' => $novelties, 'popular' => $popular, 'page' => $page, 'pages' => $this->current['pages']]);
    }
}