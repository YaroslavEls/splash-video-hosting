<?php

namespace App\Controllers;

use App\Models\TagModel;
use App\Models\TitleModel;
use \CodeIgniter\Exceptions\PageNotFoundException;

class GenreController extends BaseController
{
    public $current = [
        'genre' => '',
        'perPage' => 8,
        'pages' => 0
    ];

    public function index($arg)
    {
        $db = db_connect();
        $model = new TagModel($db);
        $data = $model->getGenreByName($arg);

        if (!$data) {
            throw new PageNotFoundException();
        }

        $model = new TitleModel($db);

        if ($this->current['genre'] != $arg) {
            $this->current['genre'] = $arg;
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

    public function list() 
    {
        $db = db_connect();
        $model = new TagModel($db);
        $data = $model->getAllGenres();
        
        return view('pages/filtres.php', ['data' => $data]);
    }

    public function search($arg)
    {
        $db = db_connect();
        $model = new TitleModel($db);

        if ($this->current['genre'] != $arg) {
            $this->current['genre'] = $arg;
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
}
