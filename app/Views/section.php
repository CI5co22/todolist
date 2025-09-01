<?= $this->extend("layout/layout"); ?>

<?= $this->section('contenido') ?>

<style>
main {
    display: flex;
}

main .s1 {
    width: 400px;
}

.row div .box {
    cursor: pointer;
}

.row div .box span {
    font-weight: 700;
    opacity: 0.5;
}

.row div .box img {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.row div .box {
    border-radius: 10px;
    transition: 0.3s;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
}

.row div .box:hover {
    transform: scale(1.03);
}

.filtros
{
    position: absolute;
    right: 3rem;
}

@media (max-width: 576px) {
    .filtros {

        position: absolute;
        top: 3rem;
        right: 2.3rem;   
    }

    .filtros span
    {
        display:none;
    }
}
</style>

<main class="slide-top container">
    <section class="container-fluid my-5" style="text-transform: capitalize">
        <div class="container-fluid mb-5">
            <h1 class="text-start justify-content-start mb-4" style="font-weight: 700"><?= $categoria ?></h1>
            <button class="btn btn-dark text-end filtros" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-solid fa-filter"></i> <span>Filtros</span></button>
            <form action="" class="row g-3 ">
                <div class="col-md-6 input-group" style="max-width: 500px">
                    <input name="buscar" type="text" class="form-control" placeholder="Busca en esta categoría">
                    <button class="btn btn-primary">Buscar</button>
                </div>
            </form>
            
        </div>
        <div class="container">
            <div class="mb-4 text-start">
            </div>
            <div class="row">
                <?php foreach($producto as $row): ?>
                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                        <div class="card text-start box h-100">
                            <img class="card-img-top mb-2" src="<?= base_url('/img/repuesto.jpg')?>" alt="">
                            <div class="card-body">
                                <h5 class="card-title" style="text-transform: uppercase"><?= $row->nombre ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><strong>Marca:</strong> <?= $row->marca_id ?></h6>
                                <h6 class="card-subtitle mb-2 text-muted"><strong>Modelo:</strong> <?= $row->modelos_id ?></h6>
                                <span class="card-text">Q<?= $row->precio ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
</main>


<!-- modal -->
<div class="offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">Filtros</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="text-start">
        <p>Selecciones la marca y modelo a filtrar</p>
        <form action="" class="container-fluid">
            <select name="" id="" class="form-select mb-3">
                <option value="">Seleccione una marca</option>
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
            </select>
            <select name="" id="" class="form-select mb-4">
                <option value="">Seleccione un modelo</option>
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
            </select>
            <button class="form-control btn btn-primary">Aplicar</button>
        </form>
    </div>
  </div>
</div>

<!-- modal -->

<?= $this->endSection() ?>
