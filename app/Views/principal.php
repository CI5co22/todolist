<?= $this->extend("layout/layout"); ?>

<?= $this->section('contenido') ?>
    
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
    padding: 0.8rem 1rem;
    border-radius: 8px;
    position: relative;
    align-items: center;
}

.task form {
    display: flex;
    align-items: center;
}

.actions {
    display: flex;
    align-items: center;
    margin-left: auto;
}

.actions form .btn {
    background-color: #E3E3E3;
    margin-left: 0.5rem;
}

.actions form .btn:hover {
    background-color: var(--principal);
    color: white;
}

.add, .add:hover {
    background-color: var(--principal);
    transition: 0.3s;
}

.btn:hover {
    transform: scale(1.07);
}

.top {
    position: relative;
    margin: 0 0 2rem 0;
    justify-content: space-between;
    align-items: center;
   
}

.filter {
    background-color: #E3E3E3;
    border: none;
    color: #616161;
    padding: 0.5rem;
    border-radius: 4px;
}

.task .task_info {
    margin: 0 0 0 0.7rem;
    text-align: left;
    flex: 1;
    min-width: 150px;
}

.task .task_info .date {
    font-size: 14px;
    color: #6c757d;
    margin: 0;
}

/* Responsive styles */
@media (max-width: 768px) {
    .main {
        padding: 0.5rem;
    }
    
    .top {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }
    
    .filter {
        width: 100%;
        margin-top: 0.5rem;
    }
    
    .task {
        padding: 0.8rem;
    }
    
    .task_info {
        margin-left: 0.5rem;
    }
    
    .actions {
        margin-top: 0.5rem;
        width: 100%;
        justify-content: flex-end;
    }
}

@media (max-width: 576px) {
    header h1 {
        font-size: 1.8rem;
    }
    
    .list {
        padding: 0.8rem;
    }
    
    .task {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .task form {
        width: 100%;
        margin-bottom: 0.5rem;
    }
    
    .task_info {
        width: 100%;
        margin: 0.5rem 0;
    }
    
    .actions {
        justify-content: space-between;
        width: 100%;
    }
    
    .modal-dialog {
        margin: 0.5rem;
    }
}

/* Mejoras de accesibilidad */
.btn:focus {
    box-shadow: 0 0 0 0.2rem rgba(104, 93, 252, 0.25);
}

.form-control:focus {
    border-color: var(--principal);
    box-shadow: 0 0 0 0.2rem rgba(104, 93, 252, 0.25);
}

.form-select:focus {
    border-color: var(--principal);
    box-shadow: 0 0 0 0.2rem rgba(104, 93, 252, 0.25);
}

/* Mejora visual para tareas completadas */
.task.completed {
    opacity: 0.8;
    background-color: #f8f9fa;
}

.task.completed .task_info p {
    color: #6c757d;
}
</style>

<header data-bs-theme="dark" class="mt-4 mb-4 text-center">
    <h1>TODO LIST</h1>
</header>

<section class="main container p-3">
    <div class="top">
        <button type="button" class="btn add text-white fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Task
        </button>
        <form action="./" method="GET" class="d-flex">
            <select onchange="this.form.submit()" class="filter form-select fw-bold" name="mostrar">
                <option value="2">All</option>
                <option value="1" <?= (isset($_GET['mostrar']) && $_GET['mostrar'] == 1) ? 'selected' : '' ?>>Complete</option>
                <option value="0" <?= (isset($_GET['mostrar']) && $_GET['mostrar'] == 0) ? 'selected' : '' ?>>Incomplete</option>
            </select>
        </form>
    </div>
    
    <div class="list">
        <?php foreach($lista as $tarea): ?>
        <div class="task mb-3 <?= $tarea->estado == 1 ? 'completed' : '' ?>">
            <input type="checkbox" name="check" value="<?= $tarea->id ?>" 
                style="width: 1.5rem; height: 1.5rem;" 
                onChange="document.getElementById('form-<?= $tarea->id ?>').submit()"
                <?= $tarea->estado == 1 ? 'checked' : '' ?>>
            
            <form id="form-<?= $tarea->id ?>" method="POST" action="./" style="display:none;">
                <input type="hidden" name="check" value="<?= $tarea->id ?>">
                <input type="hidden" name="lastEstado" value="<?= $tarea->estado ?>">
            </form>

            <div class="task_info">
                <p class="m-0"><?= ($tarea->estado == 0 ) ? htmlspecialchars($tarea->nombre) : '<s>'.htmlspecialchars($tarea->nombre).'</s>' ?></p>
                <p class="date m-0"><?= $tarea->fecha ?></p>
            </div>
            
            <div class="actions">
                <button data-id="<?= $tarea->id ?>" data-title="<?= htmlspecialchars($tarea->nombre) ?>" 
                    name="edit" class="btn" data-bs-toggle="modal" data-bs-target="#editModal">
                    <i class="fa-solid fa-edit"></i>
                </button>
                <form action="./" method="post">
                    <button name="delete" value="<?= $tarea->id ?>" class="btn">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</section>

<!-- Modal para añadir tarea -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva tarea</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="./">
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" name="add" class="btn btn-primary">Agregar tarea</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para editar tarea -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Editar tarea</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="./">
                    <div class="mb-3">
                        <label class="col-form-label">Título</label>
                        <input required type="text" name="title" class="form-control" id="edit-title">
                    </div>
                    <input type="hidden" name="id" id="edit-id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" name="update" class="btn btn-primary">Actualizar tarea</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
const editModal = document.getElementById('editModal')
editModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget
    const id = button.getAttribute('data-id')
    const title = button.getAttribute('data-title')
    
    document.getElementById('edit-id').value = id
    document.getElementById('edit-title').value = title
})
</script>

<?= $this->endSection() ?>