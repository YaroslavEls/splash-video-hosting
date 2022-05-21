<?php

namespace App\Controllers;

use App\Models\TitleModel;

class MainController extends BaseController
{
    public function index()
    {
        $db = db_connect();
        $model = new TitleModel($db);
        $data = $model->getAll();
        
        return view('pages/main.php', ['data' => $data]);
    }
}
