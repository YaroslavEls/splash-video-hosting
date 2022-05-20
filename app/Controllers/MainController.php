<?php

namespace App\Controllers;

use App\Models\TitleModel;

class MainController extends BaseController
{
    public function index()
    {
        $db = db_connect();
        $model = new TitleModel($db);
        $data = $model->getSome(12);
        
        return view('main.php', ['data' => $data]);
    }
}
