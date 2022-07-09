<?php

namespace App\Controllers;

use App\Models\CompilationModel;

class CompilationController extends BaseController
{
    public $current = [
        'filter'  => '',
        'perPage' => 3,
        'pages' => 0
    ];

    public $compModel;

    public function __construct()
    {
        helper('pagination');
        $db = db_connect();
        $this->compModel = new CompilationModel($db);
    }

    public function index()
    {
        $page = $this->request->getVar('page') == 0 ? 1 : $this->request->getVar('page');
        $count = $this->compModel->countAll();
        $this->current = paginationSetup($this->current, 'main', $page, $count);

        $data = [
            'data'  => $this->compModel->getAll($this->current['perPage'], $page),
            'page'  => $page,
            'pages' => $this->current['pages']
        ];
        return view('pages/compilations.php', $data);
    }

    public function search($arg)
    {
        $page = $this->request->getVar('page') == 0 ? 1 : $this->request->getVar('page');
        $count = $this->compModel->countLike($arg);
        $this->current = paginationSetup($this->current, $arg, $page, $count);

        $data = [
            'data'  => $this->compModel->getLike($arg, $this->current['perPage'], $page),
            'page'  => $page,
            'pages' => $this->current['pages']
        ];
        return view('pages/compilations.php', $data);
    }
}