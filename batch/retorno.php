<?php
$handle = fopen("UNI_H0OQ_01_270314P_CON.txt", "r");
if ($handle) {
$a_line = array();
    while (($line = fgets($handle)) !== false) {
        // process the line read.
		array_push($a_line, $line);
			
    }
	$n_linhas = count($a_line);
	$header = $a_line[0];
	$trailler = end($a_line);
	$data_reg = substr($header, 24, -120);
	$n_seq = substr($header, 19, -128);
	$T_reg = substr($trailler, 1, -141);
	$V_reg = substr($trailler, 10, -132);
	$E_reg = substr($trailler, 20, -123);
	$dados = array();
	for ($i=1;$i<$n_linhas-1;$i++){
	$linha = $a_line[$i];
		$matricula = substr($linha, 2, -135);
	$cpf = substr($linha, 17, -124);
	$cod_barras = substr($linha, 29, -110);
	$tipo_vinculo = substr($linha, 42, -109);
	$cod_evento = substr($linha, 43, -108);
	$n_seq_remessa = substr($linha, 44, -102);
	$cod_error = substr($linha, 51, -3);
	array_push($dados, array('matricula'=>$matricula, 'cpf'=>$cpf, 'cod_barras'=>$cod_barras,'tipo_vinculo'=>$tipo_vinculo,'cod_evento'=>$cod_evento,'n_seq_remessa'=>$n_seq_remessa,'cod_error'=>$cod_error));
	}
	print_r($dados[0]);
	
	/* echo $T_reg;
	echo "<br><br>";
	echo $V_reg;
	echo "<br><br>";
	echo $E_reg; */
	
	echo "<br><br>";
	print_r($a_line[1]);
} else {
    // error opening the file.
} 
fclose($handle);

//H02706765100015500100016201403271414000008