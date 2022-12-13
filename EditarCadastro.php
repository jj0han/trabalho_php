<?php
    require_once("conectaBD.php");
    try {
        //SQL de Insercao no banco de dados
        $sql = 'UPDATE tb_conteudos SET titulo=:tit, descricao=:desc, diretor=:dir, data=:dt, URLimagem=:img, categoria=:cat WHERE codigo =:cod';
    
        //Preparando a SQL no Statement
        $stmt = $pdo->prepare($sql);

        $dados = array(
            ":tit" => $_POST["titulo"],
            ":desc" => $_POST["descricao"],
            ":dir" => $_POST["diretor"],
            ":dt" => $_POST["data"],
            ":img" => $_POST["URLimagem"],
            ":cat" => $_POST["categoria"],
            ":cod" => $_GET["cod"]
        );
    
        $resultado = $stmt->execute($dados);
        header("Location: index.php?msg=Edição concluída");
        
    } catch (Exception $e) {
        header("Location: index.php?msg=Falha ao editar");
    }
?>
