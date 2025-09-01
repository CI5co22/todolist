<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Repuestos' ?></title>
    
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- mis estilos aqui -->
    <style>
      @media (max-width: 992px) { /* Ajuste para pantallas medianas y pequeñas */
        .sidebar {
          position: fixed;
          top: 0;
          left: -280px; /* Oculta el sidebar fuera de la pantalla */
          height: 100vh;
          z-index: 1000;
          background-color: #343a40; /* Fondo oscuro */
          transition: left 0.3s ease-in-out;
        }
        .sidebar.show {
          left: 0; /* Muestra el sidebar */
        }
        .main-content {
          width: 100%; /* El contenido ocupa todo el ancho */
        }
        .navbar {
          display: flex;
          align-items: center;
          justify-content: space-between;
          padding: 10px;
          background-color: #343a40;
          color: white;
        }
      }

      @media (min-width: 993px) { /* Ajuste para pantallas grandes */
        .sidebar {
          position: relative;
          left: 0; /* Posición fija para pantallas grandes */
          height: 100%;
        }
        .main-content {
          flex: 1; /* Ocupa el espacio restante */
          width: calc(100% - 280px); /* Asegura que el contenido principal no esté centrado */
        }
        .navbar {
          display: none; /* Oculta el navbar en pantallas grandes */
        }
      }
    </style>
</head>
<body style="height: 100%;">

<!-- Navbar que se muestra en pantallas medianas y pequeñas -->
<div class="navbar d-lg-none">
<a href="/repuestos/admin" class="d-flex align-items-center ms-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <i class="fa-solid fa-car me-2"></i>
      <span class="fs-4 text-white">Repuestos</span>
      </a>
  <button class="btn btn-outline-light" id="toggleSidebar">
    <i class="fa-solid fa-bars"></i>
  </button>
</div>

<div class="d-flex" style="height: 100vh;">
  <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark sidebar" style="width: 280px;">
      <a href="/repuestos/admin" class="d-flex align-items-center mb-3 ms-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <i class="fa-solid fa-car me-2"></i>
      <span class="fs-4">Repuestos</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto" id="sidebar-nav">
        <li class="nav-item">
          <a href="/repuestos/admin" class="nav-link text-white" aria-current="page">
            Dashboard
          </a>
        </li>
        <li>
          <a href="/repuestos/admin/productos" class="nav-link text-white">
            Productos
          </a>
        </li>
        <li>
          <a href="products.html" class="nav-link text-white">
            Marcas
          </a>
        </li>
        <li>
          <a href="customers.html" class="nav-link text-white">
            Modelos
          </a>
        </li>
        <li>
          <a href="customers.html" class="nav-link text-white">
            Categorias
          </a>
        </li>
        <li>
          <a href="customers.html" class="nav-link text-white">
            Pedidos
          </a>
        </li>
      </ul>
      <hr>
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong>mdo</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
          <li><a class="dropdown-item" href="#">New project...</a></li>
          <li><a class="dropdown-item" href="#">Settings</a></li>
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
      </div>
    </div>

    
      <?= $this->renderSection("contenido");?>
    
  </div>

<!-- Incluir el script de Bootstrap Bundle correcto -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll('#sidebar-nav .nav-link');
    const currentUrl = window.location.pathname;
    const toggleButton = document.getElementById('toggleSidebar');
    const sidebar = document.querySelector('.sidebar');

    links.forEach(link => {
      if (link.getAttribute('href') === currentUrl) {
        link.classList.add('active');
      }
    });

    toggleButton.addEventListener('click', function () {
      sidebar.classList.toggle('show');
    });
  });
</script>

<?= $this->renderSection("scripts");?>

</body>
</html>
