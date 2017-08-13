<?php
session_start('trocaja');
unset($_SESSION['idusuarios']);
unset($_SESSION['nome']);
unset($_SESSION['email']);
header('Location:index.php?pg=conteudo');
?>