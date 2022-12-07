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
        <h1>Trabalho Prático</h1>

        <button id="botaoRedirecionar" value="cadastrarSerie.php">Cadastrar</button>
    </header>
    <section class="conteudo_principal">
        <h2>Séries a toda hora</h2>
        <main>
            <?php
            //Faz conexão com o BD
            require_once("./conectaBD.php");

            //Operador ternário vai exibir a mensagem somente quando houver uma mensagem vinda pelo $_GET
            print_r(isset($_GET["msg"]) ? $_GET["msg"] : "");

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
            //print_r($conteudos);

            echo("<table>");
            echo("<tr><th>ID</th>");
            echo("<th>Título</th>");
            echo("<th>Categoria</th>");
            echo("<th>Data de Lançamento</th></tr>");
            for($i = 0; $i < sizeof($conteudos); $i++){                  
                echo("<tr><td>" . $conteudos[$i]["codigo"] . "</td>");
                echo("<td>" . $conteudos[$i]["titulo"] . "</td>");
                echo("<td>" . $conteudos[$i]["categoria"] . "</td>");
                echo("<td>" . $conteudos[$i]["data"] . "</td></tr>");
            }
            echo("</table>");
            ?>
        </main>
    </section>
    
    <!--https://prod.liveshare.vsengsaas.visualstudio.com/join?C8530B1514F39CA600A11EC6D23227AD5544-->
</body>
</html>