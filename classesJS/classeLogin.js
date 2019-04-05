function funcoesJsLogin(){ //criação de "classe" JavaScript. 

}

/*Resumo da função abaixo
    Função sendo chamada pelo index.html para verificar o usuário e a senha. Ela chama também a firstLogin
    caso a pessoa esteja fazendo seu primeiro login, será solicitado uma alteração de senha para uma 
    senha pessoal. Os parametros para o selectsLogin estão sendo enviados pela URL
*/
funcoesJsLogin.prototype.verificandoUsuarioSenha = function(userP,passP){ //criação de métodos para a classe.
    startAjax();

    var url = "./conexoesOracle/selects/selectsLogin.php?user=" +escape(userP)
                                                     +"&pass=" +escape(passP)
                                                     +"&funcao=selectVerificaUsuarioSenha";
    request.open("GET", url, true);
    request.onreadystatechange = verificandoUsuarioSenhaUpdate;
    request.send(null);	

    function verificandoUsuarioSenhaUpdate(){
        if(request.readyState === 4){ 
            var dadosConsulta = request.responseText;
            var objetoConsulta = JSON.parse(dadosConsulta);

            if(objetoConsulta === true){ //Objeto retorna true se usuário e senha estiverem corretos
                firstLogin(userP,passP);

            }else{
                alert("USUÁRIO OU SENHA INVALIDOS !!");
            }
        }
    }
}

funcoesJsLogin.prototype.alterandoNovaSenha = function(userP,passP_A,passP_N,passP_N1){
    //alert("Entrei função alterar senha");
    startAjax();

    var url = "./conexoesOracle/selects/selectsLogin.php?user=" +escape(userP)
                                                     +"&pass=" +escape(passP_A)
                                                     +"&funcao=selectVerificaUsuarioSenha";
    request.open("GET", url, true);
    request.onreadystatechange = verificandoUsuarioSenhaUpdate;
    request.send(null);	

    function verificandoUsuarioSenhaUpdate(){
        if(request.readyState === 4){ 
            var dadosConsulta = request.responseText;
            var objetoConsulta = JSON.parse(dadosConsulta);

            if(objetoConsulta === true){ //Objeto retorna true se usuário e senha estiverem corretos
                if(passP_N === "" || passP_N1 === ""){
                    alert("Nova senha não pode estar em branco");    
                }else if(passP_N != passP_N1){
                    alert("Novas senhas não conferem ");    
                }else{
                    updateNovaSenha(userP,passP_N);   
                }
            }else{
                alert("USUÁRIO OU SENHA INVALIDOS !!");    
            }
        }
    }
}


// ------------------------------------------------------FUNÇÕES LOCAIS -----------------------------------------
/*Resumo da função abaixo
    Função para inicar uma requisição AJAX
*/
function startAjax(){
    //inicio requisição AJAX
    request = null; //sem o var para ficar global
    
    try{ //function createRequest() sendo carregada junto com a pagina direto
        request = new XMLHttpRequest();
    } catch (trymicrosoft){
            try{
                    request = new ActiveXObject("Msxm12.XMLHTTP");
            } catch (othermicrosoft){
                    try{
                            request = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (failed){
                            request = null;
                    }
            }
    }

    if (request === null)
        alert("Error creating request object !");
    
    //fim requisição AJAX
}

/*Resumo da função abaixo
    Função para veriricar se a pessoa está acessando o sitema pela primeira vez e solicita alteração de senha
    caso seja a primeira vez, do contrário, já abre a paginaPrincipal.php
*/
function firstLogin(userP,passP){   
    startAjax();
    //alert("Entrei no FirstLogin");
    var url = "./conexoesOracle/selects/selectsLogin.php?user=" +escape(userP)
                                                     +"&pass=" +escape(passP)
                                                     +"&funcao=selectVerificaPrimeiroLogin";
    request.open("GET", url, true);
    request.onreadystatechange = verificandoPrimeiroLogin;
    request.send(null);	

    function verificandoPrimeiroLogin(){
        //alert("Entrei no Update do FirstLogin");
        if(request.readyState === 4){ 
            var dadosConsulta = request.responseText;
            var objetoConsulta = JSON.parse(dadosConsulta);
            //alert("Fisrt Login :"+objetoConsulta);

            if(objetoConsulta === true){
                alert("Este é seu primeiro acesso. Favor cadastre uma nova senha !!");
                window.location.replace("./paginaTrocaSenhaPLogin.html");
            }
            else
                window.location.replace("./paginaPrincipal.php"); //replace não mantem histórico no botão voltar
                //window.location.href = "./paginaPrincipal.php";
        }
    }
}
/*Resumo da função abaixo
    Função para fazer o update da senha provisória para a nova senha.
*/
function updateNovaSenha(userP,passP){
    startAjax();
    //alert("Entrei na funcao update");
    var url = "./conexoesOracle/updates/updatesLogin.php?user=" +escape(userP)
                                                     +"&pass=" +escape(passP)
                                                     +"&funcao=updateNovaSenha";
    request.open("GET", url, true);
    request.onreadystatechange = updateNovaSenhaAtualizando;
    request.send(null);	

    function updateNovaSenhaAtualizando(){
        //alert("Entrei na funcao ATUALIZA");
        if(request.readyState === 4){ 
            var dadosConsulta = request.responseText;
            var objetoConsulta = JSON.parse(dadosConsulta);

            if(objetoConsulta === true){
                alert("Senha alterada com sucesso !");
                window.location.replace("./paginaPrincipal.php");
            }
            else
                alert("ERRO AO ALTERAR A SENHA");
        }
    }
}

    
