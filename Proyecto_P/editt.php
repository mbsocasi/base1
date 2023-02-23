<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Editar Platillo</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
</head>

<body>
    <?php
    //get id from URL
    $index = $_GET['index'];

    //get json data
    $data = file_get_contents('productot.json');
    $data_array = json_decode($data);

    //assign the data to selected index
    $row = $data_array[$index];

    if (isset($_POST['save'])) {
        $input = array(
            'codigo' => $_POST['codigo'],
            'nplatillo' => $_POST['nplatillo'],
            'costo' => $_POST['costo'],
            'desc' => $_POST['desc'],
            'cantidad' => $_POST['cantidad'],
            'fechacaducidad' => $_POST['fechacaducidad'],
            'fechaelaboracion' => $_POST['fechaelaboracion']
        );

        //update the selected index
        $data_array[$index] = $input;

        //encode back to json
        $data = json_encode($data_array, JSON_PRETTY_PRINT);
        file_put_contents('productot.json', $data);

        header('location: inventariopt.php');
    }
    ?>

    <div class="container">
        <div class="row card m-3 p-3 bg-dark text-white-50">
            <h1 class="page-header text-center">Editar Producto</h1>
            <hr>
            <form method="POST">
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Codigo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $row->codigo; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Nombre Platillo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nplatillo" name="nplatillo" value="<?php echo $row->nplatillo; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Costo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="costo" name="costo" value="<?php echo $row->costo; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Descripcion</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="desc" name="desc" value="<?php echo $row->desc; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Cantidad</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="cantidad" name="cantidad" value="<?php echo $row->cantidad; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Fecha Caducidad</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="fechacaducidad" name="fechacaducidad" value="<?php echo $row->fechacaducidad; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Fecha Elaboracion</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="fechaelaboracion" name="fechaelaboracion" value="<?php echo $row->fechaelaboracion; ?>">
                    </div>
                </div>
                <hr>
                <input type="submit" name="save" value="Guardar" class="btn btn-success">
                <a class="btn btn-primary" href="inventariopt.php">Back</a>
            </form>
        </div>
    </div>
</body>

</html>