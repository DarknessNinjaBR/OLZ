<?php 

	include "banco.php";
	session_start();

    $id = addslashes($_POST['id']);
    $titulo = addslashes($_POST['titulo']);
    $descricao = addslashes($_POST['descricao']);
    $preco = addslashes($_POST['preco']);
    $date = date('Y-m-d H:i:s');
    $nomeImg=md5(rand(1,9999)).md5($_FILES['foto']['tmp_name']).md5($date).$_FILES['foto']['name'];

    if (!empty($_FILES['foto']['tmp_name'])){


    $sql = "UPDATE anuncio SET nm_titulo = '$titulo', ds_descricao = '$descricao', vl_preco = '$preco', ds_imagem = '$nomeImg'  WHERE id_anuncio = $_POST[id]";
    move_uploaded_file($_FILES['foto']['tmp_name'],"assets/imgAnuncio/$nomeImg");

    $query = mysqli_query($connect,$sql);

    header("location: perfil.php");

    }else{

        $sql = "UPDATE anuncio SET nm_titulo = '$titulo', ds_descricao = '$descricao', vl_preco = '$preco'  WHERE id_anuncio = $_POST[id]";
        echo "nao tem arquivo";

        $query = mysqli_query($connect,$sql);

        header("location: perfil.php");
    }


 ?>