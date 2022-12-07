<?php
    require_once("./conectaBD.php");
    try {
        //SQL de Insercao no banco de dados
        $sql = "INSERT INTO tb_conteudos (titulo, descricao, diretor, data, URLimagem, categoria) VALUES (:tit, :desc, :dir, :dt, :img, :cat)";
    
        //Preparando a SQL no Statement
        $stmt = $pdo->prepare($sql);
    
        //Array dos dados a serem executados na SQL
        $dados = array(
            ":tit" => $_POST["titulo"],
            ":desc" => $_POST["descricao"],
            ":dir" => $_POST["diretor"],
            ":dt" => $_POST["data"],
            ":img" => $_POST["URLimagem"],
            ":cat" => $_POST["categoria"]
        );
    
        //Executando a SQL no BD
        $resultado = $stmt->execute($dados);
        header("Location: index.php?msg=Conteúdo cadastrado com sucesso!");
    } catch (PDOException $e) {
        header("Location: index.php?msg=Falha ao cadastrar o conteúdo");
    }
?>