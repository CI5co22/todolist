<?php

namespace App\Models;
use CodeIgniter\Model;

class tareas extends Model
{
    protected $table      = 'tareas';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id','nombre','estado','fecha','prioridad'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = false; //true
    protected $dateFormat    = 'datetime'; //date //int

//     //a que columna la va a gregar
//     protected $createdField  = 'created_at'; //nombre de la comuna
//     protected $updatedField  = 'updated_at'; //--
//     protected $deletedField  = 'deleted_at'; //--


    public function estado($estado)
    {
        return $this->db->table('tareas')
        ->select('*')
        ->where('estado',$estado)
        ->get()
        ->getResult();
    }

    public function checkEstado($id)
    {
        return $this->db->table('tareas')
        ->update(['estado' => 1], ['id' => $id]);
    }

    public function uncheckEstado($id)
    {
        return $this->db->table('tareas')
        ->update(['estado' => 0], ['id' => $id]);

    }

    public function updTitle($id,$title)
    {
        $this->db->table('tareas')
        ->where('id', $id)
        ->update(['nombre' => $title]);
    }

 }

?>