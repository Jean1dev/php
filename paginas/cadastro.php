
  
  
<link href="css/cadastro.css" type="text/css" rel="stylesheet"></link>
  
  
  
<?php

if(isset($_POST['cadastrar'])){
$sql='insert into usuarios(nome,email,endereco,telefone,login,senha,cidades_idcidades) values(?, ?, ?, ?, ?, ?, ?) ';
$sth = $banco->prepare($sql);
$sth->execute(array($_POST['nome'], $_POST['email'], $_POST['endereco'], $_POST['telefone'], $_POST['login'], $_POST['senha'], $_POST['cidade']));


header('refresh:1, index.php?pg=conteudo');

}

?> 
  
  
  
  
  
  
  
  </div>
  
  <div id="dados">
  
    <h3 id="faca">Faça Seu Cadastro Aqui</h3>
  <form method="post" action="">
  
		<label for="nome">Nome:</label>
		<input name="nome" id="nome" type="text"/>
</div>
		
		<div id="pessoais">
		<label for="telefone">telefone:</label>
		<input name="telefone" id="telefone" type="text"/>
		<label for="endereco">Endereço:</label>
		<input  name="endereco" id="endereco" type="text"/>
				<label for="estado">Estado:</label><br/>
		<select name="estado"/>
				<?php
		  require_once('database/conexao.php');
				$sql = "SELECT * FROM estados";
				$sth = $banco->prepare($sql);
				$sth->execute();
				while($c = $sth->fetch(PDO::FETCH_OBJ)){
					echo '<option value="'.$c->idestados.'">'.$c->nome.'</option>';
				}

			?>
		
		</select>
		
		<label for="cidade">Cidade:</label><br/>
		<select name="cidade"/>
				<?php
		  require_once('database/conexao.php');
				$sql = "SELECT * FROM cidades";
				$sth = $banco->prepare($sql);
				$sth->execute();
				while($c = $sth->fetch(PDO::FETCH_OBJ)){
					echo '<option value="'.$c->idcidades.'">'.$c->nome.'</option>';
				}

			?>
		
		</select>
		<br/>	
			
			<label for="email">Email:</label>
		<input name="email" id="email" type="text"/>
	   
	   <label for="login">Login:</label>
		<input type="text" name="login" id="login1"/>
		<label for="senha">Senha:</label>
		<input type="password" name="senha" id="senha1"/>
		<input type="submit" value="cadastrar" name="cadastrar" id="cadastrar" onclick="funcao2()"/>
	
	                                 
			
			
		

			
	<!--

		<select name="estados"/>
		<option value="1"selected="selected">Selecione o seu estado</option>
	<option value="2" >Acre</option>
	<option value="3">Alagoas</option>
 <option value="4">Amazonas</option>
 <option value="5">Amapá</option>
 <option value="6">Bahia</option>
 <option value="7" >Ceará</option>
	<option value="8">Distrito Federal</option>
 <option value="9">Amazonas</option>
 <option value="10">Espirito Do Santo</option>
 <option value="11">Goiás</option>
 <option value="12" >Maranhão</option>
	<option value="13">Mato Grosso</option>
 <option value="14">Mato Grosso do Sul</option>
 <option value="15">Pará</option>
 <option value="16">Paraná</option>
 <option value="17" >Paraíba</option>
	<option value="18">Pernanbuco</option>
 <option value="19">Piauí</option>
 <option value="20">Rio de Janeiro</option>
 <option value="21">Rio Grande do Norte</option>
 <option value="22" >Rio Grande do Sul</option>
	<option value="23">Rondonia</option>
 <option value="24">Roraíma</option>
 <option value="25">Santa Catarina</option>
 <option value="26">Sergipe</option>
 <option value="27">São Paulo</option>
 <option value="28">Tocantins</option>
 </select><br/>
 -->
 


 
		 
 </div>
 
 </div>
 

 </body>
 </html>