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

    public $titleModel;

    public function __construct()
    {
        $db = db_connect();
        $this->titleModel = new TitleModel($db);

        $count = $this->titleModel->countAll();
        $this->current['pages'] = ceil($count/$this->current['perPage']);
    }

    public function index()
    {
        $page = $this->request->getVar('page') == 0 ? 1 : $this->request->getVar('page');
        if ($page > $this->current['pages'] || $page < 0) {
            throw new PageNotFoundException();
        }

        $data = [
            'novelties' => $this->titleModel->getByTag(1), // 1 = id of tag 'new'
            'popular'   => $this->titleModel->getAll($this->current['perPage'], $page),
            'page'      => $page,
            'pages'     => $this->current['pages']
        ];
        return view('pages/main.php', $data);
    }
}