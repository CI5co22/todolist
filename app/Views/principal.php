<?=  $this->extend("layout/layout"); ?>

<?=  $this->section('contenido') ?>

<header data-bs-theme="dark" class="mt-4 mb-4 text-center">
  <h1>TODO LIST</h1>
</header>

<section class="main-container container p-3">
    <div class="top">
        <button type="button" class="btn btnAction text-white fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <span class="add-text">Add Task</span>
            <span class="add-icon"><i class="fa-solid fa-plus"></i></span>
        </button>
        
        <div class="filter-container">
            <form action="./" method="GET">
                <select onchange="this.form.submit()" class="filter form-select fw-bold" name="mostrar">
                    <option>Mostrar</option>
                    <option value="2">All</option>
                    <option value="1">Complete</option>
                    <option value="0">Incomplete</option>
                </select>
            </form>
            <form action="./" method="GET">
                <select onchange="this.form.submit()" class="filter form-select fw-bold" name="verPrioridad">
                    <option>Prioridad</option>
                    <option value="Alta">Alta</option>
                    <option value="Media">Media</option>
                    <option value="Baja">Prioridad</option>
                </select>
            </form>
        </div>
    </div>
    
    <div class="list">
        <?php foreach($lista as $tarea): ?>
        <div class="task mb-3">
            <div class="p-1  m-0 p-0 corner"  data-prioridad="<?= $tarea->prioridad ?>"></div>
           <input type="checkbox" 
            class="chk-estado ms-3" 
            data-id="<?= $tarea->id ?>" 
            data-estado="<?= $tarea->estado ?>" 
            <?= $tarea->estado == 1 ? 'checked' : '' ?>>

            
            <form id="form-<?= $tarea->id ?>" method="POST" action="./" style="display:none;">
                <input type="hidden" name="check" value="<?= $tarea->id ?>">
                <input type="hidden" name="lastEstado" value="<?= $tarea->estado ?>">
            </form>

            <div class="task_info">
                <p class="m-0 tarea-nombre <?= $tarea->estado == 1 ? 'completada' : '' ?>">
                    <?= $tarea->nombre ?>
                </p>
                <p class="date"><?= $tarea->fecha ?></p>
            </div>
            
            <div class="actions">
                <button data-prioridad="<?= $tarea->prioridad ?>" data-id="<?= $tarea->id ?>" data-title="<?= $tarea->nombre ?>" name="edit" class="btn" data-bs-toggle="modal" data-bs-target="#editModal">
                    <i class="fa-solid fa-edit"></i>
                </button>
                <form action="./" method="post" style="display: inline;">
                    <button name="delete" value="<?= $tarea->id ?>" class="btn">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</section>

<!-- modal -->
<?= view('modalAgregar') ?>

<!-- modal editar -->
<?= view('modalEditar') ?>

<script>
    const urlCambiarEstado = "<?= base_url('cambiarEstado') ?>";
</script>



<?= $this->endSection() ?>