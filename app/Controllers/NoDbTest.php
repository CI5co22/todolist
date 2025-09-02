<?php

namespace App\Controllers;

class NoDbTest extends BaseController
{
    public function index()
    {
        // Controlador que NO usa base de datos
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'CodeIgniter funciona sin base de datos',
            'timestamp' => date('Y-m-d H:i:s'),
            'php_version' => PHP_VERSION,
            'environment' => ENVIRONMENT,
            'base_url' => base_url(),
            'current_url' => current_url()
        ]);
    }
    
    public function html()
    {
        // Vista HTML simple sin base de datos
        $html = "<!DOCTYPE html>";
        $html .= "<html><head><title>CodeIgniter Test</title></head><body>";
        $html .= "<h1>✅ CodeIgniter funciona!</h1>";
        $html .= "<p><strong>Fecha:</strong> " . date('Y-m-d H:i:s') . "</p>";
        $html .= "<p><strong>PHP:</strong> " . PHP_VERSION . "</p>";
        $html .= "<p><strong>Entorno:</strong> " . ENVIRONMENT . "</p>";
        $html .= "<p><strong>Base URL:</strong> " . base_url() . "</p>";
        $html .= "<p><strong>Current URL:</strong> " . current_url() . "</p>";
        $html .= "<p><a href='/'>Ir a la aplicación principal</a></p>";
        $html .= "</body></html>";
        
        return $this->response->setContentType('text/html')->setBody($html);
    }
}
