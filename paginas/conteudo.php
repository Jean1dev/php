 <div id="conteudo">

 
<?php
//if(isset($_SESSION['idusuarios']) && ($_SESSION['idusuarios']==7)){	

//?>
<!--<form name="deletar" action="" method="post">
	<input type="hidden" value="<?php echo $dados->idProdutos ?>" name="idproduto"/>
	<input type="submit" value="excluir" name="excluir" onclick="funcao1()"/>
</form>-->


<?php
//}//echo '<script>'
	//	function funcao1(){
		//var excluir = confirm('Voce  tem certeza que deseja excluir');
    //if (excluir){}


if(isset($_POST['excluir'])){
$sql='delete from produtos where idProdutos=?';
$del= $banco->prepare($sql);
$del->execute(array($_POST['idproduto']));
}

//echo '</script>';
//header('refresh:3, index.php');


//se nao existir o post editar mostra os produtos//
if(!isset($_POST['editar'])){
		
	$sql="select * from produtos order by idProdutos desc";
	$sel=$banco->prepare($sql);
	$sel->execute(array());
	
	
	if($sel->rowCount()<=0){
		echo "Não foi encontrado registros";
	}else{
	while($dados=$sel->fetch(PDO::FETCH_OBJ)):
	echo'<div class="lista">';
	echo'<h2>'.$dados->nome.'</h2>';
	echo'<a  href="index.php?pg=produto&id='.$dados->idProdutos.'" ><img  src="imagens/'.$dados->imagem.'" alt="" title="'.$dados->descricao.'" width="200" height="150"/></a>';
	echo '<p> Troco por '.$dados->descricao.'</p>';
    
	
	
if(isset($_SESSION['idusuarios']) && $_SESSION['idusuarios']==$dados->Usuarios_idUsuarios || isset($_SESSION['idusuarios'])  && $_SESSION['idusuarios']==7){	

?>
<form name="deletar" action="" method="post">
	<input type="hidden" value="<?php echo $dados->idProdutos ?>" name="idproduto"/>
	<input type="submit" value="excluir" name="excluir" onclick="funcao1()"/>
</form>


<?php
/*
$sql="select * from produtos ";
	$sel=$banco->prepare($sql);
	$sel->execute(array());
	
	if($sel->rowCount()<=0){
		echo "Não foi encontrado registros";
	}else{
	  while($dados=$sel->fetch(PDO::FETCH_OBJ)):
	   //echo'<a href="index.php?pg=cadastroproduto&id='.$dados->idProdutos.'"/a>';
	   //var_dump($dados);
	endwhile;
	echo'<a href="index.php?pg=cadastroproduto&id='.$dados->idProdutos.'">a</a>';
	

}

*/

?>
<form name="editar" action="index.php?pg=cadastroproduto" method="post">
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
		

		
	
	







