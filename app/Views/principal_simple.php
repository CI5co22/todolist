<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --principal: #685DFC;
        }
        
        header h1 {
            font-weight: 900;
            color: #323554;
        }
        
        .list {
            background-color: #E1E2E8;
            border-radius: 8px; 
            padding: 1rem;
            margin: 10px;
        }
        
        .task {
            background-color: white;
            padding: 0rem 1rem;
            border-radius: 8px;
            position: relative;
        }
        
        .task .task_info {
            margin: 0 0 0 0.7rem;
            text-align: left;
        }
        
        .task .task_info .date {
            font-size: 14px;
        }
        
        .alert-info {
            background-color: #d1ecf1;
            border-color: #bee5eb;
            color: #0c5460;
        }
    </style>
</head>
<body>
    <header data-bs-theme="dark" class="mt-4 mb-4 text-center">
        <h1>TODO LIST - MODO PRUEBA</h1>
    </header>

    <section class="main container w-50 p-3">
        <div class="alert alert-info" role="alert">
            <strong>Modo Prueba:</strong> Esta es una versión simplificada sin base de datos para verificar que CodeIgniter funciona correctamente en Railway.
        </div>
        
        <div class="list">
            <?php foreach($lista as $tarea): ?>
            <div class="task d-flex mb-3">
                <input type="checkbox" <?= $tarea->estado == 1 ? 'checked' : '' ?> disabled style="width: 2rem;">
                
                <div class="task_info">
                    <p class="m-0 mt-3"><?= ($tarea->estado == 0) ? $tarea->nombre : '<s>'.$tarea->nombre.'</s>' ?></p>
                    <p class="date"><?= $tarea->fecha ?></p>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        
        <div class="text-center mt-4">
            <a href="/test" class="btn btn-primary">Probar API</a>
            <a href="/simple" class="btn btn-secondary">Vista Simple</a>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
