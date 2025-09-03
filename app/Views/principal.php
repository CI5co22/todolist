<?=  $this->extend("layout/layout"); ?>

<?=  $this->section('contenido') ?>

<header data-bs-theme="dark" class="mt-4 mb-4 text-center">
  <h1>TODO LIST</h1>
</header>

<section class="main-container container p-3">
    <div class="top">
        <button type="button" class="btn add text-white fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
        </div>
    </div>
    
    <div class="list">
        <?php foreach($lista as $tarea): ?>
        <div class="task mb-3">
           <input type="checkbox" 
            class="chk-estado" 
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
                <button data-id="<?= $tarea->id ?>" data-title="<?= $tarea->nombre ?>" name="edit" class="btn" data-bs-toggle="modal" data-bs-target="#editModal">
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva tarea</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="./">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Título</label>
                        <input required type="text" name="title" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Estado</label>
                        <select name="status" class="form-select">
                            <option value="0">Incomplete</option>
                            <option value="1">Complete</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add" class="btn btn-primary">Agregar tarea</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal editar -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="./">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Editar tarea</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="col-form-label">Título</label>
                        <input required type="text" name="title" class="form-control" id="edit-title">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="update" id="edit-id" class="btn btn-primary">Actualizar tarea</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const urlCambiarEstado = "<?= base_url('cambiarEstado') ?>";
</script>

<script>
const editModal = document.getElementById('editModal')
editModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget
    const id = button.getAttribute('data-id')
    const title = button.getAttribute('data-title')
    
    editModal.querySelector('#edit-id').value = id
    editModal.querySelector('#edit-title').value = title
})
</script>

<?= $this->endSection() ?>