<?php

include ("banco.php");
session_start();

$sql = "DELETE FROM estado WHERE id_estado = $_GET[cod]";

mysqli_query($connect, $sql);

header("location: formEstado.php"); 