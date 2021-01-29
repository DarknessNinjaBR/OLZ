<?php
include ("banco.php");
session_start();

$publicacao = $_GET['publicacao'];
            
$sql1 = "SELECT id_anuncio, nm_titulo, ds_descricao, vl_preco, ds_imagem, id_usuario FROM anuncio WHERE id_anuncio = $publicacao";

//echo $publicacao;

$resultado = mysqli_query($connect, $sql1);
$anuncio = mysqli_fetch_array($resultado);


$idUsuario = $anuncio['id_usuario'];
$sql = "SELECT id_usuario, nm_usuario, ds_email, nm_pessoa, ds_telefone, ds_uf, ds_cep FROM usuario WHERE id_usuario = $idUsuario";

$tosql = mysqli_query($connect, $sql);
$usuario = mysqli_fetch_array($tosql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/jquery.mask.js"></script>
    <title>OLZ</title>

    <script>
        $(document).ready(function(){
            $('#date').mask('11/11/1111');
            $('time').mask('00:00:00');
            $('date_time').mask('99/99/9999 00:00:00');
            $('#cep').mask('99999-999');
            $('#phone').mask('9999-9999');
            $('#phone_with_ddd').mask('(99) 99999-9999');
            $('#phone_us').mask('(999) 999-9999');
            $('mixed').mask('AAA 000-S0S');
            $('#money').mask('000.000.000.000.000,00', {reverse: true});
});
    </script>

</head>
<body>
<header class="header">
        <div id="top">
            <a href="index.php"><img src="assets/css/img/logo.png" width="100"></a>
            <form action="pesquisa.php" method="GET">

                <input type="text" name="result">
                <button id="pesquisa"><img src="assets/css/img/lupa.png" width="27"></button>
            </form>
        </div>
        <div id="cantodireito">
            <h1>OLZ: Botou, Vendeu</h1>
        </div>
    </header>
    <div id="menu">
        <?php
        if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        ?>
            <a href="perfil.php">Perfil</a>
            <a href="deslogar.php">Sair</a>
            <?php
            if (isset($_SESSION['idAdmin']) && !empty($_SESSION['idAdmin'])) {
            ?>
                <a href="formEstado.php">Adicionar Estado</a>
            <?php
            }
            ?>
            <a href="formAnuncio.php">Anuncie aqui!</a>

        <?php
        } else {
        ?>
            <a href="formRegistro.php">Registrar-se</a>
            <a href="formLogin.php">Entrar</a>
        <?php
        }
        ?>


    </div>
        <div id="conteudo">
        <div id="anuncio">
        <div class="grid-container">
            <div class="imagem">
                <div style="width: 750px !important;">
                    <img src="assets/imgAnuncio/<?php echo $anuncio['ds_imagem']; ?>" width="650">
                    </div>
                </div>
            <div class="titulo">
                <h2> <?php echo $anuncio['nm_titulo']; ?> </h2>
            </div>
            
            <div class="info">
                <div id="preco">
                    <img src="assets/css/img/preco.png" width="300"><h2 style="margin-top: -74px; margin-left: 35px;">R$ <?php echo $anuncio['vl_preco']; ?></h2></img>
                
            </div>
                <br><br>
                <fieldset>
                <h3><?php echo $usuario['nm_pessoa']; ?></h3>
                <h5><?php echo $usuario['nm_usuario']; ?></h5><br>
                <img src="assets/css/img/telefone.png" width="25"> <?php echo $usuario['ds_telefone']; ?><br><br>
                    <button onclick="window.location.href='https://api.whatsapp.com/send?phone=55<?php $data = $usuario['ds_telefone'];$data = preg_replace('/[^A-Za-z0-9]/', "", $data);
; echo $data; ?>';">CHAT</button><br>
                <br>
                CEP: <?php echo $usuario['ds_cep']; ?> - <?php echo $usuario['ds_uf']; ?>
                </fieldset>
            </div>
            <div class="descricao" style="width: 100%;">
            <h2>R$ <?php echo $anuncio['vl_preco']; ?></h2><br>

            <textarea name="descricao" id="" cols="49" rows="15"class="formulario" style="height: 350px !important; width: 100% !important; border: 0 !important;" disabled><?php echo $anuncio['ds_descricao']; ?></textarea>
            </div>
        </div>
            </div>

    </div>
    <footer id="rodape">

        Todos os direitos reservados © DNBR

    </footer>
</body>
</html>