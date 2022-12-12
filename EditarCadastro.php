<?php
    try {
        require_once("conectaBD.php");
        
        //SQL de Insercao no banco de dados
        $sql = "UPDATE tb_conteudos SET titulo='$_GET[0]['titulo']', descricao='$_GET[0]['descricao']', diretor='$_GET[0]['diretor']', data='$_GET[0]['data']', URLimagem='$_GET[0]['URLimagem']', categoria='$_GET[0]['categoria']' WHERE codigo = :cod";
    
        //Preparando a SQL no Statement
        $stmt = $pdo->prepare($sql);
    
        $resultado = $stmt->execute();
        header("Location: index.php?msg=Conteúdo cadastrado com sucesso!");
    } catch (PDOException $e) {
        header("Location: index.php?msg=Falha ao cadastrar o conteúdo");
    }
?>
