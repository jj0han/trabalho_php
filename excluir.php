<?php
    require_once "conectaBD.php";

    try {
        $sql = "DELETE FROM tb_conteudos WHERE codigo = :cod";
        $stmt = $pdo->prepare($sql);

        $dados = array(
            ':cod' => $_GET["cod"]
        );

        $resultado = $stmt->execute($dados);

        if($resultado) {
            header('Location: index.php?msg=Cadastro feito com sucesso!');
        }
    } catch(PDOException $e) {
        echo("Falha ao obter séries");
    }

?>