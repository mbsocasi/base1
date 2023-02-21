<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Añadir Producto</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.css">
</head>
<body>
<div class="container">
    <h1 class="page-header text-center">Añadir Producto</h1>
    <div class="row">
        <div class="col-1"></div>
        
        <form method="POST">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Codigo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="codigo" name="codigo">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nombre Producto</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nproducto" name="nproducto">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Costo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="costo" name="costo">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nombre Proveedor</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nproveedor" name="nproveedor">
                </div>
            </div>    
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Descripcion</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="desc" name="desc">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Cantidad</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cantidad" name="cantidad">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Peso</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="peso" name="peso">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Unidad de medida</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="unidadm" name="unidadm">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Fecha Caducidad</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="fcaducidad" name="fcaducidad">
                </div>
            </div>
            <input type="submit" name="save" value="Guardar" class="btn btn-primary">
            <div style="margin-left: 20px;display:inline;"><a href="index.php">Back</a>
        </form>
        </div>
        <div class="col-5"></div>
    </div>
</div>  

<?php
    if(isset($_POST['save'])){
        //open the json file
        $data = file_get_contents('productosmp.json');
        $data = json_decode($data);
 
        //data in out POST
        $input = array(
            'codigo' => $_POST['codigo'],
            'nproducto' => $_POST['nproducto'],
            'costo' => $_POST['costo'],
            'nproveedor' => $_POST['nproveedor'],
            'desc' => $_POST['desc'],
            'cantidad' => intval($_POST['cantidad']),
            'peso' => $_POST['peso'],
            'unidadm' => $_POST['unidadm'],
            'fcaducidad' => $_POST['fcaducidad']
        );
 
        //append the input to our array
        $data[] = $input;
        //encode back to json
        $data = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents('productosmp.json', $data);
 
        header('location: index.php');
    }
?>

</body>
</html>