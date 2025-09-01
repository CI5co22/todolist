<?php

namespace App\Controllers;
use App\Models\tareas;
use Config\Services;

class Principal extends BaseController
{
    private $modelo;
    
    public function __construct()
    {
        $this->modelo = new tareas;
      
    }

    public function index()
    {
        $datos['title'] = 'TODO';

        if(isset($_GET['mostrar']))
        {
            $status = $_GET['mostrar'];

            if($status == 2)
            {
                $datos['lista'] = $this->modelo->findAll();
            }
            else
            {
                $datos['lista'] = $this->modelo->estado($status);
            }
        }

        if(isset($_POST['add']))
        {
            return $_POST['add'];
        }
    
        return view('principal',$datos);
    }

    
}