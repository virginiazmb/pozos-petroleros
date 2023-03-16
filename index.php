<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pozos Petroleros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">


</head>
<body>

    <div>
        <nav id= "text"class="navbar" style="background-color: #721817; padding: 10px, 5px, 10px, 5px;">
    <div class="container-fluid">
        <a class="navbar-brand" style="color: white; font-family: 'Gill Sans MT'; font-size: 25px; margin-bottom: 9px; margin-top: 9px; margin-left:358px;" href="#">Simulación de Registro de Pozos Petroleros</a>
    </div>
        <img src="img\PDV_S.A._logo.svg.png" alt="PDVSA" width="80" height="24" style="margin-top: -65px; margin-left: 15px;">
    </nav>
    </div>
    
    <form method="POST">
        <?php 
            include "db/conexion.php";
            include "php\deletepozo.php";
        ?>
    <div class="container" style="margin-top: 50px;">
        <label for="formGroupExampleInput" class="form-label" style="font-size: 25px; font-family:'Century Gothic';">Ingrese el nombre del pozo</label>
        <?php 
            include "php/addpozo.php";
        ?>
        <input type="text" class="form-control"  placeholder="Nombre del pozo a insertar" name="pozosnom">
        <button type="submit" class="btn btn-warning" name="btn_enviar" value="ok" style= "margin-top: 20px; margin-left: 410px;">Enviar</button>
    </div>
    </form>
    <br>
    <h3 style="margin-top: 85px; text-align: center; font-family: 'Century Gothic'; font-size: 25px; background-color: #091540; color: white; width:50%; border-radius: 8px; height: 40px; padding-top: 5px; margin-left:275px;">Históricos de los Pozos </h3>

    <div class="container" style="margin-top: 50px; margin-bottom:20px;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre del Pozo</th>
                    <th scope="col">Fecha de Creación</th>
                    </tr>
            </thead>
        <tbody class="table-group-divider">
            <?php
                include "db\conexion.php";
                $sql=$conect->query(" select * from pozospetroleros");
                    while($archives=$sql->fetch_object()){?>
                        <tr>
                        <th><?= $archives->id ?></th>
                        <td><?= $archives->name ?></td>
                        <td><?= $archives->fecha ?></td>
                            <td colspan="1">
                            <a href="valores.php?id=<?= $archives->id ?>" class="btn btn-outline-dark" role="buttom">Agregar valores</a>
                            <a href="index.php?id=<?= $archives->id ?>" class="btn btn-outline-dark" role="buttom">Eliminar</a>
                            <a href="grafica.php?id=<?= $archives->id ?>" class="btn btn-outline-dark" role="buttom">Ver Gráfico</a>
                        </td>
                        </tr>

                    <?php 
                    } ?>

        </tbody>
        </table>
    </div>


</body>
</html>