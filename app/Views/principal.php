<?=  $this->extend("layout/layout"); ?>

<?=  $this->section('contenido') ?>

<style>
  main section {
    background: url('https://img.freepik.com/foto-gratis/composicion-diferentes-accesorios-coche_23-2149030439.jpg?semt=ais_hybrid');
    background-size: cover;
    background-color: #ffffff;
    border-radius: 20px;
    box-shadow: 0px 5px 15px rgba(0,0,0,0.25);
    position: relative;
    color: white;
    min-height: 500px; /* Adjust this value as needed */
  }

  .overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    border-radius: 20px;
    display: flex;
    align-items: flex-end;
    justify-content: flex-start;
    padding: 20px;
    text-align: left;
  }

  .overlay .content {
    margin-left: 20px;
    margin-bottom: 20px;
    max-width: 600px; /* Adjust this value for larger or smaller content area */
  }

  h1 {
    font-size: 3rem;
    font-weight: 700;
  }

  .box {
    border-radius: 20px;
    box-shadow: 0px 5px 15px rgba(0,0,0,0.25);
    transition: .3s;
    cursor: pointer;
  }

  .box:hover {
    transform: scale(1.03);
  }

  .form-inline {
    display: flex;
    flex-direction: row;
    gap: 0;
    background-color: white;
    border-radius: 10px;
    overflow: hidden;
  }

  .form-inline input {
    border: none;
    border-radius: 0;
    flex: 1;
    padding: 10px;
  }

  .form-inline button {
    border: none;
    border-radius: 10px; /* Increase the border-radius of the button */
    padding: 10px 20px;
    margin-left: 5px;
    font-weight: 800;
  }
</style>

<main class="bg-body-tertiary slide-top container-fluid main">
  <section class="py-5 text-center container mt-5 mx-auto" style="max-width: 1000px;">
    <div class="overlay">
      <div class="content">
        <h1 class="mb-4">Todo lo que tu auto necesita, en un solo lugar</h1>
        <form class="form-inline w-75 p-2">
          <input type="text" class="form-control" placeholder="Buscar repuestos">
          <button type="submit" class="btn btn-primary"><i class="fa-solid fa-search"></i></button>
        </form>
      </div>
    </div>
  </section>

  <div class="album pb-5 mt-5 bg-body-tertiary" style="max-width:1000px; margin: 0 auto;">
    <div class="container text-start pb-3">
      <h3 class="">Compra por categoría</h3>
    </div>
    <div class="container" style="max-width: 1000px;">
      <div class="row g-3">
        <?php foreach ($cat as $row): ?>
          <div class="col-6 col-sm-4 col-md-3 col-lg-3 mb-0">
            <a href="./categoria/<?= $row->id ?>" style="text-decoration:none">
              <img src="<?= base_url('img/cat.jpg') ?>" alt="producto" class="img-fluid box">
              <p style="text-transform: capitalize; font-weight: 700; color: black;" class="container ms-2 mt-3 text-start"><?= $row->nombre ?></p>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</main>

<?=  $this->endSection() ?>
