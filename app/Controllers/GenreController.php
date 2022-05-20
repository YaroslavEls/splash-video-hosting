<?php

namespace App\Controllers;

use App\Models\TagModel;
use App\Models\TitleModel;
use \CodeIgniter\Exceptions\PageNotFoundException;

class GenreController extends BaseController
{
    public function index($arg)
    {
        $db = db_connect();
        $model = new TagModel($db);
        $data = $model->getGenreByName($arg);

        if ($data) {
            $model = new TitleModel($db);
            $data = $model->getByTag($data->id);
            
            return view('main.php', ['data' => $data]);
        } else {
            throw new PageNotFoundException();
        }
    }

    public function list() 
    {
        $db = db_connect();
        $model = new TagModel($db);
        $data = $model->getAllGenres();
        
        return view('genre.php', ['data' => $data]);
    }
}
