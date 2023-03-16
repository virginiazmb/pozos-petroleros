
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">

</head>
<body>


        <div>
            <nav id= "text"class="navbar" style="background-color: #1B264F; padding: 10px, 5px, 10px, 5px;">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: white; font-family: 'Gill Sans MT'; font-size: 25px; margin-bottom: 9px; margin-top: 9px; margin-left:358px;" href="#">Simulación de Registro de Pozos Petroleros</a>
        </div>
            <img src="img\PDV_S.A._logo.svg.png" alt="PDVSA" width="80" height="24" style="margin-top: -65px; margin-left: 15px;">
            </nav>
        </div>

        <form method="POST">
        <?php 
        include "db/conexion.php";
        include "php/addpozo.php";
        ?>
        <div class="container" style="margin-top: 50px;">
            <input type="hidden" name="id" value="<?= $_GET['id']?>">
                <div class="mb-1"> 
                <label for="exampleInputEmail" class="form-label" style="font-family:'Gill Sans MT'; font-size: 25px;">Ingresar datos PSI</label>
                <input type="text" class="form-control" name="nom">
                </div>
                <button type="submit" class="btn btn-secondary" name="btn_add" value="ok" style= "margin-top: 20px; margin-left: 410px;">Añadir</button>

        <div class="container" style="margin-top: 85px;">
            <table class="table">
                <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Pozo</th>
                <th scope="col">PSI (valor)</th>
                <th scope="col">Fecha de Creación</th>
                </tr>
            </thead>
        <tbody class="table-group-divider">
        <?php
            include "db\conexion.php";
            $ide= $_GET['id'];
            $sql=$conect->query(" select * from valorespozos where pozoide=$ide");
                while($archives=$sql->fetch_object()){?>
                    <tr>
                    <th><?= $archives->id ?></th>
                    <th><?= $archives->pozoide ?></th>
                    <td><?= $archives->psi ?></td>
                    <td><?= $archives->date ?></td>
                        <td colspan="1">
                        <a href="php\deletepsi.php?id=<?= $archives->id ?>" class="btn btn-outline-dark" role="buttom">Eliminar</a>
                        </td>
                    </tr>
        <?php 
        } ?>

        </tbody>
            </table>
    <a href="index.php" class="btn btn-outline-dark" role="buttom" style="margin-bottom: 35px; margin-top: 20px; margin-left: 5px;">Volver</a>

        </form>
    </div>

</body>
</html>