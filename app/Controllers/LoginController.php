<?php 

namespace App\Controllers; 

use App\Models\UserModel;
  
class LoginController extends BaseController
{
    public function index()
    {
        session()->destroy();
        return view('pages/login');
    } 
  
    public function auth()
    {
        $session = session();

        $db = db_connect();
        $userModel = new UserModel($db);
        
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $userModel->getByEmail($email);
        
        if (!$data) {
            $session->setFlashdata('msg', 'Email does not exist.');
            return view('pages/login.php');
        }

        if ($password != $data->password) {
            $session->setFlashdata('msg', 'Password is incorrect.');
            return view('pages/login.php');
        }

        $ses_data = [
            'id' => $data->id,
            'username' => $data->username,
            'email' => $data->email,
            'image' => $data->image,
            'comps' => $data->comps,
            'compsDefault' => $data->compsDefault,
            'friends' => $data->friends,
            'isLoggedIn' => TRUE
        ];
        $session->set($ses_data);
        return redirect()->to('/'); 
    }

    public function exit()
    {
        session()->destroy();
        return redirect()->to('/'); 
    }
}