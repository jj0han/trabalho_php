//Seleciona o botão que contém o ID "botaoRedirecionar"
const botao = document.querySelector("#botaoRedirecionar")

// Redireciona a página para o arquivo, de acordo com o atributo "valor" do botão
botao.addEventListener("click", () => {
    window.location.href = botao.getAttribute("value")
})

const conteudos = document.querySelectorAll(".conteudo")
conteudos.forEach(conteudo => {
    conteudo.addEventListener("click", () => {
        window.location.href = "visualizar.php"
    })
})