<!DOCTYPE html>
<html lang="pt">
    <head>
        <!--área reservada para as meta tags -->
        <meta charset="utf-8"> <meta http-equiv="refresh" content="3; url=login2.php">
        <link type="text/css" rel="stylesheet" href="recursos/style/style.css">
        <title>Vendas da banha da cobra By Sérgio Silva</title>
    </head>
    <body>
        <h1>Registo de comentários</h1>
        <?php
        include 'includes/valida.php';
        include 'includes/liga_bd.php';
        //crio a instrução sql para adicionar um registo na base de dados
        $sql ="UPDATE t_artigo SET vendido=".$_POST["utilizador"]." WHERE id=".$_POST['id_artigo'];
        // tento atualizar a base de dados
        echo $sql;
        if (mysqli_query($ligacao, $sql)){
            echo "<h2>VENDA efetuada com sucesso! </h2>";
            mysqli_close($ligacao);
        }
        ?>
        <br/>
        <a href="login2.php" target="_self">Volta ao Menu</a>
    </body>
    </html>