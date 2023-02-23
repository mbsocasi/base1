<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Añadir Cliente</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row card m-3 p-3 bg-dark text-white-50">
            <h1 class="page-header text-center">Añadir Cliente</h1>
            <hr>
            <form method="POST">
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Codigo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="codigo" name="codigo">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Nombre del cliente</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Apellido del cliente</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="apellido" name="apellido">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Direccion</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="direccion" name="direccion">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Telefono</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="telefono" name="telefono">
                    </div>
                </div>
                <hr>
                <input type="submit" name="save" value="Guardar" class="btn btn-success">
                <a class="btn btn-primary" href="index.php">Cerrar</a>
            </form>
        </div>
    </div>
    </div>

    <?php
    if (isset($_POST['save'])) {
        //open the json file
        $data = file_get_contents('cliente.json');
        $data = json_decode($data);

        //data in out POST
        $input = array(
            'codigo' => $_POST['codigo'],
            'nombre' => $_POST['nombre'],
            'apellido' => $_POST['apellido'],
            'direccion' => $_POST['direccion'],
            'telefono' => $_POST['telefono']



        );

        //append the input to our array
        $data[] = $input;
        //encode back to json
        $data = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents('cliente.json', $data);

        header('location: clientes.php');
    }
    ?>
</body>

</html>