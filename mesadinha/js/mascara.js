function mascaratelefone (){
    var tel_formatado = document.getElementById("telefone").value
    if (tel_formatado[0]!="("){

        if (tel_formatado[0]!=undefined){
            document.getElementById("telefone").value="("+tel_formatado[0];
        }
    }

    if (tel_formatado[3]!=")"){
        if (tel_formatado[3]!=undefined){
            document.getElementById("telefone").value=tel_formatado.slice(0,3)+")"+tel_formatado[3]
        }
    }

    if (tel_formatado[9]!="-"){
        if (tel_formatado[9]!=undefined){
            document.getElementById("telefone").value=tel_formatado.slice(0,9)+"-"+tel_formatado[9]
        }
    }

}

function mascaracep () {
    var cep_formatado = document.getElementById("endereco").value
    if (cep_formatado[5]!="-"){

        if (cep_formatado[5]!=undefined){
            document.getElementById("endereco").value=cep_formatado.slice(0,5)+"-"+cep_formatado[5]
        }
    }

}

function mascaracpf () {
    var cpf_formatado = document.getElementById("cpf").value
    if (cpf_formatado[2]!="."){

        if (cpf_formatado[2]!=undefined){
            document.getElementById("cpf").value=cpf_formatado.slice(0,2)+"."+cpf_formatado[2]
        }
    }

    if (cpf_formatado[6]!="."){

        if (cpf_formatado[6]!=undefined){
            document.getElementById("cpf").value=cpf_formatado.slice(0,6)+"."+cpf_formatado[6]
        }
    }

    if (cpf_formatado[10]!="-"){

        if (cpf_formatado[10]!=undefined){
            document.getElementById("cpf").value=cpf_formatado.slice(0,10)+"-"+cpf_formatado[10]
        }
    }
}

function mascaradata () {
    var data_formatada = document.getElementById("data").value

    if (data_formatada[2] != "/") {
        if (data_formatada[2] != undefined) {
            document.getElementById("data").value = data_formatada.slice(0, 2) + "/" + data_formatada[2]
        }
    }

    if (data_formatada[5] != "/") {
        if (data_formatada[5] != undefined) {
            document.getElementById("data").value = data_formatada.slice(0, 5) + "/" + data_formatada[5]
        }

    }
}

function mascaravalor () {

    var valor_formatado = document.getElementById("valor").value

    if (valor_formatado[0]!="R"){

        if (valor_formatado[0]!=undefined){
            document.getElementById("valor").value= "R$" + valor_formatado[0]
        }
    }



}