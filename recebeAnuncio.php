<?php

    include "banco.php";

    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $date = date('Y-m-d H:i:s');
    $nomeImg=md5(rand(1,9999)).md5($_FILES['foto']['tmp_name']).md5($date).$_FILES['foto']['name'];
    $id = $_POST['id'];

    if(isset($_POST['titulo']) && !empty($_POST['titulo']) && 
   isset($_POST['preco']) && !empty($_POST['preco']) && isset($_FILES['foto']['tmp_name']) && !empty($_FILES['foto']['tmp_name'])){

    $sql = "INSERT INTO anuncio (nm_titulo,ds_descricao,vl_preco,ds_imagem,id_usuario) VALUES ('$titulo','$descricao','$preco','$nomeImg','$id')";

    move_uploaded_file($_FILES['foto']['tmp_name'],"assets/imgAnuncio/$nomeImg");

   $query = mysqli_query($connect,$sql);

   header("location: index.php");

   }else{


    header("location: formAnuncio.php?erro=1");
   }

    
    

    /*$insert="INSERT INTO anuncio ds_imagem values '$nomeImg'";












    /*$image = 'image.png';
    list($original_width,$orignal_height) = getimagesize($image);
    $final_image = imagecreatetruecolor($original_width,$orignal_height);
    $original_image = imagecreatefrompng($image);
    imagecopy(
        $final_image,
        $original_image,
        0,
        0,
        0,
        0,
        $original_width,
        $orignal_height);
        imagecopy(
        $final_image,
        $waterMark,
        100,
        500,
        0,
        0,
        imagepng($final_image,'img/image+water-mark.png');
        echo "criada com sucesso a watermark";*/
?>