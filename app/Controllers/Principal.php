<?php

namespace App\Controllers;
use App\Models\Productos_Model;
use App\Models\CategoriasModel;
use Config\Services;

class Principal extends BaseController
{
    private $model_cat;
    private $model_product;
    
    public function __construct()
    {
        $this->model_cat = new CategoriasModel;
        $this->model_product = new Productos_Model;
    }

    public function index()
    {
        $datos['title'] = 'Home';
        $datos['cat'] = $this->model_cat->findAll();
    
        return view('principal',$datos);
    }

    public function cat($id)
    {
            if($this->model_cat->get_cat_id($id))
            {
            
                $categoria= $this->model_cat->get_cat_id($id);

                $datos['title'] = $categoria->nombre;
                $datos['categoria'] = $categoria->nombre;

               
                $datos['producto'] = $this->model_product->findAll();
                
                return view('section',$datos);
            }
                else 
                {
            return 'no se encontro la categoria';
        }
    }
}