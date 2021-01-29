<?php
include("banco.php");
session_start();
error_reporting(0);

$pesquisa = $_GET['result'];
if($_GET['pagina']){
    $pagina = $_GET['pagina'];
}else{
    $pagina = 1;
}
$sql2 = "SELECT count(*) FROM anuncio WHERE nm_titulo LIKE '%$pesquisa%'";
$resultado2 = mysqli_query($connect, $sql2);
$contador = mysqli_fetch_array($resultado2);
$registros = $contador[0];
$registroPorPagina = 15;
$quantidadeDePaginas = $registros / $registroPorPagina;

$inicioPag = ($registroPorPagina*$pagina)-$registroPorPagina;

//$sql1 = "SELECT id_anuncio, nm_titulo, ds_descricao, vl_preco, ds_imagem, id_usuario FROM anuncio ORDER BY id_anuncio DESC";
$sql1 = "SELECT id_anuncio, nm_titulo, ds_descricao, vl_preco, ds_imagem, id_usuario FROM anuncio WHERE nm_titulo LIKE '%$pesquisa%' ORDER BY id_anuncio DESC LIMIT $registroPorPagina OFFSET $inicioPag";
//echo $publicacao;

$resultado = mysqli_query($connect, $sql1);


/*$idUsuario = $anuncio['id_usuario'];
$sql = "SELECT id_usuario, nm_usuario, ds_email, nm_pessoa, ds_telefone, ds_uf, ds_cep FROM usuario";

$tosql = mysqli_query($connect, $sql);
$usuario = mysqli_fetch_array($tosql);*/

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
        <br>
        <h2>Resultados para <?php echo $pesquisa; ?>.</h2>
        <br />
        <br />
        <div id="resultado">

            <?php
            while ($anuncio = mysqli_fetch_array($resultado)) {
            ?>
                <a href="anuncio.php?publicacao=<?php echo $anuncio['id_anuncio']; ?>">
                    <div class="grid-container1">
                        <div class="imagemAnu"> <img src="assets/imgAnuncio/<?php echo $anuncio['ds_imagem']; ?>" width="100"></div>
                        <div class="tituloAnun"> <?php echo $anuncio['nm_titulo']; ?></div>
                        <div class="PrecoAnun">
                            <h3>R$ <?php echo $anuncio['vl_preco']; ?></h3>
                        </div>
                    </div>
                </a>

                <?php
                if (isset($_SESSION['idAdmin']) && !empty($_SESSION['idAdmin'])) {
                ?>
                    <a href="editarAnuncio.php?cod=<?php echo $anuncio['id_anuncio']; ?>"><img src="assets/css/img/editar.png" width="30"></a>
                <a href="deletarAnuncio.php?cod=<?php echo $anuncio['id_anuncio']; ?>"><img src="assets/css/img/lixo.png" width="30"></a>
                <?php
                }
                ?>

            <?php
            }
            ?>

            <br><br>
            <div id="menuPaginas">
            <?php

            for($i = 1; $i < $quantidadeDePaginas + 1; $i++){
                if($i == $pagina){
                    echo " <a>$i</a> ";
                }else{
                    echo " <a href='pesquisa.php?result=$_GET[result]&pagina=$i'>$i</a> ";
                }
            }
            ?>

                <br>
                <br>
            </div>
        </div>
    </div>
    <footer id="rodape">

        Todos os direitos reservados © DNBR

    </footer>
</body>

</html>