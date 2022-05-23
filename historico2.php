<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Vendas da banha da cobra By Sérgio Silva</title>
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
        </head>
        <body>
            <h1>Meus artigos</h1>
            <?php
            include 'includes/valida.php';
            //estabelece a conexão à base de dados
            include 'includes/liga_bd.php';
            $id_artigo=$_POST['id_artigo'];
            ?>
            <?php
            $sql = "SELECT * FROM t_artigo where id=".$id_artigo;
            echo $sql;
            // a variavel resultado vai guardar todos os dados de todos os clientes
            $resultado =mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
            $linha = mysqli_fetch_assoc($resultado);
            $vendido=$linha[ 'vendido'];
            ?>
            Id: <?php echo $linha['id'];?><br><br>
            Titulo: <?php echo $linha['titulo'];?><br><br>
            Descrição: <?php echo $linha['descricao'];?><br><br>
            Preço:<b> <?php echo $linha['preco'];?> € </b><br><br>
            Estado: <?php echo $linha['estado']; ?> estrelas<br><br>
            <img src="artigos/<?php echo $linha['foto1']?>" width="150">
            <h2>Comentários </h2>
            <table>
                <tr>
                    <td>ID</td>
                    <td>Comentário</td>
                    <td>Classificação</td>
                    <td>Data</td>
                    <td>Utilizador</td>
                    <td>Privacidade</td>
                    <td>Ação</td>
                </tr>
                <?php
                $sql = "SELECT * FROM t_art_comen WHERE id_artigo=".$id_artigo; 
                //a variavel resultado vai guardar todos os dados de todos os comentarios
                $resultado =mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao)); 
                //enquanto conseguir ler dados do array resultado imprime
                while($linha = mysqli_fetch_assoc($resultado)){
                    $sql_user ="SELECT nick, email FROM t_user WHERE id=".$linha['id_user'];
                    // a variavel vai buscar o nick e email do utilizador
                    $res_user =mysqli_query($ligacao, $sql_user) or die(mysqli_error($ligacao));
                    $linha_user = mysqli_fetch_assoc($res_user);
                    echo "<tr><td>".$linha['id']."</td><td>".$linha['comentario']."</td><td>".$linha['avaliacao']."</td>";
                    echo "<td>".$linha['data']."</td><td>".$linha['id_user']."." .$linha_user['nick']." </td>";
                    if ($linha['publico']==0){echo "<td>Publico</td>"; }
                    else{echo "<td>Privado</td>"; }
                    $sql_res = "SELECT * FROM t_art_comen_v WHERE id_comen=".$linha['id']; 
                    echo $sql_res;
                    $res_res =mysqli_query($ligacao, $sql_res) or die(mysqli_error($ligacao));
                    $linha_res = mysqli_fetch_assoc($res_res);
                    //caso não existam respostas
                    if (!$linha_res)
                    {
                        ?>
                        <td>
                            <?php
                            //caso a mensagem seja publica
                            if ($linha[ 'publico']==0)
                            {
                                ?>
                                <form action="historico3.php" method="post">
                                    <input type="hidden" name="id_artigo" value="<?php echo $linha['id_artigo']; ?>">
                                    <input type="hidden" name="id_coment" value="<?php echo $linha["id"]; ?>">
                                    <input type="submit" value="Comentar"> </form>
                                    <?php
                                    }
                                    else
                                    {
                                        echo "E-mail:". $linha_user['email'];
                                    }
                                    ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td colspan="6"><b>0 vendedor ainda não respondeu</b></td></tr>
                                    <?php
                                    }
                                    //caso existam respostas
                                    else
                                    {
                                         ?>
                                         <td>&nbsp;</td></tr>
                                         <tr><td>&nbsp;</td>
                                         <td colspan="4"><b>Resposta: <?php echo $linha_res['resposta'];?></b></td>
                                         <td colspan="2"><b>Data: <?php echo $linha_res["data"];?></b></td></tr>
                                         <?php
                                         }
                                        }
                                        ?>
                                        </table>
                                        <br><br>
                                        <?php
                                        //se ainda não foi vendido aparece o form para finalizar a venda
                                        if ($vendido==0){
                                            ?>
                                            <form action="historico_fi.php" method="post">
                                                <h3>
                                                    <input type="text" name="id_artigo" value="<?php echo $id_artigo; ?>">
                                                    Finalizar a compra, escolha o utilizador: <select name="utilizador">
                                                        <?php
                                                        $sql ="SELECT DISTINCT(id_user) FROM t_art_comen WHERE id_artigo=".$id_artigo;
                                                        echo    $sql ;
                                                        $resultado =mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
                                                        while($linha = mysqli_fetch_assoc($resultado)){
                                                            $sql_user ="SELECT nick FROM t_user WHERE id=".$linha['id_user'];
                                                            $res_user =mysqli_query($ligacao, $sql_user) or die(mysqli_error($ligacao));
                                                            $linha_user = mysqli_fetch_assoc($res_user);
                                                            echo "<option value='".$linha['id_user']."'>" .$linha_user['nick']."</option>";  
                                                        }
                                                            ?>
                                                            </select>
                                                            <input type="submit" value="Finalizar">
                                                        </h3>
                                                        </form>
                                               
                                                        <?php     
                                                        }
                                                        ?>
                                                        <br><br>
                                                        <input type="button" value="Voltar ao Menu" onclick="window.open('login2.php', '_self')"><br/><br/>
</body> </html>