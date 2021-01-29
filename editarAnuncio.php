<?php
include ("banco.php");
session_start();
if(!isset($_SESSION['id']) && empty($_SESSION['id'])){
    header("location: index.php");
}

$sql = "SELECT id_anuncio, nm_titulo, ds_descricao, vl_preco, ds_imagem, id_usuario FROM anuncio";

$cod = $_GET['cod'];
$sql1 = "SELECT id_anuncio, nm_titulo, ds_descricao, vl_preco, ds_imagem, id_usuario FROM anuncio WHERE id_anuncio = $cod";

$query = mysqli_query($connect, $sql1);

$anuncio = mysqli_fetch_array($query);


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
            <div id=formularioLogin>
            <fieldset>
                        <form method="POST" action="recebeEditarAnuncio.php" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $anuncio['id_anuncio']; ?>">
                            <p>Título:</p> <input type="text" value="<?php echo $anuncio['nm_titulo']; ?>" name="titulo" class="formulario" maxlength="55"><br/><br/>
                            <p>Descrição:</p> <textarea name="descricao" id="" cols="49" rows="15"class="formulario" style="height: 350px !important;"><?php echo $anuncio['ds_descricao']; ?></textarea><br/><br/>
                            <p>Fotos:</p> <input type="file" name="foto" class="formulario" maxlength="55">
                            <img src="assets/imgAnuncio/<?php echo $anuncio['ds_imagem']; ?>" width="250"><br/><br/>
                            <p>Preço:</p> <input type="text" value="<?php echo $anuncio['vl_preco']; ?>"name="preco" class="formulario" maxlength="22" id="money"><br/><br/>
                            <br/>
                            <br/><input type="submit" name="enviar" class="formulario">
                          
                </form>
                </fieldset> 
                </div>
            </div>
        <footer id="rodape">

            Todos os direitos reservados © DNBR
        
        </footer>
    </body>
</html>