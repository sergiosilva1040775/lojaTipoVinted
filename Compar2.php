<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Vendas da banha da cobra By Sérgio Silva</title>
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
        <script type="text/javascript"> function valida caracteres (e)
        {
            var k = e.keyCode;
            // entre o 64 e 91 aceita letras
            // entre o 96 e 123 aceita apenas numeros do num lock
            // entre o 48 e 57 aceita apenas os numeros
            // o 8 é o backspace, o 32 o espaço
            // se quiserem saber mais procurem keycode javascript no google
            return ((k > 64 && k < 91) || (k > 96 && k < 123) 1 (k >= 48 && k<= 57) || k == 8 || k == 32);
            }
            </script>
        </head>
        <body>
            <h1>Venda de artigos da cobra</h1>
            <?php
            include 'includes/valida.php';
            //estabelece a conexão à base de dados
            include 'includes/liga_bd.php';
            $id_artigo=$_POST['id_artigo'];
            ?>
            <?php
            $sql ="SELECT * FROM t_artigo where id=" . $id_artigo;
           // echo $sql; 
            //a variavel resultado vai guardar todos os dados de todos os clientes
            $resultado =mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
            $linha = mysqli_fetch_assoc($resultado);
            ?>
            Id: <?php echo $linha['id'];?><br><br>
            Titulo: <?php echo $linha['titulo'];?><br><br>
            Descrição: <?php echo $linha['descricao'];?><br><br>
            Preço:<b> <?php echo $linha['preco'];?> € </b><br><br>
            Estado: <?php echo $linha['estado'];?> estrelas<br><br>
            <img src="artigos/<?php echo $linha['foto1']?>" width="150">
            <!-- devem fazer a validação se os campos estão vazios ou não -->
            <img src="artigos/<?php echo $linha['foto2']?>" width="150">
            <img src="artigos/<?php echo $linha['foto3']?>" width="150">

<h2>Comentários fatelas</h2>
<table>
    <tr>
        <td>ID</td>
        <td>Comentário</td>
        <td>Classificação</td>
        <td>Data</td>
        <td>Utilizador</td>
    </tr>
<?php
$sql ="SELECT * FROM t_art_comen WHERE publico=0 And id_artigo=" . $id_artigo;
// a variavel resultado vai guardar todos os dados de todos os clientes
$resultado =mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
echo $sql; 
//variavel para contar os registos
//enquanto conseguir ler dados do array resultado imprime


while($linha = mysqli_fetch_assoc($resultado))
{
    $sql_user ="SELECT nick FROM t_user WHERE id=" .$linha['id_user'];
$resultado_user =mysqli_query($ligacao, $sql_user) or die(mysqli_error($ligacao));
$linha_user= mysqli_fetch_assoc($resultado_user);
echo $sql_user; 

echo "<tr><td>".$linha['id']."</td><td>".$linha['comentario']."</td><td>".$linha['avaliacao']."</td>";
echo "<td>".$linha['data']."</td><td>".$linha['id_user']." - " .$linha_user['nick']." </td></tr>";
//.$linha_user['nick']
?>
<?php
}
?>
</table>
<br><br>
<form action="Comprar3.php" method="post">
<input type="text" name="id_artigo" value="<?php echo $id_artigo; ?>"><br><br> 
Comentário:<br> <textarea cols="80" rows="5" name="comentario" id="comentario" onkeypress="return valida_caracteres (event)"></textarea><br><br> 

Classificação: <input type="number" min="0" max="20" name="classificacao"><br><br>
Data: <input type="text" readonly name="data" value="<?php echo date("Y-m-d H:i:sa"); ?>"><br><br>
Publico:<select name="publico">
<option value="0">Publico</option>
<option value="1"> Privado</option>
</select><input type="submit" value="Comentar">
</form>
<form action="Comprar.php" method ="post">
                <input type = "text" name="categoria" value="0";>
                <input type = "submit" name="Ver Lista de produtos";>
</form>
</body>
</html>