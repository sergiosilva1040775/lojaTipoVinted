<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Vendas da banha da cobra By Sérgio Silva</title>
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
        <script type="text/javascript"> function valida_caracteres(e) {
            var k = e. keyCode;
            // entre o 64 e 91 aceita letras
            // entre o 96 e 123 aceita apenas numeros do num lock
            // entre o 48 e 57 aceita apenas os numeros
            // o 8 é o backspace, o 32 o espaço
            // se quiserem saber mais procurem keycode javascript no google return
            ((k > 64 && k < 91) || (k > 96 && k < 123) II (k >= 48 && k <= 57) Il k == 8 || k == 32);
        }
        </script>
        </head>
        <body>
            <h1>Meus artigos</h1>
            <?php
            include 'includes/valida.php';
            //estabelece a conexão à base de dados 
            include    'includes/liga_bd.php';
            $id_artigo=$_POST['id_artigo'];
            $id_coment=$_POST['id_coment'];
            ?>
            <?php
            $sql ="SELECT * FROM t_artigo where id=" . $id_artigo;
            echo $sql;
            // imprime primeiro os dados do artigo para venda
            $resultado =mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
             $linha = mysqli_fetch_assoc($resultado);
             ?>
             Id: <?php echo $linha['id'];?><br><br>
             Titulo: <?php echo $linha['titulo'];?><br><br>
             Descrição: <?php echo $linha['descricao'];?><br><br>
             Preço:<b> <?php echo $linha['preco'];?> € </b><br><br>
             Estado: <?php echo $linha['estado'];?> estrelas<br><br>
             <img src='artigos/<?php echo $linha['fotol']?>' width="150">
             <h2>Responder ao Comentário</h2>
             <table>
                 <tr>
                     <td>ID</td>
                     <td>Comentário</td>
                     <td>Classificação</td>
                     <td>Data</td>
                     <td>Utilizador</td>
                     <td>Privacidade</td>
                    </tr>
                    <?php
                    //vai buscar o comentário que foi selecionado
                    $sql ="SELECT * FROM t_art_comen WHERE id=".$id_coment;
                    $resultado =mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao)); 
                    $linha = mysqli_fetch_assoc($resultado);
                    {
                    $sql_user="SELECT nick FROM t_user WHERE id=".$linha['id_user'];
                    // a variavel vai procurar o nick do utilizador
                    $res_user =mysqli_query($ligacao, $sql_user) or die(mysqli_error($ligacao));
                    $linha_user = mysqli_fetch_assoc($res_user);
                    echo "<tr><td>".$linha['id']."</td><td>".$linha['comentario']."</td><td>".$linha['avaliacao']."</td>";
                    echo "<td>".$linha['data']."</td><td>".$linha['id_user']."-".$linha_user['nick']." </td>"; 
                    if ($linha['publico']==0){
                        echo "<td>Publico</td></tr>";
                    } else{
                        echo "<td>Privado</td></tr>";
                    }
                }
                ?>
                </table>
                <form action="historico4.php" method="post">
                    <input type="text" name="id_coment" value="<?php echo $id_coment;?>">
                    Reposta: <br>
                    <textarea cols="80" rows="5" name="comentario" id="comentario" onkeypress="return valida_caracteres (event)"></textarea><br><br>
                    Data:<input type="text" readonly name="data" value="<?php echo date("Y-m-d H:i:sa"); ?>"><br><br>
                    <input type="submit" value="Responder">
                </form>
                <br><br>
                <input type="button" value="Voltar ao Menu" onclick="window.open('login2.php','_self')"><br/><br/>
            </body>
            </html>