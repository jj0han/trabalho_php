<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/index.css">
    <script src="./redirecionar.js" defer></script>
    <script src="./funcoes.js" defer></script>
</head>
<body>
    <header>
        <h1>SérieFlix</h1>
        <p>Conta: Admin</p>
        <form class="busca_container" action="busca.php" method="post">
            <input class="busca_input" name="nome" type="text">
            <button class="button_input" name="titulo" onclick="buscar();" type="submit">Buscar</button>
        </form>
        <button id="botaoRedirecionar" value="cadastrarSerie.php">Cadastrar</button>
    </header>
    <section class="conteudo_principal">
        <h2>As melhores séries</h2>
        <main>
            <?php
                try {
                    require_once('./conectaBD.php');
                    $sql = "SELECT * FROM tb_conteudos WHERE titulo LIKE '%" . $_POST["nome"] . "%' ORDER BY codigo DESC";
                    $stmt = $pdo->prepare($sql);
                    $resultado = $stmt->execute();
                    if($resultado) {
                        $conteudos = $stmt->fetchAll();
                    }
                    } catch(PDOException $e) {
                        echo("Falha ao obter séries");
                    }
            
                for($i = 0; $i < sizeof($conteudos); $i++){
                    echo("<div class='conteudo' class='container_conteudo'><img class='imagem' src='" . $conteudos[$i]["URLimagem"] . "' alt='' onclick='visualizar(" . $conteudos[$i]['codigo'] . ");'>");
                    echo("<p class='titulo'>" . $conteudos[$i]["titulo"] . "</p>");
                    echo("<p class='diretor'>" . $conteudos[$i]["diretor"] . "</p>");
                    echo("<button class='botaoFuncao' onclick='editar(" . $conteudos[$i]['codigo'] . ");'>Editar</button>");
                    echo("<button class='botaoFuncao' onclick='excluir(" . $conteudos[$i]['codigo'] . ");'>Excluir</button></div>");
                }
            ?>
        </main>
    </section>
    <script>
            function buscar(nome) {
                window.location.href = `busca.php?nome=${nome}`
            }

            function editar(cod) {
                window.location.href = `editar.php?cod=${cod}`
            }

            function visualizar(cod) {
                window.location.href = `visualizar.php?cod=${cod}`
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

