<!DOCTYPE html>
<html lang="en" class="h-100" data-bs-theme="auto">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Repuestos' ?></title>

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- mis estilos aqui -->
</head>
<body class="text-center bg-body-tertiary">
    
<style>
    
:root
{
    --principal: #0A3D62;
    --cel: #1B9CFC;
    --gris-o: #2C3A47;
    --gris-c: #D1D8E0;
}

.album
{
    background-color: var(--gris-c);
}

.boton-ama
{
  background-color: #FFC107;
  padding: .5rem 0;
  border-radius: .5rem;
}

.boton-ama:hover
{
  background-color:rgb(223, 169, 5);
}

.scl
{
    transition: .3s;
}

.scl:hover
      {
        transform: scale(1.05);
      }

.navbar
{
    /* background-color: var(--gris-); */
}

.main
{
    /* background-color: var(--gris-c); */
}
  .navbar {
    position: sticky;
    top: 0;
    z-index: 1020;
  }

  .navbar .container ul li a
  {
    transition: .3s;
  }

  .navbar .container a
  {
    transition: .3s;
  }

  .navbar .container ul li a:hover
  {
    transform: scale(1.1);
  }

  .navbar .container a:hover
  {
    transform: scale(1.05);
  }
 

  @media (max-width: 992px) {
  .navbar-nav {
    width: 100%;
  }

  .navbar-nav .nav-item {
    width: 100%;
    text-align: left; /* Alinear a la izquierda en pantallas pequeñas */
  }

  .navbar-nav .nav-item.d-lg-none {
    display: block;
  }
}

@media (min-width: 992px) {
  .navbar-nav .nav-item.d-lg-none {
    display: none;
  }

  .navbar-nav {
    flex-direction: row; /* Alinear elementos en una fila */
    justify-content: flex-end; /* Alinear a la derecha */
  }

  .navbar-nav .nav-item {
    width: auto;
    text-align: left;
  }
}





 @-webkit-keyframes slide-top{0%{-webkit-transform:translateY(-10);transform:translateY(0)}100%{-webkit-transform:translateY(0);transform:translateY(0px)}}@keyframes slide-top{0%{-webkit-transform:translateY(20px);transform:translateY(20px);opacity: 0}100%{-webkit-transform:translateY(0);transform:translateY((0))}}
 .slide-top{-webkit-animation:slide-top 1s cubic-bezier(.25,.46,.45,.94) both;animation:slide-top 1s cubic-bezier(.25,.46,.45,.94) both}
</style>
<header data-bs-theme="dark">
  <div class="navbar bg-primary shadow-sm sticky-top w-100 navbar-expand-lg">
    <div class="container">
      <a href="/repuestos" class="navbar-brand d-flex align-items-center text-white">
        <i class="fa-solid fa-car me-3"></i>
        <strong>Repuestos</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a href="/repuestos" class="nav-link text-white" aria-current="page"><i class="fa-solid fa-home"></i> Inicio</a></li>
          <li class="nav-item"><a href="#" class="nav-link text-white"><i class="fa-solid fa-cart-shopping"></i> Carrito</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>









<?= $this->renderSection("contenido");?>

<footer class="text-body-dark bg-dark text-white py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



</body>
</html>


