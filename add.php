<?php 
include 'config.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$login = $_POST['login'];
$pass = $_POST['senha'];
$password = md5($pass);

$sql = "INSERT INTO `users`(`username`, `password`, `email`, `nome`, `tipo`) VALUES ('{$login}','{$password}','{$email}','{$nome}','geral')";
$result = $connection->query($sql);


 ?> 
