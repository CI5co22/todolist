<?php

namespace App\Models;
use CodeIgniter\Model;

class Marcas_Model extends Model
{
    protected $table      = 'marcas';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id','nombre'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = false; //true
    protected $dateFormat    = 'datetime'; //date //int

//     //a que columna la va a gregar
//     protected $createdField  = 'created_at'; //nombre de la comuna
//     protected $updatedField  = 'updated_at'; //--
//     protected $deletedField  = 'deleted_at'; //--


//   public function get_cat_id($id)
//   {
//     return $this->db->table('categoria')
//         ->select('*')
//         ->where('id',$id)
//         ->get()
//         ->getRow();
//   }

 }

?>