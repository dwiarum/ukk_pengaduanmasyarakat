<?php 
namespace App\Models;

use CodeIgniter\Model;

class Masyarakat extends Model{
    protected $table      = 'tblmasyarakat';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_masyarakat';
     protected $allowedFields = ['nik','nama','username','password','telp'];
     protected $useAutoIncrement = true;
}