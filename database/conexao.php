<?php

try{

$driver="mysql";
$dbname="mydb";
$host="localhost";
$user="root";
$password="";

$banco=new PDO($driver.':dbname='.$dbname.';host='.$host,$user,$password);
$banco->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOExeception $e){
echo "Não foi possivel conectar ao banco de dados</br>";
echo"Erro:".$e>getmessege();
die();
}
?>