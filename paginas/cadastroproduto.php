<link href="css/cadastroprodu.css" type="text/css" rel="stylesheet"></link>

<?php
if(isset($_SESSION['idusuarios'])){
if(!isset($_POST['editar'])){ //se não existir o post editar mostra o formalario normal de cadastro

?>


<div id="formulario">
<form method="post" id="form_2" enctype="multipart/form-data" action="" name="cadastro2"><br/>
		<label for="nome" class="titulo" >Titulo do anuncio</label>
		<input type="text" class="nome" name="nome" placeholder="Digite o nome do seu anuncio"/><br/>
		<label  for="idsubcategoria">Subcategoria:</label><br/>
		<select name="idsubcategoria"/><br/>
				<?php
		 
				$sql = "SELECT * FROM subcategoria";
				$sth = $banco->prepare($sql);
				$sth->execute();
				while($c = $sth->fetch(PDO::FETCH_OBJ)){
					echo '<option value="'.$c->idsubcategoria.'">'.$c->nome.'</option><br/>';
				}
			?>
		<label for="descricao">Descricao do produto</label><br/>
	<textarea class="descricao" name="descricao" placeholder="Troco por"></textarea><br/>
		<label for="imagem">Imagem</label><br/>
		<input type="file" name="imagem" id="imagem"/><br/> 
        <input type="submit" value="enviar" name="enviar" id="enviar"/>
		 <?php
		 
		 ?>
		 
		 	<?php
		}else{//se existir o post editar mostre o formulario com os dados do produto para edityar
		 
$sqledit="select * from produtos where idProdutos=? ";
	$seledit=$banco->prepare($sqledit);
	$seledit->execute(array($_POST['idproduto']));
	$dadosedit= $seledit->FETCH(PDO::FETCH_OBJ);		 

	?>		 
	<div id="formulario2"> 
<form method="post" id="form_2" enctype="multipart/form-data" action="" name="cadastro2"><br/>
		<label for="nome" class="titulo" >Titulo do anuncio</label>
		<input type="text" class="nome" name="nome" placeholder="Digite o nome do seu anuncio" value="<?php echo $dadosedit->nome ?>"/><br/>
		<input type="hidden" value="<?php echo $dadosedit->idProdutos ?>" name="idproduto"/>
		<label for="idsubcategoria">Subcategoria:</label><br/>
		<select name="idsubcategoria"/>
				<?php
		 
				$sql = "SELECT * FROM subcategoria";
				$sth = $banco->prepare($sql);
				$sth->execute();
				while($c = $sth->fetch(PDO::FETCH_OBJ)){
				if($c->idsubcategoria==$dadosedit->categorias_idCategorias)
					echo '<option selected="selected" value="'.$c->idsubcategoria.'">'.$c->nome.'</option>';
					else
					echo '<option value="'.$c->idsubcategoria.'">'.$c->nome.'</option>';
				}
			?>
		<label for="descricao">Descricao do produto</label><br/>
	<textarea class="descricao" name="descricao" /><?php echo $dadosedit->descricao ?></textarea><br/>
		<label for="imagem">Imagem</label><br/> 
		<input type="file" name="imagem" id="imagem"/><br/>   
         <input type="submit" value="editar" name="editarproduto" id="enviar" onclick="funcao2()"/>
		 
		 </div>
		</div>	
		<?php
		 }		
if(isset($_POST['enviar'])){
$sql='insert into produtos(nome,imagem,descricao,Usuarios_idUsuarios,subcategoria_idsubcategoria) values(?, ?, ?, ?, ?) ';
$sth = $banco->prepare($sql);
move_uploaded_file($_FILES['imagem']['tmp_name'],'imagens/'.$_FILES['imagem']['name']);
$sth->execute(array($_POST['nome'], $_FILES['imagem']['name'], $_POST['descricao'], $_SESSION['idusuarios'], $_POST['idsubcategoria'] ));


header('refresh:1, index.php?pg=conteudo');
		}
		
		}
		
		if(isset($_POST['editarproduto'])){
	$sql="update produtos set nome=? , imagem=? , descricao=?, subcategoria_idsubcategoria=?  where idProdutos=?";
	$up= $banco->prepare($sql);
	move_uploaded_file($_FILES['imagem']['tmp_name'],'imagens/'.$_FILES['imagem']['name']);
	$up->execute(array($_POST['nome'], $_FILES['imagem']['name'], $_POST['descricao'], $_POST['idsubcategoria'], $_POST['idproduto']));
	echo "<p>O produto foi atualizado!</p>";
	header('refresh:1, index.php?pg=conteudo');
}	
		
