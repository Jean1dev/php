<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<title>- Troca já - <?php echo ucfirst($_GET['pg']);?></title>
	<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
	<link href="css/estilo1.css" type="text/css" rel="stylesheet"></link>
		<!--<link href="css/.css" type="text/css" rel="stylesheet"></link> -->
<script>
		function funcao1(){
		
alert("Voce  tem certeza que deseja excluir");
}
        function funcao2(){
		
alert("Cadastrado com sucesso");
}
</script>




  </head>
 <body>
  <div id="site">

	<div id="topo">
		<div id="logo_topo">
			<a href="index.php?pg=conteudo"><img src="Img/logoPP.png"/></a>
		</div>

		<div id="form_busca">	
			<form method="post" action="index.php?pg=buscar" name="buscar">
				<input class="barra" type="text" name="buscar" id="buscar" placeholder="Digite sua busca"/>
				<input type="submit" name="pesquisa" value="Buscar" id="pesquisa1"/>
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
header("location:index.php?pg=conteudo"); 
echo " Logado com sucesso";
}else 
echo "Seu email ou senha esta incorreto";
}


		if(!isset($_SESSION['idusuarios'])){  
?>

		  
 

 
<a href="index.php?pg=entrar">Entrar</a>
			
			<a href="index.php?pg=cadastro" >Cadastrar</a>
			 
			
			
		
<?php
}else{ // parte onde o usuario já esta logado

echo 'Bem vindo '. $_SESSION['nome'];

?>

<a href="index.php?pg=sair">Sair</a>
<a  href="index.php?pg=alterar">Alterar dados</a>
<a href="index.php?pg=cadastroproduto">Anuncie já</a>
<?php

    $sql="select * from usuarios ";
	$sel=$banco->prepare($sql);
	$sel->execute(array());
	
	
	?>
<?php
$x=$_SESSION['idusuarios'];

echo '<a href="index.php?pg=meusanuncios&id='.$x.'">Meus anuncios</a>';
?>
<?php
}
?>


	

		
	
		
		
		</div>
		
		
		</div>
<div id="menuinterativo">
		<ul>
		<?php
				$sql = "SELECT * FROM categorias limit 10";
				$sth = $banco->prepare($sql);
				$sth->execute();
		while($dadoscat = $sth->fetch(PDO::FETCH_OBJ)):
		?>

		
		
		<li><a href="index.php?pg=produtos&cat=<?php echo $dadoscat->idCategorias; ?>" class="menu_pri"><?php echo $dadoscat->nome; ?></a>
			<ul class="into">
					<?php
				$sql = "SELECT * FROM subcategoria where categorias_idCategorias=?";
				$sth2 = $banco->prepare($sql);
				$sth2->execute(array($dadoscat->idCategorias));
				while($dadossub = $sth2->fetch(PDO::FETCH_OBJ)):
		?>
			<li><a href="index.php?pg=produtos&sub=<?php echo $dadossub->idsubcategoria; ?>"><?php echo $dadossub->nome; ?></a></li>
		<?php
				endwhile;
		?>
			</ul>
		</li>
		
		<?php
		endwhile;
		?>
							
		<!--<li><a href="index.php?pg=conteudo"  class="menu_pri">Eletrodomesticos</a>
			<ul class="into">
				<li><a href="index.php?pg=conteudo">Aspirador</a></li>
				<li><a href="index.php?pg=conteudo">Geladeira</a></li>
				<li><a href="index.php?pg=conteudo">Televisores</a></li>
			</ul>
		</li>
		
		<li><a href="index.php?pg=conteudo"  class="menu_pri">Informatica</a>
			<ul class="into">
				<li><a href="index.php?pg=conteudo">Computadores</a></li>
				<li><a href="index.php?pg=conteudo">Notebooks</a></li>
				<li><a href="index.php?pg=conteudo">Utencilios para computador</a></li>
				<li><a href="index.php?pg=conteudo">Modens</a></li>
			</ul>
		</li>
					
		<li><a href="index.php?pg=conteudo"  class="menu_pri">Ferramentas</a>
			<ul class="into">
				<li><a href="index.php?pg=conteudo">Martelos</a></li>
				<li><a href="index.php?pg=conteudo">Pás</a></li>
				<li><a href="index.php?pg=conteudo">Furadeiras</a></li>									
			</ul>
		</li>
		
-->
	
		</ul>	
	</div>
	
	
</body>
</html>
		