<?php

namespace App\Controllers;

use App\Models\CompilationModel;
use \CodeIgniter\Exceptions\PageNotFoundException;

class CompilationController extends BaseController
{
    public $current = [
        'perPage' => 2,
        'pages' => 0
    ];

    public function __construct()
    {
        $db = db_connect();
        $model = new CompilationModel($db);
        $count = $model->countAll();
        
        $this->current['pages'] = ceil($count/$this->current['perPage']);
    }

    public function index()
    {
        $db = db_connect();
        $model = new CompilationModel($db);

        $page = $this->request->getVar('page');
        $page = $page == 0 ? 1 : $page;
        if ($page > $this->current['pages'] || $page < 0) {
            throw new PageNotFoundException();
        }

        $data = $model->getAllWithTitles($this->current['perPage'], $page);
        return view('pages/compilations.php', ['data' => $data, 'page' => $page, 'pages' => $this->current['pages']]);

    }
}