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
                    <div class="mb-3 d-flex container container-fluid p-0">
                        <div class="child1 me-1">
                            <label for="message-text" class="col-form-label">Estado</label>
                            <select name="status" class="form-select">
                                <option value="0">Incomplete</option>
                                <option value="1">Complete</option>
                            </select>
                        </div>
                        <div class="child2">
                            <label for="message-text" class="col-form-label">Prioridad</label>
                            <select name="prioridad" class="form-select">
                                <option value="Alta">Alta</option>
                                <option value="Media">Media</option>
                                <option value="Baja">Baja</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer container-fluid text-center">
                    <button type="submit" name="add" class="btn btnAction w-100 text-center container container-fluid"><b>Agregar tarea</b></button>
                </div>
            </form>
        </div>
    </div>
</div>