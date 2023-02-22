<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
</head>
<body>
<?php
    //get id from URL
    $index = $_GET['index'];
 
    //get json data
    $data = file_get_contents('../data/cliente.json');
    $data_array = json_decode($data);
 
    //assign the data to selected index
    $row = $data_array[$index];
 
    if(isset($_POST['save'])){
        $input = array(
            'codigo' => $_POST['codigo'],
            'nombre' => $_POST['nombre'],
            'apellido' => $_POST['apellido'],
            'direccion' => $_POST['direccion'],
            'telefono' => $_POST['telefono']
        );
 
        //update the selected index
        $data_array[$index] = $input;
 
        //encode back to json
        $data = json_encode($data_array, JSON_PRETTY_PRINT);
        file_put_contents('../data/cliente.json', $data);
 
        header('location: /base1/Proyecto_P/clientes.php');
    }
?>
<div class="container">
    <div class="card mt-4 p-3 bg-dark text-white-50">
    <h1 class="page-header text-center">Editar</h1>
    </div>
    <div class="row card mt-4 p-3 bg-dark text-white-50"  >
        
        <form class="mt-4" method="POST">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Codigo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $row->codigo; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nombre del cliente</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row->nombre; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Apellido del cliente</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $row->apellido; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Direccion del cliente</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $row->direccion; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Telefono del cliente</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $row->telefono; ?>">
                </div>
            </div>
            <hr>
            <div class="col-1"></div>
        <div class="col-8"> 
        <input type="submit" name="save" value="Guardar" class="btn btn-success">
        <a class="btn btn-primary" href="clientes.php">Return</a>

        </form>
        </div>
        <div class="col-5"></div>
    </div>
</div>    
</body>
</html>