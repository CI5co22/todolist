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
                    <div class="mb-3">
                    <select id="selectPrioridad" name="prioridad" class="form-select">
                        <option value="Alta"  >🔴 Alta </option>
                        <option value="Media">🟡 Media</option>
                        <option value="Baja">⚫ Baja</option>
                    </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="update" id="edit-id" class="btn btn-primary">Actualizar tarea</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url('js/modalEdit.js') ?>"></script>