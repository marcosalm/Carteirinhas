<?php
	
	function logedin($user,$pass,$link){
	
	$query = "SELECT * FROM users WHERE username = '$user'";
	$result = $link->query($query);
	$info = $result->fetch_array();
	while($info ) { 
							//if the cookie has the wrong password, they are taken to the login page 
				if ($pass != $info['password']) { 	
				return false;					
					}
				else{ 
				return true;
					}
				}
	}
	function isAdmin($user){
	Global $connection;
	$query = "SELECT * FROM users WHERE username = '$user'";
	$result = $connection->query($query);
	$info = $result->fetch_array(MYSQLI_ASSOC);
	while($info ) { 
							//if the cookie has the wrong password, they are taken to the login page 
				if ($info['tipo']!="Administrador") { 	
				return false;					
					}
				else{ 
				return true;
					}
				}
	}
	function error_total($link){
	$query = "SELECT * FROM crt_erro_retorno WHERE cod_error <> 'C000'";
	$result = $link->query($query);
	$info = $result->num_rows;
		return $info;
	}
	
	function pronto_total($link){
	$query = "SELECT * FROM crt_status WHERE situacao_cart = 'OK'";
	$result = $link->query($query);
	$info = $result->num_rows;
		return $info;
	}
	
	function process_total($link){
	$query = "SELECT * FROM crt_status WHERE situacao_cart = 'PROCESS'";
	$result = $link->query($query);
	$info = $result->num_rows;
		return $info;
	}
	
	function next_total($link){
	$query = "SELECT * FROM crt_a_enviar";
	$result = $link->query($query);
	$info = $result->num_rows;
		return $info;
	}
	
	function get_option($name,$link){
	$query = "SELECT option_value FROM `crt_options` WHERE option_name='{$name}'";
	$result = $link->query($query);
	$info = $result->fetch_row();
	return $info[0];
		}
		
	function set_option($name,$value,$link){
	$query = "SELECT option_value FROM `crt_options` WHERE option_name='{$name}'";
	$result = $link->query($query);
	$info = $result->fetch_row();
	if ($info){
	$sql = "UPDATE `crt_options` SET option_value ='{$value}' WHERE option_name='{$name}'";
	$result = $link->query($sql);
	} else{
	$sql = "INSERT INTO `crt_options`(`option_name`, `option_value`) VALUES ('{$name}','{$value}')";
	$result = $link->query($sql);
	}
	}
	
	
	