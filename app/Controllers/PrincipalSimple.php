<?php
namespace App\Controllers;

class PrincipalSimple extends BaseController
{
    public function index()
    {
        // Versión simplificada sin base de datos
        $datos['title'] = 'TODO - Modo Prueba';
        
        // Datos de prueba estáticos
        $datos['lista'] = [
            (object)[
                'id' => 1,
                'nombre' => 'Tarea de prueba 1',
                'estado' => 0,
                'fecha' => date('Y-m-d')
            ],
            (object)[
                'id' => 2,
                'nombre' => 'Tarea de prueba 2',
                'estado' => 1,
                'fecha' => date('Y-m-d')
            ]
        ];

        // Vista simple sin base de datos
        return view('principal_simple', $datos);
    }
}
