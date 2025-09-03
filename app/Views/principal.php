<?=  $this->extend("layout/layout"); ?>

<?=  $this->section('contenido') ?>
    
<style>
    
:root
{
    --principal: #685DFC;
}

header h1 
{
  font-weight: 900;
  color: #323554
}


.list
{
  background-color: #E1E2E8;
  border-radius: 8px; 
  padding: 1rem;
  margin: 10px;
}

.task
{
  background-color: white;
  padding: 0rem 1rem;
  border-radius: 8px;
  position: relative;
}

.task form {
  display: flex;
  align-items: center;
}


.actions
{
   position: absolute;
   right: 0;
   margin: 1.3rem;
    display: flex;
  align-items: center;
}

.actions form .btn
{
  background-color: #E3E3E3;
}

.actions form .btn:hover
{
  background-color: var(--principal);
  color:white;
}

.add, .add:hover
{
  background-color: var(--principal);
  position: absolute;
  left: 0.2rem;
  transition: 0.3s;
}

.btn:hover
{
  transform: scale(1.07);
}

.top
{
  position: relative;
  margin: 0 0 3rem 0;
}

.filter
{
  background-color: #E3E3E3;
  position: absolute;
  right: 0.6rem;
  border: none;
  color: #616161;
}

.task .task_info
{
  margin: 0 0 0 0.7rem;
  text-align: left;
}

.task .task_info .date
{
  font-size: 14px;
}
</style>
<header data-bs-theme="dark" class="mt-4 mb-4 text-center">
  <h1>TODO LIST</h1>
</header>

<section class=" main container w-50  p-3">
    <div class="top">
        <button type="button" class="btn add ms-2 text-white fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add Task</button>
      <form action="./" method="GET">
        <select onchange="this.form.submit()" class="filter form-select w-25 fw-bold" name="mostrar" id="">
          <option >Mostrar</option>
          <option value="2">All</option>
          <option value="1">Complete</option>
          <option value="0">Incomplete</option>
        </select>
      </form>
      
    </div>
    <div class="list ">
      <?php foreach($lista as $tarea): ?>
      <div class="task d-flex mb-3">
        <input type="checkbox" name="check" value="<?= $tarea->id ?>" 
              style="width: 2rem;" 
              onChange="document.getElementById('form-<?= $tarea->id ?>').submit()">
        
        <form id="form-<?= $tarea->id ?>" method="POST" action="./" style="display:none;">
          <input type="hidden" name="check" value="<?= $tarea->id ?>">
          <input type="hidden" name="lastEstado" value="<?= $tarea->estado ?>">
        </form>

        <div class="task_info">
        <p class="m-0 mt-3"><?= ($tarea->estado == 0 ) ? $tarea->nombre : '<s>'.$tarea->nombre.'</s>'  ?></p>
        <p class="date">
   <p class="date">
    <?php
    try {
        $fechaValida = (strtotime($tarea->fecha) > 0);
        echo $fechaValida ? date('d-m-Y', strtotime($tarea->fecha)) : 'Fecha próxima';
    } catch (Exception $e) {
        echo 'Fecha reciente';
    }
    ?>
</p>
        </div>
        <div class="actions">
          
            <button   data-id="<?= $tarea->id ?>" data-title="<?= $tarea->nombre ?>" name="edit" class="btn" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button>
          <form action="./" method="post" >
            <button name="delete" value="<?= $tarea->id ?>" class="btn"><i class="fa-solid fa-trash"></i></button>
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
      <div class="modal-body">
        <form method="POST" action="./">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Título</label>
            <input  required='required' type="text" name="title" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Estado</label>
            <select name="status" class="form-select" id="">
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
          <button type="submit" name="update"  id="edit-id" class="btn btn-primary">Actualizar tarea</button>
        </div>
      </form>
    </div>
  </div>
</div>


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


<?=  $this->endSection() ?>
