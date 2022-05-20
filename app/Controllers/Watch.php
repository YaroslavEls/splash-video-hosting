<?php

namespace App\Controllers;

use App\Models\TitleModel;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Watch extends BaseController
{
    public function index($arg)
    {
        $db = db_connect();
        $model = new TitleModel($db);
        $data = $model->getByName($arg);

        if ($data) {
            return view('watch.php', $data);
        } else {
            throw new PageNotFoundException();
        }
    }
}