<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/index.css">
    <script src="./redirecionar.js" defer></script>
</head>
<body>
    <h1>Vizualizar</h1>
    <?php
        require_once "conectaBD.php";
        
        $sql = "SELECT * FROM tb_conteudos WHERE codigo = :cod";

        try {
            $stmt = $pdo->prepare($sql);

            $dados = array(
                ':cod' => $_GET["cod"]
            );

            $resultado = $stmt->execute($dados);

            if($resultado) {
                $conteudos = $stmt->fetchAll();
            }
        } catch(PDOException $e) {
            echo("Falha ao obter séries");
        }

        // echo "<pre>";
        // print_r($conteudos);
        // echo "</pre>";
    ?>

    <div>
        <img class="imagem" src="<?php echo $conteudos[0]["URLimagem"] ?>" alt="">
    </div>

    <div>
        <p class='titulo'><?php echo $conteudos[0]["titulo"] ?></p>
        <p class='titulo'><?php echo $conteudos[0]["diretor"] ?></p>
        <p class='titulo'><?php echo $conteudos[0]["descricao"] ?></p>
        <p class='titulo'><?php echo $conteudos[0]["data"] ?></p>
        <p class='titulo'><?php echo $conteudos[0]["categoria"] ?></p>
    </div>
    <div>
        <button class='botaoFuncao' onclick="editar(<?php echo $_GET['cod'] ?>);">Editar</button>
        <button class='botaoFuncao' onclick="excluir(<?php echo $_GET['cod'] ?>);">Excluir</button>
        <button id="botaoRedirecionar" value="index.php">Voltar</button>
    </div>
    <script>
        function editar(cod) {
            window.location.href = `editar.php?cod=${cod}`
        }

        function excluir(cod) {
            const text = "Prosseguir com exclusão?"
            if(confirm(text) == true) {
                window.location.href = `excluir.php?cod=${cod}`
            }
        }
    </script>
</body>
</html>