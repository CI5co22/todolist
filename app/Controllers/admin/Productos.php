<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

use App\Models\Productos_Model;
use App\Models\CategoriasModel;
use App\Models\Modelos_Model;
use App\Models\Marcas_Model;

class Productos extends BaseController
{

    private $model_cat;
    private $model_product;
    
    public function __construct()
    {
        $this->model_cat = new CategoriasModel;
        $this->model_product = new Productos_Model;
        $this->model_modelo = new Modelos_Model;
        $this->model_marca = new Marcas_Model;
    }

    public function index()
    {
        $datos['title'] = 'Productos';
        $datos['lista'] = $this->model_product->findAll();

        return view('admin/productos',$datos);
    }

    public function agregar()
    {
        $datos['categoria'] = $this->model_cat->findAll();
        $datos['marca'] = $this->model_marca->findAll();
        $modal['modelo'] = $this->model_modelo->findAll();
        // var_dump($modal['modelo']); var_dump($datos['marca']); exit;
    

        return view('admin/agregar_producto',$datos).view('admin/modal_modelos',$modal);
    }

}
