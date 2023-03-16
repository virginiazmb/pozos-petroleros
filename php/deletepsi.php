<?php

include "../db/conexion.php";

    if(!empty(($_GET["id"]))){

        $id=$_GET["id"];
        $sql=$conect->query(" delete from valorespozos where id=$id ");
    }

    $message = "Se guardó la nota exitosamete";

    echo("<script>location.href = '../index.php?msg=$message';</script>");

?>