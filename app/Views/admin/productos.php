<?=  $this->extend("admin/layout"); ?>

<?=  $this->section('contenido') ?>

<style>
    main section div a {
        height: 2.5rem;
        width: 9rem;
    }

    /* .sidebar {
            position: sticky;
            top: 0;
            height: 100vh;
            flex-shrink: 0;
            z-index: 9999; /* Asegura que el sidebar esté sobre el contenido 
        } */

    .add-product-button {
        margin: 1rem;
    }

    @media (max-width: 576px) {
        .add-product-button {
            margin: 0;
            width: 2.5rem;
            height: 2.5rem;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .add-product-button i {
            margin-left: .5rem;
        }
        .add-product-button span {
            display: none;
        }
    }

    .action-buttons {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 6rem;
        gap: 5px;
    }

    .action-buttons button {
        width: 2.5rem;
        height: 2.5rem;
    }

    table tr td, table tr th {
        vertical-align: middle; /* Asegura que el contenido esté centrado verticalmente */
        min-height: 4rem; /* Ajusta la altura mínima de las celdas */
    }

     @media (min-width: 992px) {
        .sidebar {
            position: -webkit-sticky;
            position: fixed;
            top: 0;
            height: 100vh;
            flex-shrink: 0;
            z-index: 9999; /* Asegura que el sidebar esté sobre el contenido */
        }
        .main-content
        {
            margin-left: 280px;
        }
    }
</style>

<main class="p-3 main-content bg-light">
    <section class="m-4">
        <div class="container-fluid m-0 p-0 d-flex">
            <h1 class="w-100">Productos</h1>
            <a href="/repuestos/admin/productos/agregar" class="btn btn-dark add-product-button">
                <i class="fa-solid fa-plus me-2"></i>
                <span>Agregar</span>
            </a>
        </div>
        <div class="table-responsive mt-4">
            <table class="table table-light table-hover">
                <thead>
                    <tr>
                        <th scope="col">Stock</th>                     
                        <th scope="col">Nombre</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Imagen</th>
                        <th scope="col" style="width: 6rem;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lista as $producto):?>
                  
                    <tr>
                        <th ><?= $producto->stock ?></th>
                        <td><?= $producto->nombre ?></td>
                        <td><?= $producto->marca_id ?> </td>
                        <td><?= $producto->modelos_id ?></td>
                        <td><?= $producto->categoria_id ?> </td>
                        <td align="center">Q <?= $producto->precio ?></td>
                        <td><img src="<?= base_url('img/repuesto.jpg') ?>" style="width: 5rem" alt=""></td>
                        <td class="action-buttons">
                            <button class="btn btn-primary"><i class="fa-solid fa-pen"></i></button>
                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<?=  $this->endSection()?>
