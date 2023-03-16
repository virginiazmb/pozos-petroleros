<?php

//agregar el nombre del pozo

if(!empty($_POST["btn_enviar"])){
    if(!empty($_POST['pozosnom'])){

        $pozosnombre=$_POST['pozosnom'];
        $sqli=$conect->query(" insert into pozospetroleros(name)values('$pozosnombre') ");
    }
} 

//agregar los valores del pozo

if(!empty($_POST['btn_add'])){
    if(!empty($_POST['nom'])){

        $psi=$_POST['nom'];
        $id=$_POST['id'];
        $sql=$conect->query(" insert into valorespozos(pozoide, psi)values($id, $psi) ");

    }
}

?>