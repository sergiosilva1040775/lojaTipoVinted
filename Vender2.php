<!DOCTYPE html>
<html>
	<head>
		 <meta charset="utf-8">
		 <meta http-equiv="refresh" content="20;url=index.html" />
		 <title>Vendas da banha da cobra By Sérgio Silva</title>
        <link href = "recursos/style/style.css" rel ="stylesheet" type="text/css">
 </head>
 <body>
 <hl>Registo de artigos enganosos</h1> 
 <?php 
 include 'includes/liga_bd.php';
 $_FILES["ficheiro"]=$_FILES["ficheirol"];
 include 'includes/valida_fotoa.php'; 
 // verifica se $uploadOk esta a 0 por algum erro
  if ($uploadOk == 0) {
      echo "0 seu ficheiro não foi enviado.";
      // se tudo estH correcto faz o upload file
    }else  {
        if ($uploadOk ==1) {
            move_uploaded_file($_FILES["ficheiro"]["tmp_name"], $target_file);
            //crio a instrucao sql para adicionar um registo na base de dados
            $sql ="INSERT INTO t_artigo (id_user, cat, subcat, titulo, descricao, preco, estado, foto1) VALUES
            ($_POST[id_user], $_POST[valor_cat], $_POST[valor_subcat], '$_POST[titulo]', '$_POST[descricao]',
            $_POST[preco], $_POST[estado], '".$foto."');";
            // tento inserir na base de dados
            echo $sql;
            if (mysqli_query($ligacao, $sql)) {
                echo "<h2>Registo efetuado com sucesso! - fot1 </h2>";
            }
        } 

    //valida o da foto 2 
    if (!empty($_FILES["ficheiro2"]["name"][0])) {
        $sql ="SELECT id FROM t_artigo ORDER BY id DESC"; 
        $resultado =mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
        $linha = mysqli_fetch_assoc($resultado); 
        $_FILES["ficheiro"]=$_FILES["ficheiro2"]; 
        include 'includes/valida_fotoa.php';
        if ($uploadOk ==1) {
                move_uploaded_file($_FILES["ficheiro"]["tmp_name"], $target_file); 
                $sql2 ="UPDATE t_artigo SET foto2='".$foto."' WHERE id= $linha[id];";
                echo $sql2;
                if (mysqli_query($ligacao, $sql2)) {
                 echo "<h2>Registo efetuado com sucesso - foto2 ! </h2>";
                }
            }
        }
        //validacao da foto 3 
        if (!empty($_FILES["ficheiro3"]["name"][0])) { 
            $sql ="SELECT id FROM t_artigo ORDER BY id DESC"; 
            $resultado =mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
            $linha = mysqli_fetch_assoc($resultado);
            $_FILES["ficheiro"]=$_FILES["ficheiro3"]; 
            include 'includes/valida_fotoa.php'; 
                if ($uploadOk ==1){
                    move_uploaded_file($_FILES["ficheiro"]["tmp_name"], $target_file);
                    $sql3 ="UPDATE t_artigo SET foto3='".$foto."' WHERE id= $linha[id];"; 
                    echo $sql3;
                    if (mysqli_query($ligacao, $sql2)) {
                        echo "<h2>Registo efetuado com sucesso - foto3 ! </h2>";
                       }
                } 
            } 
        } 

mysqli_close($ligacao);
 ?> <br/> 
 <a href="login2.php" target="_self">Volta ao Menu</a> 
</body>
  </html> 