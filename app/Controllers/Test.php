<?php

namespace App\Controllers;

class Test extends BaseController
{
    public function index()
    {
        // Respuesta simple sin base de datos
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'CodeIgniter está funcionando correctamente',
            'timestamp' => date('Y-m-d H:i:s'),
            'php_version' => PHP_VERSION,
            'environment' => ENVIRONMENT
        ]);
    }
    
    public function simple()
    {
        // Respuesta HTML simple
        echo "<h1>✅ CodeIgniter funciona!</h1>";
        echo "<p>Fecha: " . date('Y-m-d H:i:s') . "</p>";
        echo "<p>PHP: " . PHP_VERSION . "</p>";
        echo "<p>Entorno: " . ENVIRONMENT . "</p>";
    }
}
