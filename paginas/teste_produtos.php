<?php
$conn= mysql_connect('localhost','root','');
mysql_select_db('mydb',$conn);

$query ="SELECT * FROM `produtos` WHERE Usuarios_idUsuarios=1";

$result= mysql_query($query,$conn);

if($result)
{

while($row=mysql_fetch_assoc($result))
{
echo $row['nome'].'<img  src="../imagens/'.$row['imagem'].$row['descricao'];
	}
}
?>