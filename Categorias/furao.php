<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<title>- Troca já -</title>
	<link href="estilolala.css" type="text/css" rel="stylesheet"></link>
  </head>
  <body>
  <div id="site">

	<div id="topo">
		<div id="logo_topo">
			<img src="Img/logoPrincipal.png"/>
		</div>
				<div id="form_busca">	
			<form method="post" action="" name="cadastro">
				<input type="text" name="busca" id="busca" placeholder="Digite sua busca"/>
				<input type="submit" value="" id="btn_busca" name="btn_busca"/>	
			</form>
		</div>



<div id="form_login">

<?php
if(isset($_POST['entrar'])){


$sql='select * From usuarios where login=? and senha=?';
$sth = $banco->prepare($sql);
$sth->execute(array($_POST['login'], $_POST['senha'], ));

if($sth->rowcount()>0){
$c = $sth->fetch(PDO::FETCH_OBJ);

$_SESSION['idusuarios']=$c->idUsuarios;
$_SESSION['nome']=$c->nome;
$_SESSION['email']=$c->email;

echo " Logado com sucesso";
}else 
echo "Seu email ou senha esta incorreto";
}

if(!isset($_SESSION['idusuarios'])){  
?>
			<form method="post" action="" name="cadastro">
				<label for="login">Login</label>
				<input type="text" name="login" id="login" placeholder="Digite seu Login"/><br/>
				<label for="senha">Senha</label>
				<input type="password" name="senha" id="senha" placeholder="Digite sua senha"/><br/>
				<input type="submit" name="entrar" value="Entrar" id="entrar"/><br/>
			</form><br/>
			<a href="cadastro.php" class="botao">Cadastrar</a>
			
			
		
<?php
}else{ // parte onde o usuario já esta logado

echo $_SESSION['nome'];
?>

<a href="sair.php">sair</a><br/>
<a href="perfil.php">Perfil</a><br/>

<?php
}
?>


	

		
	
		
		
		</div>
		</div>
<div id="menuinterativo">
		<ul>
		<li><a href="Categorias/eletro.php" class="menu_pri">Eletroeletronicos</a>
			<ul class="into">
			<li><a href="Categorias/tablet.php">Tablets</a></li>
			<li><a href="Categorias/dvd.php">Aparelhos de dvd</a></li>
			<li><a href="Categorias/cel.php">Celulares</a></li>
			</ul>
		</li>
							
		<li><a href="Categorias/domestico.php"  class="menu_pri">Eletrodomesticos</a>
			<ul class="into">
				<li><a href="Categorias/aspirador.php">Aspirador</a></li>
				<li><a href="Categorias/gelo.php">Geladeira</a></li>
				<li><a href="Categorias/tv.php">Televisores</a></li>
			</ul>
		</li>
		
		<li><a href="Categorias/info.php"  class="menu_pri">Informatica</a>
			<ul class="into">
				<li><a href="Categorias/pc.php">Computadores</a></li>
				<li><a href="Categorias/not.php">Notebooks</a></li>
				<li><a href="Categorias/utpc.php">Utencilios para computador</a></li>
				<li><a href="Categorias/modem.php">Modens</a></li>
			</ul>
		</li>
					
		<li><a href="Categorias/ferramenta.php"  class="menu_pri">Ferramentas</a>
			<ul class="into">
				<li><a href="Categorias/martelo.php">Martelos</a></li>
				<li><a href="Categorias/pa.php">Pás</a></li>
				<li><a href="Categorias/furao.php">Furadeiras</a></li>									
			</ul>
		</li>
		

	
		</ul>	
	</div>
	<?php
require_once('database/conexao.php');
?>    


<div id="conteudo">
<div id="menulateral">
<?php
if(isset($_SESSION['idusuarios'])){
?>
<form method="post" id="form_2" enctype="multipart/form-data" action="" name="cadastro2">
		<label for="nome" id="nome" >Titulo do anuncio</label>
		<input type="text" name="nome" placeholder="Digite o nome do seu anuncio"/><br/>
		<label for="idCategorias">Categoria:</label><br/>
		<select name="idCategorias"/>
				<?php
		 
				$sql = "SELECT * FROM categorias";
				$sth = $banco->prepare($sql);
				$sth->execute();
				while($c = $sth->fetch(PDO::FETCH_OBJ)){
					echo '<option value="'.$c->idCategorias.'">'.$c->nome.'</option>';
				}

			?>
		<label for="descricao">Descricao do produto</label>
	<textarea id="descricao" name="descricao"></textarea><br/>
		<label for="imagem">Imagem</label>
		<input type="file" name="imagem" id="imagem"/><br/>   
         <input type="submit" value="enviar" name="enviar" id="enviar"/>
		
		<div id="conteudo2"> 
		 
		 		<?php
		
if(isset($_POST['enviar'])){
$sql='insert into produtos(nome,imagem,descricao,Usuarios_idUsuarios,categorias_idCategorias) values(?, ?, ?, ?, ?) ';
$sth = $banco->prepare($sql);
move_uploaded_file($_FILES['imagem']['tmp_name'],'imagens/'.$_FILES['imagem']['name']);
$sth->execute(array($_POST['nome'], $_FILES['imagem']['name'], $_POST['descricao'], $_SESSION['idusuarios'], $_POST['idCategorias'] ));

echo 'anuncio publicado';
		}
		}
		?>
		<?php

if(isset($_POST['excluir'])){
$sql="delete from produtos where idProdutos=?";
$del= $banco->prepare($sql);
$del->execute(array($_POST['idproduto']));

echo 'A noticia foi deletada com sucesso';

//header('refresh:3, inicial.php');
}

		
	$sql="select * from produtos ";
	$sel=$banco->prepare($sql);
	$sel->execute(array());
	
	
	if($sel->rowCount()<=0){
		echo "Não foi encontrado registros";
	}else{
	while($dados=$sel->fetch(PDO::FETCH_OBJ)):
	
	echo'<h2>'.$dados->nome.'</h2>';
	echo'<a href ><img src="imagens/'.$dados->imagem.'" alt="" title="'.$dados->nome.'" width="200" height="150"/></a>';
	echo '<p>'.$dados->nome.'</p>';
	
	
if(isset($_SESSION['idusuarios'])){
?>
<form name="deletar" action="" method="post">
	<input type="hidden" value="<?php echo $dados->idProdutos ?>" name="idproduto"/>
	<input type="submit" value="excluir" name="excluir"/>
</form>
<?php
}
	endwhile;
	};	


?>
</div>
		</div>
	







<div id="rodape">

</div>
</body>
</html>