<?php
session_start();
include('config.php');
include_once 'class/autos.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
$crud = new crud($conn);
//validacion del boton actualizar
if (isset($_POST['btn-update'])) {
    $id = $_GET['edit_id'];
    $matricula = $_POST['Matricula'];
    $marca = $_POST['Marca'];
    $modelo = $_POST['Modelo'];
    $color = $_POST['Color'];
    $precio = $_POST['Precio'];
    //hace referencia a la funcion update
    if ($crud->update($id, $matricula,$marca,$modelo,$color,$precio)) {
        $msg = "<b>WOW, Actualizacion exitosa!</b>";
    } else {
        $msg = "<b>ERROR, algo anda mal</b>";
    }
}
if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    extract($crud->getID($id));
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php require_once "menu.php" ?>
    <title>Autos</title>
</head>

<body>

    <div class="container"><br>
        <div class="row justify-content-center">
            <div class="col-6 p-5 bg-white shadow-lg rounded">
                <?php
                if (isset($msg)) {
                    echo $msg;
                }
                ?>
                <h3>ACTUALIZAR USUARIO</h3>
                <hr>
                <form method="post">
                    <div class="form-group">
                        <label for="Matricula">Matricula</label>
                        <input id="Matricula" value="<?php echo $matricula; ?>" class="form-control" type="text" name="Matricula">
                    </div>
                    <div class="form-group">
                        <label for="Marca">Marca</label>
                        <input id="Marca" value="<?php echo $marca; ?>" class="form-control" type="text" name="Marca">
                    </div><br>
                    <div class="form-group">
                        <label for="Modelo">Modelo</label>
                        <input id="Modelo" value="<?php echo $modelo; ?>" class="form-control" type="text" name="Modelo">
                    </div><br>
                    <div class="form-group">
                        <label for="Color">Color</label>
                        <input id="Color" value="<?php echo $color; ?>" class="form-control" type="text" name="Color">
                    </div><br>
                    <div class="form-group">
                        <label for="Precio">Precio</label>
                        <input id="Precio" value="<?php echo $precio; ?>" class="form-control" type="text" name="Precio">
                    </div><br>
                    <button class="btn btn-primary" name="btn-update" type="submit">Actualizar</button>
                </form>
            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>