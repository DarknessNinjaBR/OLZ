<?php

include ("banco.php");
session_start();

$sql = "DELETE FROM anuncio WHERE id_anuncio = $_GET[cod]";

mysqli_query($connect, $sql);

header("location: perfil.php"); 