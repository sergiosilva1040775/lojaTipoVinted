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
        <h1>Vender Artigos embanhados</h1>
        <?php
        //faz a inclusão da função de valoidação do utilizador
        include 'includes/valida.php';
        //estabelece a conexão à base de dados
        include 'includes/liga_bd.php';
        $categoria=$_POST['categoria'];
        ?>
        <form action="Vender.php" id="f1" method="post">
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
						<form action="Vender2.php" id="f2" method="post" enctype="multipart/form-data"> 
							<input type="hidden" size="20" name="id_user" value="<?php echo $_SESSION['id'];?>" required> <br/>
							<input value = "1" type="text" size="30" name="valor_cat" id="valor_cat" required ><br/>
							<input value = "1" type="text" size="30" name="valor_subcat" required> <br/><br/>
							Titulo:<input type="text" size="50" name="titulo" required><br/><br/>
							preco:<input type="text" size="50" name="preco" required><br/><br/>
							 Descricao:<br> 
							 <textarea cols="80" rows="5" name="descricao"></textarea><br/><bri>
							  Estado: <select name="estado">
								   <option value="1"> 1 estrela</option>
								    <option value="2"> 2 estrelas</option> 
									<option value="3"> 3 estrelas</option> 
									<option value="4"> 4 estrelas</option> 
									<option value="5"> 5 estrelas</option>
								 </select><br/><br/>
								  Fotol:<input type="File" name="ficheirol"><br><br> 
								  Foto2:<input type="File" name="ficheiro2"><br><br> 
								  Foto3:<input type="File" name="ficheiro3"><br><br>
								   <input type="submit" value="Vender"> 
								   <input type="reset" value="Limpar"> 
								</form> 
							</body> 
							</html> 

