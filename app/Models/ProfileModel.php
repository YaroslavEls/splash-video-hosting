<?php namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'Profiles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'image'];
}