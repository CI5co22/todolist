<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Env extends BaseConfig
{
    public function __construct()
    {
        parent::__construct();
        
        // Configurar la URL base para Railway
        if (isset($_ENV['RAILWAY_STATIC_URL'])) {
            $this->baseURL = $_ENV['RAILWAY_STATIC_URL'];
        } elseif (isset($_ENV['PORT'])) {
            // Si estamos en Railway pero no hay URL estática, usar el puerto
            $this->baseURL = 'http://0.0.0.0:' . $_ENV['PORT'] . '/';
        } else {
            // Configuración local
            $this->baseURL = 'http://localhost:8080/';
        }
    }
    
    public string $baseURL = '';
}
