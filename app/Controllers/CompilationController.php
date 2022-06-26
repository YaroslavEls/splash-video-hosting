<?php

namespace App\Controllers;

use App\Models\TitleModel;

class CompilationController extends BaseController
{
    public function index()
    {
        $db = db_connect();
        $model = new TitleModel($db);

        if ($str = $this->request->getVar('search')) {
            $data = $model->getLike($str);
            return view('pages/search.php', ['data' => $data, 'heading' => $str]);
        } else {
            $data = $model->getAll();
            return view('pages/compilations.php', ['data' => $data]);
        }
    }
}