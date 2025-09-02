<?php
namespace App\Controllers;
use App\Models\tareas;
use Config\Services;
use CodeIgniter\I18n\Time;

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
        else
        {
            $datos['lista'] = $this->modelo->findAll();
        }


        if(isset($_POST['add']))
        {
            $datos = [
                'nombre' => $_POST['title'],
                'estado' => $_POST['status'],
                'fecha' => date('Y-m-d')
            ];

            $this->modelo->insert($datos);

            $datos['lista'] = $this->modelo->findAll();
        }

        if(isset($_POST['delete']))
        {
            $this->modelo->delete($_POST['delete']);
            $datos['lista'] = $this->modelo->findAll();
        }

        if(isset($_POST['check']))
        {
            $last_estado = $_POST['lastEstado'];
            $id = $_POST['check'];

            if($last_estado == 0) /* Si no esta completado */
            {
                $this->modelo->checkEstado($id);
                
            }
            else
            {
                $this->modelo->uncheckEstado($id);         
            }

            $datos['lista'] = $this->modelo->findAll();
        }

        if(isset($_POST['update']))
        {
            $id = $_POST['update'];
            $title = $_POST['title'];

            $this->modelo->updTitle($id,$title);
            $datos['lista'] = $this->modelo->findAll();

        }

        return view('principal',$datos);
    }

  

    
}