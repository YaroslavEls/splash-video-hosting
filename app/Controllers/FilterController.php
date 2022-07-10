<?php

namespace App\Controllers;

use App\Models\TagModel;
use App\Models\TitleModel;
use App\Models\CompilationModel;
use \CodeIgniter\Exceptions\PageNotFoundException;

class FilterController extends BaseController
{
    public $current = [
        'filter' => '',
        'perPage' => 8,
        'pages' => 0
    ];

    public $tagModel, $titleModel, $compModel;

    public function __construct()
    {
        helper('pagination');
        $db = db_connect();
        $this->tagModel = new TagModel($db);
        $this->titleModel = new TitleModel($db);
        $this->compModel = new CompilationModel($db);
    }

    public function index() 
    {
        $data = $this->tagModel->getAll();
        
        return view('pages/filters.php', $data);
    }

    public function tag($arg)
    {
        $filters = explode(" ", $arg);
        $tags = $this->tagModel->getByName($filters);
        if (count($filters) != count($tags)) {
            throw new PageNotFoundException();
        }
        $ids = array_column($tags, 'id');

        $page = $this->request->getVar('page') == 0 ? 1 : $this->request->getVar('page');
        $count = $this->titleModel->countBySomeTags($ids);
        $this->current = paginationSetup($this->current, $arg, $page, $count);

        $data = [
            'data'      => $count == 0 ? [] : $this->titleModel->getBySomeTags($ids, $this->current['perPage'], $page),
            'heading'   => $arg,
            'page'      => $page,
            'pages'     => $this->current['pages']
        ];
        return view('pages/listing.php', $data);
    }

    public function compilation($arg)
    {
        $comp = $this->compModel->getById($arg);
        if (!$comp) {
            throw new PageNotFoundException();
        }

        $page = $this->request->getVar('page') == 0 ? 1 : $this->request->getVar('page');
        $count = $this->compModel->countTitles($arg);
        $this->current = paginationSetup($this->current, $arg, $page, $count);

        $data = [
            'data'      => $this->compModel->getTitles($arg, $this->current['perPage'], $page),
            'heading'   => $this->compModel->getNameById($arg)->name,
            'page'      => $page,
            'pages'     => $this->current['pages']
        ];
        return view('pages/listing.php', $data);
    }

    public function search($arg)
    {
        $page = $this->request->getVar('page') == 0 ? 1 : $this->request->getVar('page');
        $count = $this->titleModel->countLike($arg);
        $this->current = paginationSetup($this->current, $arg, $page, $count);

        $data = [
            'data'      => $this->titleModel->getLike($arg, $this->current['perPage'], $page),
            'heading'   => $arg,
            'page'      => $page,
            'pages'     => $this->current['pages']
        ];
        return view('pages/listing.php', $data);
    }
}