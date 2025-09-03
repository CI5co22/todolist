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

        if(isset($_GET['mostrar']))
        {   
            $status = $_GET['mostrar'];

            if($status == 'verTodo')
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

        

        if(isset($_GET['verPrioridad']))
        {
            $prioridad = $_GET['verPrioridad'];

            switch($prioridad)
            {
                case 'Alta':
                    $datos['lista'] = $this->modelo->getPrioridad($prioridad);
                    break;
                case 'Media':
                    $datos['lista'] = $this->modelo->getPrioridad($prioridad);
                    break;
                case 'Baja':
                    $datos['lista'] = $this->modelo->getPrioridad($prioridad);
                    break;
                default: $datos['lista'] = $this->modelo->findAll();
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
                'fecha' => date('Y-m-d H:i:s'),
                'prioridad' => $_POST['prioridad']
            ];

            $this->modelo->insert($datos);

            $datos['lista'] = $this->modelo->findAll();
        }

        if(isset($_POST['delete']))
        {
            $this->modelo->delete($_POST['delete']);
            $datos['lista'] = $this->modelo->findAll();
        }

        

        if(isset($_POST['update']))
        {
            $id = $_POST['update'];
            $title = $_POST['title'];
            $prioridad = $_POST['prioridad'];

            $this->modelo->updTitle($id,$title,$prioridad);
            $datos['lista'] = $this->modelo->findAll();
        }

        return view('principal',$datos);
    }

    public function cambiarEstado()
    {
        if(isset($_POST['check']))
        {
            $last_estado = $_POST['lastEstado'];
            $id = $_POST['check'];

            if($last_estado == 0) /* Si no esta completado */
            {
                $this->modelo->checkEstado($id);
                $newEstado = 1;
            }
            else
            {
                $this->modelo->uncheckEstado($id);
                $newEstado = 0;      
            }

            return $this->response->setJSON([
                'status' => 'ok',
                'id' => $id,
                'estado' => $newEstado
            ]);
        }
    }

  

    
}