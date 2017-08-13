<?php
if(isset($_POST['editar'])){
	$sql="update produtos set nome=? , imagem=? , descricao=? where id=?";
	$up= $banco->prepare($sql);
	$up->execute(array($_POST['nome'], $_POST['imagem'], $_POST['descricao'], $_GET['idProdutos']));
	echo "O produto foi atualizado!";
	header('refresh:3, index.php');
	}
	?>