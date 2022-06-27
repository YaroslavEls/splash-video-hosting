<?php 

namespace App\Controllers; 

use App\Models\UserModel;
  
class LoginController extends BaseController
{
    public function index()
    {
        // helper(['form']);
        echo view('pages/login');
    } 
  
    public function auth()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('email', $email)->first();
        
        if($data){
            $pass = $data['password'];
            // $authenticatePassword = password_verify($password, $pass);
            if($password == $pass){
                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/'); 
                //return view('pages/main.php');
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return view('pages/login.php');
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return view('pages/login.php');
        }
    }
  
}