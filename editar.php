<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Série</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/index.css">
    <script src="./redirecionar.js" defer></script>
</head>
<body>
    <?php 
        require_once "conectaBD.php";

        try {
            $sql = "SELECT * FROM tb_conteudos WHERE codigo = :cod";

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
    ?>
    <div class="formulario_container">
        <form class="formulario" action="editarCadastro.php" method="post">
            <div>
                <div class="input">
                    <label for="titulo">Título</label>
                    <input value="<?php echo $conteudos[0]["titulo"] ;?>" type="text" name="titulo">
                </div>
                <div class="input">
                    <label for="descricao">Descrição</label>
                    <textarea name="descricao" id="descricao" cols="30" rows="10"><?php echo $conteudos[0]["descricao"] ;?></textarea>
                </div>
                <div class="input">
                    <label for="diretor">Diretor</label>
                    <input value="<?php echo $conteudos[0]["diretor"] ;?>" type="text" name="diretor">
                </div>
                <div class="input">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" id="">
                        <option value="" selected><?php echo $conteudos[0]["categoria"] ;?></option>
                        <option value="Ação">Ação</option>
                        <option value="Drama">Drama</option>
                        <option value="Ficção Científica">Ficção Científica</option>
                        <option value="Romance">Romance</option>
                        <option value="Suspense">Suspense</option>
                        <option value="Terror">Terror</option>
                    </select>
                </div>
                <div class="input">
                    <label for="data">Data</label>
                    <input value="<?php echo $conteudos[0]["data"] ;?>" type="date" name="data">
                </div>
                <div class="input">
                    <label for="URLimagem">URL da Imagem</label>
                    <input value="<?php echo $conteudos[0]["URLimagem"] ;?>" type="text" name="URLimagem">
                </div>
            </div>
            <button id="botaoCadastrar" type="submit">Cadastrar</button>
        </form>
        <button id="botaoRedirecionar" value="index.php">Voltar</button>
    </div>

</body>
</html>