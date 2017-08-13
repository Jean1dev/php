 <div id="conteudo">


<?php
if(isset($_SESSION['idusuarios'])){
if(!isset($_POST['editar'])){ //se não existir o post editar mostra o formalario normal de cadastro

?>
	 
		 
 
<?php
		 }		
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

if(isset($_POST['editarproduto'])){
	$sql="update produtos set nome=? , imagem=? , descricao=?, categorias_idCategorias=?  where idProdutos=?";
	$up= $banco->prepare($sql);
	move_uploaded_file($_FILES['imagem']['tmp_name'],'imagens/'.$_FILES['imagem']['name']);
	$up->execute(array($_POST['nome'], $_FILES['imagem']['name'], $_POST['descricao'], $_POST['idCategorias'], $_POST['idproduto']));
	echo "A noticia foi atualizada!";
	header('refresh:3, index.php?pg=conteudo');
}	
	
	

if(isset($_POST['excluir'])){
$sql="delete from produtos where idProdutos=?";
$del= $banco->prepare($sql);
$del->execute(array($_POST['idproduto']));

echo 'A noticia foi deletada com sucesso';

//header('refresh:3, index.php');
}

if(!isset($_POST['editar'])){
	
		if(isset($_POST['pesquisa'])){
			$sql = 'select * from produtos where nome LIKE ?';
				$sel = $banco->prepare($sql);
			$sel->execute(array('%'.$_POST['buscar'].'%'));
			}else{

	
	$sql="select * from produtos order by idProdutos desc ";
	$sel=$banco->prepare($sql);
	$sel->execute(array());
	}
	
	
	if($sel->rowCount()<=0){
		echo '<h3 class="registro">Não foi encontrado registros</h3>';
	}else{
	while($dados=$sel->fetch(PDO::FETCH_OBJ)):
	echo'<div class="lista">';
	echo'<h2>'.$dados->nome.'</h2>';
	echo'<a  href="index.php?pg=produto&id='.$dados->idProdutos.'" ><img  src="imagens/'.$dados->imagem.'" alt="" title="'.$dados->descricao.'" width="200" height="150"/></a>';
	echo '<p> Troco por '.$dados->descricao.'</p>';
	
	
if(isset($_SESSION['idusuarios']) && $_SESSION['idusuarios']==$dados->Usuarios_idUsuarios){	

?>
<form name="deletar" action="" method="post">
	<input type="hidden" value="<?php echo $dados->idProdutos ?>" name="idproduto"/>
	<input type="submit" value="excluir" name="excluir"/>
</form>

<form name="editar" action="" method="post">
	<input type="hidden" value="<?php echo $dados->idProdutos ?>" name="idproduto"/>
	<input type="submit" value="editar" name="editar"/>
</form>

<?php

}
echo '</div>';
	endwhile;
}
}


?>

		</div>
		
	
	







