<link href="css/produtos.css" type="text/css" rel="stylesheet"></link>
<?php

	$sql = "SELECT * FROM produtos where idProdutos=?";
				$sth = $banco->prepare($sql);
				$sth->execute(array($_GET['id']));
				while($c = $sth->fetch(PDO::FETCH_OBJ)):
			        echo '<div id="imga">';
					echo'<h2>'.$c->nome.'</h2>';
					echo'<img  src="imagens/'.$c->imagem.'" alt="" title="'.$c->descricao.'" width="500" height="400"/></a>';
				    echo '</div>';
					echo '<div id="descri">';
					echo	'<h2>Descricao do produto</h2>';
		            echo '</div>';
					echo '<p> Troco por '.$c->descricao.'</p>';
					
				  $usercodigo=$c->Usuarios_idUsuarios;
				endwhile;
	?>

	<?php
        echo '<div id="dados">';
		$sql = "SELECT * FROM usuarios where idUsuarios=?";
		$sth = $banco->prepare($sql);
		$sth->execute(array($usercodigo));
		while($c = $sth->fetch(PDO::FETCH_OBJ)):
			echo '<p> Nome: '.$c->nome.'</p>';
			echo '<p> Telefone: '.$c->telefone.'</p>';
			echo '<p> Endereco: '.$c->endereco.'</p>';
			echo '<p> Email: '.$c->email.'</p>';
			
			//$sql = "SELECT * FROM estados where estados_idestados=?";
			//$sth = $banco->prepare($sql);
			//$sth->execute(array($usercodigo));
			//while($c = $sth->fetch(PDO::FETCH_OBJ)):
			//echo '<p> Estado de: '.$c->nome.'</p>';
			//echo '</div>';
	    endwhile;
		
		

if(isset($_POST['avaliar'])){
$sql='insert into avaliacao(avalicao,Usuarios_idUsuarios) values(?, ?)';
$sth = $banco->prepare($sql);
$sth->execute(array($_POST['avaliacao'], $_POST['usuarios']));

echo 'Obrigado pela sua avaliçao';
header('refresh:3, index.php?pg=conteudo');

}

?> 
	
	<!--<label for="nota">Avalie este usuario:</label>
		<input type="submit" name="Positivo" value="positivo" id="positivo"/>
		<input type="submit" name="Negativo" value="negativo" id="negativo"/><br/>
		
		<!--
                     ANUNCIO
		echo '<a href="#" id="anu"><img src="Img/anuncio.png"/></a>'; -->