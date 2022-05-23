<!DOCTYPE html>
<html lang="pt">
    <head>
        <!--área reservada para as meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="3; url=login2.php">
        <title>Vendas da banha da cobra By Sérgio Silva</title>
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Registo de comentários</h1>
        <?php
        include 'includes/valida.php';
        include 'includes/liga_bd.php';
        //crio a instrução sql para adicionar um registo na base de dados
        $sql ="INSERT INTO t_art_comen_v (id_comen, resposta, data) VALUES ($_POST[id_coment], '$_POST[comentario]', '$_POST[data]');";
        // tento inserir na base de dados
        echo $sql;
        if (mysqli_query($ligacao, $sql)){
            echo "<h2>Resposta inserida com sucesso! </h2>"; 
        }
        echo $sql;
        mysqli_close($ligacao);
        ?>
        <br/>
        <a href="login2.php" target=" self">Volta ao Menu</a>
    </body>
    </html>