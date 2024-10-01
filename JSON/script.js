function EnviarPergunta() {
    let numperg = document.getElementById("numperg").value;
    let pergunta = document.getElementById("pergunta").value;
    let respostaA = document.getElementById("respostaA").value;
    let respostaB = document.getElementById("respostaB").value;
    let respostaC = document.getElementById("respostaC").value;
    let respostaD = document.getElementById("respostaD").value;
    let respostaCorreta = document.getElementById("respostaCorreta").value;

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("msg").innerHTML = this.responseText;
        } else if (this.readyState < 4) {
            console.log("Preparando a requisição...");
        } else {
            console.log("Requisição falhou: " + this.status);
        }
    };

    xmlhttp.open("GET", "adicionar.php?numperg=" + numperg +
                  "&pergunta=" + encodeURIComponent(pergunta) +
                  "&respostaA=" + encodeURIComponent(respostaA) +
                  "&respostaB=" + encodeURIComponent(respostaB) +
                  "&respostaC=" + encodeURIComponent(respostaC) +
                  "&respostaD=" + encodeURIComponent(respostaD) +
                  "&respostaCorreta=" + respostaCorreta);
    xmlhttp.send();
}