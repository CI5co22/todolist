<?php

namespace App\Controllers;

use App\Models\tareas;

class DbTest extends BaseController
{
    public function index()
    {
        try {
            // Intentar conectar a la base de datos
            $modelo = new tareas();
            
            // Intentar hacer una consulta simple
            $result = $modelo->findAll();
            
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Base de datos conectada correctamente',
                'timestamp' => date('Y-m-d H:i:s'),
                'database' => [
                    'host' => $_ENV['MYSQLHOST'] ?? 'not set',
                    'user' => $_ENV['MYSQLUSER'] ?? 'not set',
                    'database' => $_ENV['MYSQL_DATABASE'] ?? 'not set',
                    'port' => $_ENV['MYSQLPORT'] ?? 'not set'
                ],
                'query_result' => $result
            ]);
            
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Error de base de datos: ' . $e->getMessage(),
                'timestamp' => date('Y-m-d H:i:s'),
                'database' => [
                    'host' => $_ENV['MYSQLHOST'] ?? 'not set',
                    'user' => $_ENV['MYSQLUSER'] ?? 'not set',
                    'database' => $_ENV['MYSQL_DATABASE'] ?? 'not set',
                    'port' => $_ENV['MYSQLPORT'] ?? 'not set'
                ]
            ]);
        }
    }
}
