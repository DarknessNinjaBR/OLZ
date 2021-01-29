<?php
include ("banco.php");
session_start();

$sql = "SELECT id_estado, nm_estado, ds_uf FROM estado";

$tosql = mysqli_query($connect, $sql);
            
$sql1 = "select id_estado, nm_estado, ds_uf FROM estado WHERE id_estado = $_GET[cod]";

$resultado = mysqli_query($connect, $sql1);
$pessoa = mysqli_fetch_array($resultado);

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
        

        <div id=formularioLogin>
            <fieldset>
                <form method="POST" action="recebeEditarEstado.php">
                    <input type="hidden" name="cod" value="<?php echo $pessoa['id_estado']; ?>" class="formulario" maxlength="55">
                    <p>Estado:</p><input type="text" name="estado" value="<?php echo $pessoa['nm_estado']; ?>" class="formulario" maxlength="55"><br/><br/>
                    <p>UF:</p><input type="text" name="uf" value="<?php echo $pessoa['ds_uf']; ?>" class="formulario" maxlength="2"><br/><br/>
                    <input type="submit" name="enviar" class="formulario">
                        
                </form>
                </fieldset>
                    

    </div>
    <footer id="rodape">

        Todos os direitos reservados © DNBR

    </footer>
</body>
</html>