
        function adicionarPerg(event){
           event.preventDefault();

           // objeto JavaScript que facilita a construção de um conjunto de pares chave-valor representando os campos de um formulário.
           let formData = new FormData();
            formData.append("numperg", document.getElementById("numperg").value);
            formData.append("pergunta", document.getElementById("pergunta").value);
            formData.append("respostaA", document.getElementById("respostaA").value);
            formData.append("respostaB", document.getElementById("respostaB").value);
            formData.append("respostaC", document.getElementById("respostaC").value);
            formData.append("respostaD", document.getElementById("respostaD").value);
            formData.append("respostaCorreta", document.getElementById("respostaCorreta").value);
            console.log(numperg, pergunta, respostaA, respostaB, respostaC, respostaD, respostaCorreta);

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
                } 
                else if (this.readyState < 4) {
                    console.log("Preparando a requisição...");
                } 
                else {
                    console.log("Requisição falhou: " + this.status);
                }
            };
            xmlhttp.open("POST", "https://localhost/daw/Crud-Json/adicionar.php", true);
            xmlhttp.send(formData); //enviando o formulario
        }
