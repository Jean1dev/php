<link href="css/cadastro1.css" type="text/css" rel="stylesheet"></link>
<?php

if(isset($_POST['alterar'])){
	$sql="update usuarios set nome=? , email=? , endereco=?, telefone=? , login=? , senha=? , cidades_idcidades=? where idUsuarios=?";
	$up= $banco->prepare($sql);
	$up->execute(array($_POST['nome'], $_POST['email'], $_POST['endereco'], $_POST['telefone'], $_POST['login'], $_POST['senha'], $_POST['cidade'], $_SESSION['idusuarios']));
	
	header('refresh:2, index.php?pg=conteudo');


}

?> 
  
  
  
  
  
  
  

   <h3 id="faca">Altere seus dados aqui Aqui</h3>
  <form method="post" action="">
  </div>
  <div id="pessoais">
		<label for="nome">Nome:</label>
		<input name="nome" id="nome" type="text"/>
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
		<input type="submit" value="alterar" name="alterar" id="alterar" onclick="funcao2()"/>