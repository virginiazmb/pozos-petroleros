<?php
    include_once("db/conexion.php");

    $id = $_GET['id'];

    $sql = "SELECT * FROM valorespozos WHERE pozoide = '$id'";
    $result = mysqli_query($conect, $sql);
    $psi = [];
    $date = [];
    
    if(mysqli_num_rows($result) > 0) {
        while($array = mysqli_fetch_array($result)) {
            array_push($psi, $array['psi']);
            array_push($date, $array['date']);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficos de Pozos Petroleros</title>
    <title>PSI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
</head>
<body>

        <div>
            <nav id= "text"class="navbar" style="background-color: #0B6E4F; padding: 10px, 5px, 10px, 5px;">
        <div class="container-fluid">
        <a class="navbar-brand" style="color: white; font-family: 'Gill Sans MT'; font-size: 25px; margin-bottom: 9px; margin-top: 9px; margin-left:358px;" href="#">Simulación de Registro de Pozos Petroleros</a>
        </div>
        <img src="img\PDV_S.A._logo.svg.png" alt="PDVSA" width="80" height="24" style="margin-top: -65px; margin-left: 15px;">
            </nav>
        </div>

        <h3 style="margin-top: 35px; text-align: center; font-family: 'Century Gothic'; font-size: 25px; background-color: #4C8577; color: white; width:50%; border-radius: 8px; height: 40px; padding-top: 5px; margin-left:275px;">Gráfica de los PSI registrados </h3>

        <div class="container" style="height:450px; width:450px; margin-top: 30px;">

        <canvas id = "lineChart" height = "400" width = "400"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const CHART = document.getElementById("lineChart");
        console.log(CHART);
        let lineChart = new Chart(CHART, {
            type: "line",
            data: {
                labels: [<?php echo '"'.implode('","',  $date ).'"' ?>],
                datasets: [{
                    label: 'Gráfica de psi',
                    data: [<?php echo '"'.implode('","',  $psi ).'"' ?>],
                    fill: false,
                    borderColor: 'rgb(56, 108, 11)',
                    tension: 0.1,
                    backgroundColor: 'rgb(199, 214, 213, 1)',
                }]
        }
    })
    </script>

        </div>
</body>
</html>