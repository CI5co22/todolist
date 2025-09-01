<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

// use App\Models\ProductosModel;
// use App\Models\CategoriasModel;

class Dashboard extends BaseController
{

    // private $model_cat;
    // private $model_product;
    
    public function __construct()
    {
        // $this->model_cat = new CategoriasModel;
        // $this->model_product = new ProductosModel();
    }

    public function index()
    {
        // $datos['productos'] = $this->model_product->countAll();

        return view('admin/principal');
    }


}
