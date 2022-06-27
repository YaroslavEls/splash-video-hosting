<?php 

namespace App\Controllers; 

use App\Models\ProfileModel;
  
class RegistrationController extends BaseController
{
    public function index()
    {
        // helper(['form']);
        echo view('pages/registration');
    } 
  
    public function auth()
    {

    }
  
}