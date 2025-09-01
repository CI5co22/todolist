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

    .secForm
    {
        margin: 0 2rem 0;
        width: 50%;
    }

    .volver
    {
        width:2.5rem;
        height: 2.3rem;
        margin: .7rem 1rem 0 0;
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

        .secForm
        {
            margin: 0;
            width: 100%;
        }

        .volver
        {
            width:2.5rem;
            height: 2.3rem;
            margin: .1rem 1rem 0 0;
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

<main class="p-3 main-content bg-light" style="min-height: 140vh">
 <section class="m-4">
        <div class="container-fluid m-0 p-0 d-flex">
            <a href="./" class="btn btn-dark volver" title="volver"><i class="fa-solid fa-less-than"></i></a>
            <h1 class="w-100">Agregar Producto</h1>
        </div>
  </section>
  <section class="secForm">
  <form action="./" method="post" enctype="multipart/form-data" class="container mt-4">
    <!-- Nombre del Producto -->
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del Producto:</label>
        <input type="text" class="form-control" maxlength="80" id="nombre" name="nombre" required>
    </div>

    <!-- Descripción -->
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción:</label>
        <textarea class="form-control" maxlength="250" id="descripcion" name="descripcion" rows="3" required></textarea>
    </div>

    <!-- Categoría -->
    <div class="mb-3">
        <label for="categoria" class="form-label">Categoría:</label>
        <select class="form-select" id="categoria" name="categoria" required>
            <option value="frenos" disabled selected>Seleccione una categoría</option>
            <?php foreach($categoria as $row): ?>
                <option value="<?= $row->id ?>" style="text-transform: capitalize"><?= $row->nombre ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <!-- Marca -->
    <div class="mb-3">
        <label for="marca" class="form-label">Marca:</label>
        <select name="" id="" class="form-select">
            <option value="" disabled selected>Seleccione una marca</option>
            <?php foreach($marca as $row): ?>
                <option value="<?= $row->id ?>" style="text-transform: capitalize"><?= $row->marca ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <!-- Modelo Compatible -->
    <div class="mb-1">
        <label class="form-label">Modelos compatibles:</label>
        <div id="modelosSeleccionados" class="d-flex flex-wrap gap-2">
            <!-- Aquí aparecerán las etiquetas de los modelos seleccionados -->
        </div>
    </div>

    <!-- Botón para abrir el modal de selección de modelos -->
    <div class="mb-3">
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalSeleccionarModelos">
            Seleccionar Modelos
        </button>
    </div>

    <!-- Cantidad en Stock -->
    <div class="mb-3">
        <label for="stock" class="form-label" min="0">Cantidad en Stock:</label>
        <input type="number" class="form-control" id="stock" min="1" name="stock" required>
    </div>

    <!-- Precio Unitario -->
    <div class="mb-3">
        <label for="precio" class="form-label">Precio:</label>
        <input type="number" class="form-control" id="precio"  min="1" name="precio" step="0.01" required>
    </div>

    <!-- Imagen Principal -->
    <div class="mb-5">
        <label for="imagen" class="form-label">Imagen Principal:</label>
        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
    </div>

    <!-- Botones de Acción -->
    <div class="mb-3">
        <button type="submit" class="btn btn-primary mb-2">Guardar Producto</button>
        </form>
        <a href="./" class="btn btn-secondary mb-2">Cancelar</a>
    </div>

  </section>
</main>

<?=  $this->endSection()?>

<?= $this->section('scripts')?>
<script src="<?= base_url('js/modelos.js') ?>"></script>
<?= $this->endSection() ?>
