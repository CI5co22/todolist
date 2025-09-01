<?php

namespace App\Models;
use CodeIgniter\Model;

class Productos_Model extends Model
{
    protected $table      = 'productos';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre','marca_id','modelos_id','stock','precio','categoria_id','descripcion','img'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = false; //true
    protected $dateFormat    = 'datetime'; //date //int

//     //a que columna la va a gregar
//     protected $createdField  = 'created_at'; //nombre de la comuna
//     protected $updatedField  = 'updated_at'; //--
//     protected $deletedField  = 'deleted_at'; //--


  public function getCategorias()
  {
    return $this->db->table('categorias cat')
        ->select('cat.*, COUNT(product_id) AS total')
        ->join('products p','p.category_id = cat.category_id','LEFT')
        ->groupBy('cat.category_id')
        ->get()
        ->getResult();
  }

 }

?>