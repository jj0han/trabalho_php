<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalho prático</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/index.css">
    <script src="./redirecionar.js" defer></script>
</head>
<body>
    <header>
        <h1>SérieFlix</h1>
        <p>Conta: Admin</p>
        <button id="botaoRedirecionar" value="cadastrarSerie.php">Cadastrar</button>
    </header>
    <section class="conteudo_principal">
        <h2>As melhores séries</h2>
        <main>
            <?php
            //Faz conexão com o BD
            require_once('./conectaBD.php');
           
            //Operador ternário vai exibir a mensagem somente quando houver uma mensagem vinda pelo $_GET
            // print_r(isset($_GET["msg"]) ? $_GET["msg"] : "");

            //Consulta ao SQL
            $sql = "SELECT * FROM tb_conteudos";

            try {
                $stmt = $pdo->prepare($sql);
                $resultado = $stmt->execute();
                if($resultado) {
                    $conteudos = $stmt->fetchAll();
                }
            } catch(PDOException $e) {
                echo("Falha ao obter notícias");
            }
            
            for($i = 0; $i < sizeof($conteudos); $i++){
                echo("<div class='conteudo' value='visualizar.php' class='container_conteudo'><img class='imagem' src='" . $conteudos[$i]["URLimagem"] . "' alt=''>");
                echo("<p class='titulo'>" . $conteudos[$i]["titulo"] . "</p>");
                echo("<p class='diretor'>" . $conteudos[$i]["diretor"] . "</p></div>");
            }
            ?>
        </main>
    </section>
    
</body>
</html>