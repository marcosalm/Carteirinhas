<?php
include "config.php";

$matricula = isset($_POST['matricula'])? $_POST['matricula'] : false;

if($matricula){
$query = "SELECT * FROM crt_status WHERE matricula = $matricula";
			$result = $connection->query($query);
			
	if ($res = $result->fetch_array()){
		$via = (int)$res['versao_via'] + 1;
		$sql = "UPDATE crt_status SET situacao_cart = 'A_ENVIAR',versao_via = $via WHERE matricula = $matricula";
		$result = $connection->query($sql);
		if($result){
			echo '<script type="text/javascript">window.location = "http://intranet/carteirinhas/"</script>';
		}

	}	

}




