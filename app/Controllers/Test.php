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
        // Respuesta HTML simple usando response
        $html = "<h1>✅ CodeIgniter funciona!</h1>";
        $html .= "<p>Fecha: " . date('Y-m-d H:i:s') . "</p>";
        $html .= "<p>PHP: " . PHP_VERSION . "</p>";
        $html .= "<p>Entorno: " . ENVIRONMENT . "</p>";
        $html .= "<p>Base URL: " . base_url() . "</p>";
        
        return $this->response->setContentType('text/html')->setBody($html);
    }
}
