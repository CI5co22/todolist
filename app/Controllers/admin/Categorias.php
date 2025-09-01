<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

use App\Models\ProductosModel;
use App\Models\CategoriasModel;

class Categorias extends BaseController
{

    private $model_cat;
    private $model_product;
    
    public function __construct()
    {
        $this->model_cat = new CategoriasModel;
        $this->model_product = new ProductosModel();
    }

    public function index()
    {
        $datos['title'] = 'Categorías';
        $datos['cat_list'] = $this->model_cat->getCategorias();
        
        if(isset($_POST['delete']))
        {
            $datos['cantidad'] = $this->model_cat->countProducts($_POST['delete']);
            $num =  $datos['cantidad']->total;

            if($num<1)
            {
                $this->model_cat->delete($_POST['delete']);
                $datos['deleted'] = 1;
            }
            else 
            {
                $datos['deleted'] = 0;
            }
        }
        
        if(isset($_GET['add']))
        {
            $datos['add'] = 1;
        }

        if(isset($_POST['cat_name']))
        {
            $datos['added'] = $this->add_cat($_POST['cat_name']);
            $datos['info'] = ['nombre' => $_POST['cat_name']];
           
        }

        return view('admin/categorias',$datos);
    }

    public function add_cat($cat)
    {
        $data =
        [
            'category_title' => $cat
        ];

        $this->model_cat->insert($data);

        return 1;
    }
        

}
