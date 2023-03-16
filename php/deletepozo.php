<?php

if(!empty($_GET["id"])){
    $id=$_GET["id"];
    $sql=$conect->query(" delete from pozospetroleros where id='$id' ");

}
?>