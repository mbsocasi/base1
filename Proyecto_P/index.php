<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Inventarios</title>
  <link rel="stylesheet" href="./bootstrap.min.css">


</head>

<body>

  <div class="container-fluid">
    <div class="row flex-nowrap">

      <nav class="navigator col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

          <span class="fs-5 d-none d-sm-inline">Menu</span>

          <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">

            <li class="nav-item">
              <a class="nav-link align-middle px-0" href="#" aria-current="page">Inventario Materia Prima</a>
            </li>
            <li class="nav-item">
              <a class="nav-link align-middle px-0" href="inventariopt.php">Inventario Producto terminado</a>
            </li>
            <li class="nav-item">
              <a class="nav-link align-middle px-0 " href="./clientes.php">Clientes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link align-middle px-0" href="proveedores.php">Provedores</a>
            </li>

          </ul>
          <hr>

        </div>
      </nav>

      <div class="col py-3">


        <div class="container">
          <h1 class="page-header text-center">Inventario Materia Prima</h1>
          <div class="row">
            <div class="col-12">

              <table class="table table-bordered table-striped" style="margin-top:20px;">
                <thead class="table-dark">
                  <th>Codigo</th>
                  <th>Nombre Producto</th>
                  <th>Costo</th>
                  <th>Nombre Proveedor</th>
                  <th>Descripcion</th>
                  <th>Cantidad</th>
                  <th>Peso</th>
                  <th>Unidad de Medida</th>
                  <th>Fecha caducidad</th>
                  <th>Opcion</th>
                </thead>
                <tbody>
                  <?php
                  //fetch data from json
                  $data = file_get_contents('productosmp.json');
                  //decode into php array
                  $data = json_decode($data);

                  $index = 0;
                  foreach ($data as $row) {
                    echo "
                                <tr>
                                    <td>" . $row->codigo . "</td>
                                    <td>" . $row->nproducto . "</td>
                                    <td>" . $row->costo . "</td>
                                    <td>" . $row->nproveedor . "</td>
                                    <td>" . $row->desc . "</td>
                                    <td>" . $row->cantidad . "</td>
                                    <td>" . $row->peso . "</td>
                                    <td>" . $row->unidadm . "</td>
                                    <td>" . $row->fcaducidad . "</td>
                                    <td>
                                        <a href='edit.php?index=" . $index . "' class='btn btn-success btn-sm'>Editar&nbsp&nbsp&nbsp</a>
                                        <a href='delete.php?index=" . $index . "' class='btn btn-danger btn-sm'>Eliminar</a>
                                    </td>
                                </tr>
                            ";

                    $index++;
                  }
                  ?>
                </tbody>
              </table>

              <a href="add.php" class="btn btn-success addx">Añadir Elemento</a>
              <button class="btn btn-primary reporte5" onclick="printReport()">Imprimir Reporte</button>
            </div>

          </div>
        </div>
      </div>
      <script src="script_imprimir.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>