<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/index.css">|
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

        echo "<pre>";
        print_r($conteudos);
        echo "</pre>";
    ?>
</body>
</html>