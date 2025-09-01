<?php

namespace App\Models;
use CodeIgniter\Model;

class CategoriasModel extends Model
{
    protected $table      = 'categoria';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id','name'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = false; //true
    protected $dateFormat    = 'datetime'; //date //int

//     //a que columna la va a gregar
//     protected $createdField  = 'created_at'; //nombre de la comuna
//     protected $updatedField  = 'updated_at'; //--
//     protected $deletedField  = 'deleted_at'; //--


  public function get_cat_id($id)
  {
    return $this->db->table('categoria')
        ->select('*')
        ->where('id',$id)
        ->get()
        ->getRow();
  }

 }

?>