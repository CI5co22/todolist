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
.task input
{
  width: 2rem; 
}

.task input:checked
{
  background-color: var(--principal)
}
.actions
{
   position: absolute;
   right: 0;
   margin: 1.3rem;
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
<header data-bs-theme="dark" class="mt-4 mb-4">
  <h1>TODO LIST</h1>
</header>

<section class=" main container w-50  p-3">
    <div class="top">
      <button class="btn add ms-2 text-white fw-bold">Add Task</button>
      <select class="filter form-select w-25 fw-bold" name="filter" id="">
        <option value="">All</option>
        <option value="">Complete</option>
        <option value="">Incomplete</option>
      </select>
    </div>
    <div class="list ">
      <div class="task d-flex ">
        <input type="checkbox" name="" id="">
        <div class="task_info">
        <p class="m-0 mt-3">Task name</p>
        <p class="date">Fecha</p>
        </div>
        <div class="actions">
          <form action="" method="post">
            <button class="btn"><i class="fa-solid fa-edit"></i></button>
            <button class="btn"><i class="fa-solid fa-trash"></i></button>
          </form>
        </div>
      </div>
    </div>
</section>


<?=  $this->endSection() ?>
