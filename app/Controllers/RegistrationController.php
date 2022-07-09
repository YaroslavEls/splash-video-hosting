<?php 

namespace App\Controllers; 

use App\Models\UserModel;
use App\Models\CompilationModel;
  
class RegistrationController extends BaseController
{
    public function index()
    {
        session()->destroy();
        return view('pages/registration');
    } 
  
    public function auth()
    {
        $rules = [
            'username'       => 'required|min_length[4]|max_length[50]',
            'email'          => 'required|min_length[4]|max_length[50]',
            'password'       => 'required|min_length[4]|max_length[50]',
            'passwordRepeat' => 'matches[password]'
        ];

        if(!$this->validate($rules)){
            return view('pages/registration.php');
        }

        $db = db_connect();

        $userModel = new UserModel($db);
        $data = [
            'username' => $this->request->getVar('username'),
            'email'    => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'image'    => 'default.jpg'
        ];
        $userModel->postOne($data);

        $compilationModel = new CompilationModel($db);
        $compilationModel->postDefaults($db->insertID());
    
        return redirect()->to('/login');
    }
}