<?php
session_start('trocaja');
require_once('database/conexao.php');

include('topo.php');





if(isset($_GET['pg']))
   $arquivo = $_GET['pg'].'.php';
else
   $arquivo='conteudo.php';


if(file_exists('paginas/'.$arquivo)){
include('paginas/'.$arquivo);
}else{
echo " arquivo invalido";
}
 
 
 
 
 //include('rodape.php');
 
 ?>