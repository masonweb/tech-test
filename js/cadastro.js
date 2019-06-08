document.getElementById("cadastro_usuario").onsubmit = function(){

    var nome = document.getElementById("nome").value;
    var sobrenome = document.getElementById("sobrenome").value;
    var email = document.getElementById("email").value;
    var foto = document.getElementById("foto").value;

    if(nome.length < 1){
        alert('favor preencher o campo nome');
        return false;
    }

    if(sobrenome.length < 1){
        alert('favor preencher o campo sobrenome');
        return false;
    }

    if(email.indexOf("@") == -1 || email.indexOf(".") == -1){
        alert('favor preencher email corretamente');
        return false;
    }

    if(foto.length < 1){
        alert('favor adicionar uma foto para inserir usuarios');
        return false;
    }

}