	<?php

if(isset($_GET['id'])){

	$sql="select p.* from produtos p where p.Usuarios_idUsuarios=? order by idProdutos desc";
	$sel=$banco->prepare($sql);
    $sel->execute(array($_GET['id']));
		
	if($sel->rowCount()<=0){
		echo "Esse usuario nao tem nenhuma produto cadastrado";
	}else{
	while($dados=$sel->fetch(PDO::FETCH_OBJ)):

	echo'<div class="lista">';
	echo'<h2>'.$dados->nome.'</h2>';
	echo'<a  href="index.php?pg=produto&id='.$dados->idProdutos.'" ><img  src="imagens/'.$dados->imagem.'" alt="" title="'.$dados->descricao.'" width="200" height="150"/></a>';
	echo '<p> Troco por '.$dados->descricao.'</p>';
	
	


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


echo '</div>';
	endwhile;
}

}

?>