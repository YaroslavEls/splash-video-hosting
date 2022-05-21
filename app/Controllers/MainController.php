<?php

namespace App\Controllers;

use App\Models\TitleModel;

class MainController extends BaseController
{
    public function index()
    {
        $db = db_connect();
        $model = new TitleModel($db);

        if ($str = $this->request->getVar('search')) {
            $data = $model->getLike($str);
            $heading = 'Results: '.$str;
        } else {
            $data = $model->getAll();
            $heading = 'Main Page';
        }
        
        return view('pages/main.php', ['data' => $data, 'heading' => $heading]);
    }
}
