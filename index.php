<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>API Via Cep</title>
</head>
<body>


<div class="container">
<div class="jumbotron">
  <h1 class="display-4">PROJETO VIA CEP</h1>
  <p class="lead">Este projeto consome a API da Via Cep - busca o serviço a partir do CEP.</p>
  <hr class="my-4">
  <p>Use com parcimônia e implemente nos seus projetos!!</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Informações</a>
  </p>
</div>
<form>

<table class="table table-striped">
    <tr>
      <td>
        <label for="cep">CEP</label>
      </td>
      <td>
        <input type="text" maxlength="9" name="cep"
           id="cep" placeholder="Digite seu CEP"
           size="20" required />
       
        <button class="busca_cep" id="busca_cep" >Pesquisar</button>
       </td>
     </tr>
     <tr>
       <td colspan="2">
         <br>
         <span>Retorno CEP</span>
         <hr style="width:100%;"></hr>
         <br>
       </td>
     </tr>
     <tr>
       <td>
         <label for="logradouro">Logradouro</label>
       </td>
       <td>
         <input name="logradouro" type="text" id="logradouro"
            value="" size="45" />
       </td>
     </tr>
     <tr>
       <td>
         <label for="bairro">Bairro</label>
       </td>
       <td>
         <input name="bairro" type="text" id="bairro"
           value="" size="45" />
       </td>
     </tr>
     <tr>
       <td>
         <label for="cidade">Cidade</label>
       </td>
       <td>
         <input name="cidade" type="text" id="cidade"
            value="" size="45" />
       </td>
     </tr>
     <tr>
       <td>
         <label for="ibge">UF</label>
       </td>
       <td>
            <input name="uf" type="text" id="uf"
             value="" size="3" />
        </td>
     </tr>
    </table>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
		<script>
			/*
			 * Para efeito de demonstração, o JavaScript foi
			 * incorporado no arquivo HTML.
			 * O ideal é que você faça em um arquivo ".js" separado. Para mais informações
			 * visite o endereço https://developer.yahoo.com/performance/rules.html#external
			 */
			
			// Registra o evento blur do campo "cep", ou seja, a pesquisa será feita
			// quando o usuário sair do campo "cep"
			$("#cep").blur(function(){
				// Remove tudo o que não é número para fazer a pesquisa
				var cep = this.value.replace(/[^0-9]/, "");
				
				// Validação do CEP; caso o CEP não possua 8 números, então cancela
				// a consulta
				if(cep.length != 8){
					return false;
				}
				
				// A url de pesquisa consiste no endereço do webservice + o cep que
				// o usuário informou + o tipo de retorno desejado (entre "json",
				// "jsonp", "xml", "piped" ou "querty")
				var url = "https://viacep.com.br/ws/"+cep+"/json/";
				
				// Faz a pesquisa do CEP, tratando o retorno com try/catch para que
				// caso ocorra algum erro (o cep pode não existir, por exemplo) a
				// usabilidade não seja afetada, assim o usuário pode continuar//
				// preenchendo os campos normalmente
				$.getJSON(url, function(dadosRetorno){
					try{
						// Preenche os campos de acordo com o retorno da pesquisa
						$("#logradouro").val(dadosRetorno.logradouro);
						$("#bairro").val(dadosRetorno.bairro);
						$("#cidade").val(dadosRetorno.localidade);
						$("#uf").val(dadosRetorno.uf);

					}catch(ex){}
				});
			});
		</script>
</body>
</html>