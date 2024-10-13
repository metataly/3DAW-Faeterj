  function adicionarPerg(event){
           // event.preventDefault();
            //colocando os valores do form em variáveis;
            let numperg = document.getElementById("numperg").value;
            let pergunta = document.getElementById("pergunta").value;
            let respostaA = document.getElementById("respostaA").value;
            let respostaB = document.getElementById("respostaB").value;
            let respostaC = document.getElementById("respostaC").value;
            let respostaD = document.getElementById("respostaD").value;
            let respostaCorreta = document.getElementById("respostaCorreta").value;

            //requisição por XMLHttpRequest;
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {
                    let response = JSON.parse(this.responseText);
                    
                    if (response.status === "sucesso"){
                        document.getElementById("numperg").value = '';
                        document.getElementById("pergunta").value = '';
                        document.getElementById("respostaA").value = '';
                        document.getElementById("respostaB").value = '';
                        document.getElementById("respostaC").value = '';
                        document.getElementById("respostaD").value = '';
                        document.getElementById("respostaCorreta").value = '';
                        let msgElement = document.getElementById("msg");
                        msgElement.innerHTML = response.mensagem;
                        
                    }
                } else if (this.readyState < 4) {
                    console.log("Preparando a requisição...");
                } else {
                    console.log("Requisição falhou: " + this.status);
                }
            };
            xmlhttp.open("POST", "https://localhost/daw/Crud-Json/adicionar.php");
            xmlhttp.send("numperg=" + numperg + "&pergunta=" + encodeURIComponent(pergunta) + "&respostaA=" + encodeURIComponent(respostaA) + "&respostaB=" + encodeURIComponent(respostaB) + "&respostaC=" + encodeURIComponent(respostaC) + "&respostaD=" + encodeURIComponent(respostaD) + "&respostaCorreta=" + (respostaCorreta), true);
        }
