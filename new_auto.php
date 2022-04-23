<?php
include('config.php');
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
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
                <h3>Nuevo Auto</h3>
                <hr>
                <form method="post" action="registroa.php">
                    <div class="form-group">
                        <label for="Matricula">Matricula:</label>
                        <input id="Matricula" class="form-control" type="text" name="Matricula">
                    </div>
                    <div class="form-group">
                        <label for="Marca">Marca:</label>
                        <input id="Marca" class="form-control" type="text" name="Marca">
                    </div>
                    <div class="form-group">
                        <label for="Modelo">Modelo:</label>
                        <input id="Modelo" class="form-control" type="text" name="Modelo">
                    </div>
                    <div class="form-group">
                        <label for="Color">Color:</label>
                        <input id="Color" class="form-control" type="text" name="Color">
                    </div>
                    <div class="form-group">
                        <label for="Precio">Precio:</label>
                        <input id="Precio" class="form-control" type="text" name="Precio">
                    </div> <br>
                    <button class="btn btn-primary" name="registroa" type="submit" >Guardar</button>
                </form>
            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>