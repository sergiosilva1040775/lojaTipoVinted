<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Vendas da banha da cobra By Sérgio Silva</title>
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
        <!-- a função abaixo mantem os dados do segundo form sincronizados com os valores selecionados nos selects do primeiro formulário -->
        <script type="text/javascript">
        function atualiza() {
            document.getElementById("f2").elements.namedItem("valor_cat").value=
            document.getElementById("f1").elements.namedItem("categoria").value;
            document.getElementById("f2").elements.namedItem("valor_subcat").value=
            document.getElementById("f1").elements.namedItem("subcategoria").value;
        }
        atualiza();
        </script>
        </head>
        <body onload="atualiza();">
        <h1>Pesquisar Artigos embanhados</h1>
        <?php
        //faz a inclusão da função de valoidação do utilizador
        include 'includes/valida.php';
        //estabelece a conexão à base de dados
        include 'includes/liga_bd.php';
        $categoria=$_POST['categoria'];
        ?>
        <form action="pesq.php" id="f1" method="post">
            Categoria: <select name="categoria" id="categoria"  onchange="this.form.submit();">
            <?php // esta condicional acrescenta a categoria todos ao select
            if ($categoria==0)
                echo "<option value='0' selected> Todos </option>";
            else
                echo "<option value='0'> Todos </option>";
                $sql ="SELECT * FROM t_categorias";
                // a variavel resultado vai guardar todos os dados de todos os clientes
                $resultado =mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
                //enquanto conseguir ler dados do array resultado imprime
                while($linha = mysqli_fetch_assoc($resultado)){
                    if ($_POST['categoria']==$linha['id'])
                        echo "<option value='".$linha['id']."' selected>".$linha['categoria']."</option>";
                    else
                        echo "<option value='".$linha['id']."'>".$linha['categoria']."</option>";
                    }
                    ?>
                    </select><br><br>
                    Subcategoria: <select name="subcategoria" id="subcategoria"  onchange="atualiza();">
                    <?php
                    //acrescenta a opção todos nas subcategorias
                    if ($categoria==0){
                        echo "<option value='0' selected> Todos </option>";}
                    else
                    {
                        echo "<option value='0' selected> Todos </option>" ;
                        $sql2 ="SELECT * FROM t_subcat where categoria=".$_POST['categoria'];
                        // a variavel resultado vai guardar todas as subcategorias da categoria selecionada
                        $resultado2 =mysqli_query($ligacao, $sql2) or die(mysqli_error($ligacao));
                        //enquanto conseguir ler dados do array resultado imprime
                        while($linha2 = mysqli_fetch_assoc($resultado2)){
                            echo "<option value='".$linha2['id']."'>".$linha2['subcategoria']."</option>";  }
                            }?>
                            </select>
                        </form>
                        <form action="pesq2.php" id="f2" method="post">
                            <!-- os dois campos que seguem são atualizados automaticamente pelos selects dos forms anteriores -->
                            <input type="text" size="30" name="valor_cat" value="0" id="valor_cat" required><br/>
                            <input type="text" size="30" name="valor_subcat" value="9" required><br/><br/>
                            <!-- escolha do campo a pesquisar -->
                            Campo a pesquisar <select name="campo">
                                <option value="0">Nenhum</option>
                                <option value="1">Título</option>
                                <option value="2">Descrição</option>
                            </select><br><br>
                            Texto a pesquisar <input type="text" size="58" name="texto"><br/><br/>
                            <!-- estipulação dos valores mínimo e máximo do preço-->
                            Preço mínimo:<input type="text" size="10" name="preco_min" required value="0"><br/><br/>
                            Preço máximo: <input type="text" size="10" name="preco_max" required value="99999"><br/><br/>
                            <!-- pesquisa pelo estado -->
                            Estado: <select name="estado">
                                <option value="0"> Não aplicavel</option>
                                <option value="1"> 1 estrela</option>
                                <option value="2"> 2 estrelas</option>
                                <option value="3"> 3 estrelas</option>
                                <option value="4"> 4 estrelas</option>
                                <option value="5"> 5 estrelas</option>
                            </select><br/><br/>
                            <input type="submit" value="Pesquisar"><br>
                            </form> <form action="pesq.php" method="post">
<input type="text" name="categoria" value="0">
<input type="submit" value="Limpar"> </form><br><br>
<input type="button" value="Voltar ao menu" onclick="window.open('login2.php','_self')"><br/> <br/>
</body> </html>