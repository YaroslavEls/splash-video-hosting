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

    public function index() 
    {
        $db = db_connect();
        $model = new TagModel($db);

        $data = $model->getAll();

        $tags = array();
        $genres = array();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->genre == 't') {
                array_push($genres, $data[$i]);
            } else {
                array_push($tags, $data[$i]);
            }
        }

        return view('pages/filters.php', ['tags' => $tags, 'genres' => $genres]);
    }

    public function genre($arg)
    {
        $db = db_connect();
        $model = new TagModel($db);
        $data = $model->getGenreByName($arg);

        if (!$data) {
            throw new PageNotFoundException();
        }

        $model = new TitleModel($db);

        if ($this->current['filter'] != $arg) {
            $this->current['filter'] = $arg;
            $count = $model->countTitlesPerTag($data->id);
            $this->current['pages'] = ceil($count/$this->current['perPage']);
        }

        $page = $this->request->getVar('page');
        $page = $page == 0 ? 1 : $page;
        if ($page > $this->current['pages'] || $page < 0) {
            throw new PageNotFoundException();
        }

        $data = $model->getByTagPerPage($data->id, $this->current['perPage'], $page);  
        return view('pages/listing.php', ['data' => $data, 'heading' => $arg, 'page' => $page, 'pages' => $this->current['pages']]);
    }

    public function tag($arg)
    {
        $db = db_connect();
        $model = new TagModel($db);
        $data = $model->getTagByName($arg);

        if (!$data) {
            throw new PageNotFoundException();
        }

        $model = new TitleModel($db);

        if ($this->current['filter'] != $arg) {
            $this->current['filter'] = $arg;
            $count = $model->countTitlesPerTag($data->id);
            $this->current['pages'] = $count == 0 ? 1 : ceil($count/$this->current['perPage']);
        }

        $page = $this->request->getVar('page');
        $page = $page == 0 ? 1 : $page;
        if ($page > $this->current['pages'] || $page < 0) {
            throw new PageNotFoundException();
        }

        $data = $model->getByTagPerPage($data->id, $this->current['perPage'], $page);  
        return view('pages/listing.php', ['data' => $data, 'heading' => $arg, 'page' => $page, 'pages' => $this->current['pages']]);
    }

    public function searchTitle($arg)
    {
        $db = db_connect();
        $model = new TitleModel($db);

        if ($this->current['filter'] != $arg) {
            $this->current['filter'] = $arg;
            $count = $model->countTitlesLike($arg);
            $this->current['pages'] = $count == 0 ? 1 : ceil($count/$this->current['perPage']);
        }

        $page = $this->request->getVar('page');
        $page = $page == 0 ? 1 : $page;
        if ($page > $this->current['pages'] || $page < 0) {
            throw new PageNotFoundException();
        }

        $data = $model->getLikePerPage($arg, $this->current['perPage'], $page);
        return view('pages/listing.php', ['data' => $data, 'heading' => $arg, 'page' => $page, 'pages' => $this->current['pages']]);
    }

    public function searchCompilation($arg)
    {
        $db = db_connect();
        $model = new CompilationModel($db);

        if ($this->current['filter'] != $arg) {
            $this->current['filter'] = $arg;
            $count = $model->countLike($arg);
            $this->current['pages'] = $count == 0 ? 1 : ceil($count/$this->current['perPage']);
        }

        $page = $this->request->getVar('page');
        $page = $page == 0 ? 1 : $page;
        if ($page > $this->current['pages'] || $page < 0) {
            throw new PageNotFoundException();
        }

        $data = $model->getLike($arg, $this->current['perPage'], $page);
        return view('pages/compilations.php', ['data' => $data, 'heading' => $arg, 'page' => $page, 'pages' => $this->current['pages']]);
    }
}
