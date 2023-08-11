<php>
<html>
<head>
  <style>
  input {background-color: powderblue;margin: 5px;}
  p    {color: red;}
  </style>
</head>
<body>
  CEP: <input type="text" name="cepBusca" id="cepBusca" value="12712090">
	<button  onclick="conectarApi( document.getElementById('cepBusca').value )">Clique para buscar o cep</button>
	<div id="Cep">    
	</div>
  <div id="Endereco">

  </div>

</body>
<script >



async function conectarApi(value) {
  //Buscando na api utilizando o valor de cep passado pelo usuário 
  const response = await fetch("https://viacep.com.br/ws/"+value+"/json/");
  //Guardado a resposta em um objeto json
  const cepJSON = await response.json();
  

  //Dados escolhidos para tratamento 
  var logradouro=cepJSON["logradouro"];
  var complemento=cepJSON["complemento"];
  var bairro=cepJSON['bairro'];
  var cidade=cepJSON['localidade'];
  var uf=cepJSON['uf'];
  var ibge=cepJSON['ibge'];
  var gia=cepJSON['gia'];
  var ddd=cepJSON['ddd'];
  var siafi=cepJSON['siafi'];


  //alert (cepJSON["logradouro"]);
  
  //Conversão de Json para string
  var cep = cepJSON;
  cep=JSON.stringify(cep);
  
  //Verificar se a api respondeu com a mensagem de erro 
  if (cep!='{"erro":true}'){
    //Colocando a informação no formato json convertido para string 
  	document.getElementById("Cep").innerHTML="<br>Formato JSON Convertido para string <br>";
  	document.getElementById("Cep").append(cep);
    

    //Tratamento das informações para serem vistas em inputs
    var endereco=' ';
    endereco+='<br><br> ENDERECO:    <input type="text" name="endereco" id="endereco" value="'+logradouro+'"> ';
    endereco+='<br> COMPLEMENTO:     <input type="text" name="complemento" id="complemento" value="'+complemento+'"> ';
    endereco+='<br> BAIRRO:          <input type="text" name="bairro" id="bairro" value="'+bairro+'"> ';
    endereco+='<br> CIDADE:          <input type="text" name="cidade" id="cidade" value="'+cidade+'"> ';
    endereco+='<br> UF:              <input type="text" name="uf" id="uf" value="'+uf+'"> ';
    endereco+='<br> IBGE:            <input type="text" name="ibge" id="ibge" value="'+ibge+'"> ';
    endereco+='<br> GIA:             <input type="text" name="gia" id="gia" value="'+gia+'"> ';
    endereco+='<br> DDD:             <input type="text" name="ddd" id="ddd" value="'+ddd+'"> ';
    endereco+='<br> SIAFI:           <input type="text" name="siafi" id="siafi" value="'+siafi+'"> ';
    document.getElementById("Endereco").innerHTML=endereco;
    
  }else{
    //Responder com mensagem na tela quando o cep não for encontrado 
    var mensagemCepNaoEncontrado="<p> Cep Não encontrado </p>";
  	document.getElementById("Cep").innerHTML=mensagemCepNaoEncontrado;
    document.getElementById("Endereco").innerHTML=endereco="";
  }
  
}



</script>

</html>
<php>