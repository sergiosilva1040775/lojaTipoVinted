<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8">
                <title>Comprar da banha da cobra By Sérgio Silva</title>
                <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
        </head>
        <body>
                <h1>Comprar Artigos da cobra</h1>
                <?php
                include 'includes/valida.php';
                //estabelece a conexão à base de dados
                include 'includes/liga_bd.php';
             $categoria=$_POST['categoria'];
        
                ?>
                <form action="Comprar.php" id="f1" method="post">
                        Categoria: <select name="categoria" id="categoria" onchange="this.form.submit();">
                        <?php
                        $sql ="SELECT * FROM t_categorias";
                        // a variavel resultado vai guardar todos os dados de todos os clientes
                        $resultado =mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
                        //variavel para contar os registos
                        //enquanto conseguir ler dados do array resultado imprime
                        echo "<option value='0'> Todos</option>";
                        while($linha = mysqli_fetch_assoc($resultado)){
                                if ($_POST['categoria']==$linha['id']){
                                        echo "<option value='".$linha['id']."' selected>".$linha['categoria']."</option>";
                                }
                                else{
                                        echo "<option value='".$linha['id']."'>".$linha['categoria']."</option>";
                                }
                        }
                        ?>
                        </select>
                </form>
                <h2>Artigos</h2>
                <table>
                        <tr>
                                <td>ID</td><td>Titulo</td>
                                <td>Descrição</td><td>Preço</td>
                                <td>Estado</td><td>Fotos</td>
                                <td>Comprar</td>
                        </tr>
                        <?php
                        if ($_POST['categoria']==0){
                                $sql ="SELECT * FROM t_artigo WHERE vendido=0";
                        }
                        else{
                                $sql ="SELECT * FROM t_artigo WHERE vendido=0 AND cat=".$_POST['categoria'];
                        }
                        //a variavel resultado vai guardar todos os dados de todos os clientes
                        $resultado =mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
                        //a vriavel para contar os registos
                        //enquanto conseguir ler dados do array resultado imprime
                        while($linha = mysqli_fetch_assoc($resultado)){
                                echo "<tr><td>".$linha['id']."</td><td>".$linha['titulo']."</td><td>".$linha['descricao']."</td>";
                                echo "<td>".$linha['preco']."</td><td>".$linha['estado']."</td>";
                                echo "<td><img src='artigos/".$linha['foto1']."' width='100'></td><td>";
                                ?>
                                <form action="Compar2.php" id="f1" method="post">
                                        <input type="text" size="20" name="id_artigo" value="<?php echo $linha['id'];?>">
                                        <input type="submit" value="Ver comentários fatelas / Comprar">
                                </form>
                        </td></tr>
                        <?php
                        }
                        ?>
                        </table>
                </body>
                </html>
