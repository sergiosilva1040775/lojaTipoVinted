<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Vendas da banha da cobra By Sérgio Silva</title>
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css"> 
              </head>
            <body>
                <h1>Vender Artigos</h1>
                <?php
                include 'includes/valida.php';
                //estabelece a conexão à base de dados
                include 'includes/liga_bd.php';
                ?>
                <h2>Pesquisa de Produtos </h2>
                <table>
                    <tr>
                        <td>ID</td>
                        <td>Titulo</td>
                        <td>Descrição</td>
                        <td>Preço</td>
                        <td>Estado</td>
                        <td> Fotos</td>
                        <td>Comprar</td>
                        </tr>
                        <?php
                        // caso a categoria seja todas
                        if ($_POST['valor_cat']==0){
                            $sql = "SELECT * FROM t_artigo WHERE vendido=0";
                        }
                        else
                        {
                            //caso tenha escolhido uma categoria, verifica se escolheu alguma subcategoria
                            if ($_POST['valor_subcat']==0){
                                $sql ="SELECT * FROM t_artigo WHERE vendido=0 AND cat=".$_POST['valor_cat'];
                            }
                            else
                            {
                                $sql ="SELECT * FROM t_artigo WHERE vendido=0 AND cat=".$_POST['valor_cat'] . " AND subcat=".$_POST['valor_subcat'];
                            }
                        }
                        //caso tenha optado por filtar por algum campo contendo um texto ou expressão
                        if ($_POST['campo']==1)
                        {
                            $sql = $sql . " AND titulo like '%".$_POST['texto']."%'";
                        }
                        if ($_POST['campo']==2){
                            $sql = $sql . " AND descricao like '%".$_POST['texto']."%'";
                        }
                            //filtro para acrescentar os preços
                            $sql = $sql . " AND preco > ".$_POST['preco_min']." AND preco < " .$_POST['preco_max'];
                            //condição para acrescentar o estado, caso tenha escolhido algum
                            if ($_POST['estado']>0){
                                $sql = $sql . " AND estado" .$_POST['estado'];
                            }
                            // a variavel resultado vai guardar todos os dados de todos os clientes
                            $resultado =mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
                            //variavel para contar os registos //enquanto conseguir ler dados do array resultado imprime
                            while($linha = mysqli_fetch_assoc($resultado)){
                                echo "<tr><td>".$linha['id']."</td><td>".$linha['titulo']."</td><td>".$linha['descricao']."</td>";
                                echo "<td>".$linha['preco']."</td><td>".$linha['estado']."</td>";
                                echo "<td><img src='artigos/".$linha['foto1']."' width='100'></td><td>";
                                ?>
                                <form action="Compar2.php" id="f1" method="post">
                                    <input type="text" size="20" name="id_artigo" value="<?php echo $linha['id']; ?>">
                                    <input type="submit" value="Ver comentários / Comprar">
                                </form>
                                </td></tr>
                                <?php
                                }
                                //a instrução abaixo é para para fazer o debug e ter a certeza que o sql é bem construido
                                echo $sql;
                                ?>
                                </table> <input type="button" value="Voltar ao menu" onclick="window.open('login2.php', '_self')"><br/> <br/>
                            </body>
                            </html>