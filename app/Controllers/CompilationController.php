<?php

namespace App\Controllers;

use App\Models\CompilationModel;
use \CodeIgniter\Exceptions\PageNotFoundException;

class CompilationController extends BaseController
{
    public $current = [
        'filter' => '',
        'perPage' => 3,
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

        if ($this->current['filter'] != '') {
            $this->current['filter'] = '';
            $this->current['perPage'] = 3;
            $count = $model->countAll();
            $this->current['pages'] = ceil($count/$this->current['perPage']);
        }

        $page = $this->request->getVar('page');
        $page = $page == 0 ? 1 : $page;
        if ($page > $this->current['pages'] || $page < 0) {
            throw new PageNotFoundException();
        }

        $data = $model->getAllWithTitles($this->current['perPage'], $page);
        return view('pages/compilations.php', ['data' => $data, 'page' => $page, 'pages' => $this->current['pages']]);
    }

    public function list($arg)
    {
        $db = db_connect();
        $model = new CompilationModel($db);

        if ($this->current['filter'] != $arg) {
            $this->current['filter'] = $arg;
            $this->current['perPage'] = 8;
            $count = $model->countById($arg);
            $this->current['pages'] = ceil($count/$this->current['perPage']);
        }

        $page = $this->request->getVar('page');
        $page = $page == 0 ? 1 : $page;
        if ($page > $this->current['pages'] || $page < 0) {
            throw new PageNotFoundException();
        }

        $data = $model->getById($arg, $this->current['perPage'], $page);
        $name = $model->getNameById($arg)->name;
        return view('pages/listing.php', ['data' => $data, 'heading' => $name, 'page' => $page, 'pages' => $this->current['pages']]);
    }
}