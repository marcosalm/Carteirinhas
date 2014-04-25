<?php


$file = fopen('db_funcionario.csv','r');
$saida = fopen('remessa_funcionario.txt','w');
$x=0;
function tiraAcento( $str ) {
return strtr(utf8_decode($str),utf8_decode('ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ'),'SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy');
}
function incluso($mat){
 $file_sem = fopen('db_incluir.csv','r');
 $isth = false;
 while (($line_in = fgetcsv($file_sem)) !== FALSE) {
 $comp = explode (';',$line_in[0]);
	
	if($mat===$comp[0]){
	$isth = true;
	}
}
return $isth;

fclose($file_sem);

}

while (($line = fgetcsv($file)) !== FALSE) {
  //$line is an array of the csv elements
  
  

  $uni = tiraAcento($line[0]);
  $x++;
  $output = explode (';',$uni);
  $n_abre= explode(' ',$output[4]);
  $n_sobre = count($n_abre);
  if ($n_sobre==3){
  $n_abre[1]= $n_abre[1][0];
  } elseif ($n_sobre==4){
   $n_abre[1]= $n_abre[1][0];
    $n_abre[2]= $n_abre[2][0];
	} elseif ($n_sobre==5){
	$n_abre[1]= $n_abre[1][0];
   $n_abre[2]= $n_abre[2][0];
    $n_abre[3]= $n_abre[3][0];
	
	} elseif ($n_sobre==6){
	$n_abre[1]= $n_abre[1][0];
   $n_abre[2]= $n_abre[2][0];
    $n_abre[3]= $n_abre[3][0];
	$n_abre[4]= $n_abre[4][0];
	
	}
  
  $abreviado =implode(' ',$n_abre);
 
  if (incluso($output[29])== true) {

	$nome = (strlen($output[4])< 26) ? strtoupper($output[4]) : strtoupper($abreviado);
  
	$info1 = strtoupper($output[0].$output[1].$output[2].$output[3].$nome);
	
	$cpf=strlen($output[5]);
	$info3 = ($cpf< 11) ? "0".$output[5] : $output[5] ;
	
	$info4=strtoupper($output[6]);
	$info5= $output[7];
	$info6=strtoupper($output[8]);
//
	$info7=  $output[9];

	$info8=strtoupper($output[10]);
	$info9=strtoupper($output[11]);
	
	$info10=strtoupper($output[12]);
	$info11=strtoupper($output[13]);
	$info12=strtoupper($output[14]);
	$info13=strtoupper($output[15]);
	$info14=strtoupper($output[16]);
	$info15=strtoupper($output[17]);
	$info16=strtoupper($output[18]);
	$info17= $output[19];
	$info18= $output[20];
	$info19=strtoupper($output[21]);
	$info20=strtoupper($output[22]);
	$info21=strtoupper($output[23]);
	$info22=strtoupper($output[24]);
	$info23=strtoupper($output[25]);
	$info24=strtoupper($output[26]);
	$info25=strtoupper($output[27]);
	$info26=strtoupper($output[28]);
	$info27=strtoupper($output[29]);
	$info28=strtoupper($output[30]);
	$info29=strtoupper($output[31]);
	$info30='';//strtoupper($output[32]);
	$info31='';
	/*$info32=$output[34];
	$info33=$output[35];
	$info34=$output[36];
	$info35=$output[37];
	$info36=$output[38];
	$info37=$output[39];
	$info38=$output[40];
	$info39=$output[41];
		*/
	//print_r($output);
	
	$group_size=strlen($info1);
	//print_r($group_size);echo '<br />';
	for($i=$group_size;$i<54;$i++){
		$info1.=" ";
	}
	
	$group_size=strlen($info1.$info3.$info4.$info5.$info6);
	//print_r($group_size);echo '<br />';
	$space = '';
	for($i=$group_size;$i<79;$i++){
		$space.="0";
	}
	$info5 =$space.$info5;
	
	$group_size=strlen($info1.$info3.$info4.$info5.$info6.$info7);
	//print_r($group_size);echo '<br />';
	$space = '';
	for($i=$group_size;$i<87;$i++){
		$space.="0";
	}
	$info7 = $space.$info7;

	$group_size=strlen($info1.$info3.$info4.$info5.$info6.$info7.$info8);
	//print_r($group_size);echo '<br />';
	for($i=$group_size;$i<93;$i++){
		$info8.=" ";
	}

	$group_size=strlen($info1.$info3.$info4.$info5.$info6.$info7.$info8.$info9.$info10.$info11.$info12.$info13.$info14.$info15);
	//print_r($group_size);echo '<br />';
	$space='';
	for($i=$group_size;$i<111;$i++){
		$space.="0";
	}
	$info15=$space.$info15;
	
	$group_size=strlen($info1.$info3.$info4.$info5.$info6.$info7.$info8.$info9.$info10.$info11.$info12.$info13.$info14.$info15.$info16);
	//print_r($group_size);echo '<br />';
	$space='';
	for($i=$group_size;$i<119;$i++){
		$space.="0";
	}
	$info16=$space.$info16;
	
	$group_size=strlen($info1.$info3.$info4.$info5.$info6.$info7.$info8.$info9.$info10.$info11.$info12.$info13.$info14.$info15.$info16.$info17);
	//print_r($group_size);echo '<br />';
	$space='';
	for($i=$group_size;$i<124;$i++){
		$space.="0";
	}
	$info17=$space.$info17;
	
	$group_size=strlen($info1.$info3.$info4.$info5.$info6.$info7.$info8.$info9.$info10.$info11.$info12.$info13.$info14.$info15.$info16.$info17.$info18);
	//print_r($group_size);echo '<br />';
	$space='';
	for($i=$group_size;$i<139;$i++){
		$space.="0";
	}
	$info18=$space.$info18;
	
	$group_size=strlen($info1.$info3.$info4.$info5.$info6.$info7.$info8.$info9.$info10.$info11.$info12.$info13.$info14.$info15.$info16.$info17.$info18.$info19);
	//print_r($group_size);echo '<br />';
	for($i=$group_size;$i<169;$i++){
		$info19.=" ";
	}
	$group_size=strlen($info1.$info3.$info4.$info5.$info6.$info7.$info8.$info9.$info10.$info11.$info12.$info13.$info14.$info15.$info16.$info17.$info18.$info19.$info20);
	//print_r($group_size);echo '<br />';
	for($i=$group_size;$i<219;$i++){
		$info20.=" ";
	}
	$group_size=strlen($info1.$info3.$info4.$info5.$info6.$info7.$info8.$info9.$info10.$info11.$info12.$info13.$info14.$info15.$info16.$info17.$info18.$info19.$info20.$info21);
	//print_r($group_size);echo '<br />';
	$space='';
	for($i=$group_size;$i<225;$i++){
		$space.="0";
	}
	$info21=$space.$info21;
	
	$group_size=strlen($info1.$info3.$info4.$info5.$info6.$info7.$info8.$info9.$info10.$info11.$info12.$info13.$info14.$info15.$info16.$info17.$info18.$info19.$info20.$info21);
		for($i=$group_size;$i<240;$i++){
		$info21.=" ";
	}
	
	$group_size=strlen($info1.$info3.$info4.$info5.$info6.$info7.$info8.$info9.$info10.$info11.$info12.$info13.$info14.$info15.$info16.$info17.$info18.$info19.$info20.$info21.$info22);
	//print_r($group_size);echo '<br />';
	$bairro=strlen($info22);
	if ($bairro>30){
	$x=explode(" ",$info22);
     $x[0] = $x[0][0];
		$info22 = implode(' ',$x);
	}
	for($i=$group_size;$i<270;$i++){
		$info22.=" ";
	}
		$group_size=strlen($info1.$info3.$info4.$info5.$info6.$info7.$info8.$info9.$info10.$info11.$info12.$info13.$info14.$info15.$info16.$info17.$info18.$info19.$info20.$info21.$info22.$info23);
	//print_r($group_size);echo '<br />';
	for($i=$group_size;$i<300;$i++){
		$info23.=" ";
	}
	$group_size=strlen($info1.$info3.$info4.$info5.$info6.$info7.$info8.$info9.$info10.$info11.$info12.$info13.$info14.$info15.$info16.$info17.$info18.$info19.$info20.$info21.$info22.$info23.$info24.$info25.$info26);
	//print_r($group_size);echo '<br />';
	for($i=$group_size;$i<330;$i++){
		$info26.=" ";
	}
	$group_size=strlen($info1.$info3.$info4.$info5.$info6.$info7.$info8.$info9.$info10.$info11.$info12.$info13.$info14.$info15.$info16.$info17.$info18.$info19.$info20.$info21.$info22.$info23.$info24.$info25.$info26.$info27);
	//print_r($group_size);echo '<br />';
	$space='';
	for($i=$group_size;$i<345;$i++){
		$space.="0";
	}
	$info27=$space.$info27;
	
	$group_size=strlen($info1.$info3.$info4.$info5.$info6.$info7.$info8.$info9.$info10.$info11.$info12.$info13.$info14.$info15.$info16.$info17.$info18.$info19.$info20.$info21.$info22.$info23.$info24.$info25.$info26.$info27.$info28);
	//print_r($group_size);echo '<br />';
	$space='';
	for($i=$group_size;$i<359;$i++){
		$space.="0";
	}
	$info28=$space.$info28;
	$group_size=strlen($info28);
	$spac1="";
	for($i=$group_size;$i<14;$i++){
		$spac1.="0";
	}
	$group_size=strlen($info27);
	$spac2="";
	for($i=$group_size;$i<15;$i++){
		$spac2.="0";
	}
	$infoCHIP = '027067651000155001'.$info28.$spac1.$info27.$spac2.$nome;
	
	$group_size=strlen($info1.$info3.$info4.$info5.$info6.$info7.$info8.$info9.$info10.$info11.$info12.$info13.$info14.$info15.$info16.$info17.$info18.$info19.$info20.$info21.$info22.$info23.$info24.$info25.$info26.$info27.$info28.$infoCHIP);
	//print_r($group_size);echo '<br />';
	for($i=$group_size;$i<871;$i++){
		$infoCHIP.=" ";
	}
	
	$group_size=strlen($info1.$info3.$info4.$info5.$info6.$info7.$info8.$info9.$info10.$info11.$info12.$info13.$info14.$info15.$info16.$info17.$info18.$info19.$info20.$info21.$info22.$info23.$info24.$info25.$info26.$info27.$info28.$infoCHIP.$info29);
	//print_r($group_size);echo '<br />';
	for($i=$group_size;$i<923;$i++){
		$info29.=" ";
	}
	
	$group_size=strlen($info1.$info3.$info4.$info5.$info6.$info7.$info8.$info9.$info10.$info11.$info12.$info13.$info14.$info15.$info16.$info17.$info18.$info19.$info20.$info21.$info22.$info23.$info24.$info25.$info26.$info27.$info28.$infoCHIP.$info29);
	//print_r($group_size);echo '<br />';
	for($i=$group_size;$i<931;$i++){
		$info29.="0";
	}
	$group_size=strlen($info1.$info3.$info4.$info5.$info6.$info7.$info8.$info9.$info10.$info11.$info12.$info13.$info14.$info15.$info16.$info17.$info18.$info19.$info20.$info21.$info22.$info23.$info24.$info25.$info26.$info27.$info28.$infoCHIP.$info29.$info30);
	//print_r($group_size);echo '<br />';
	for($i=$group_size;$i<986;$i++){
		$info30.=" ";
	}
	
	$group_size=strlen($info1.$info3.$info4.$info5.$info6.$info7.$info8.$info9.$info10.$info11.$info12.$info13.$info14.$info15.$info16.$info17.$info18.$info19.$info20.$info21.$info22.$info23.$info24.$info25.$info26.$info27.$info28.$infoCHIP.$info29.$info30.$info31);
	//print_r($group_size);echo '<br />';
	for($i=$group_size;$i<1000;$i++){
		$info31.=" ";
	}
	
	$stringData = $info1.$info3.$info4.$info5.$info6.$info7.$info8.$info9.$info10.$info11.$info12.$info13.$info14.$info15.$info16.$info17.$info18.$info19.$info20.$info21.$info22.$info23.$info24.$info25.$info26.$info27.$info28.$infoCHIP.$info29.$info30.$info31.PHP_EOL;
	$string = preg_replace( '/[`^~\'"]/', null, iconv('UTF-8','ASCII//IGNORE',$stringData));
	fwrite($saida, $saida.$string);
	
 
}
}
	$header="H027067651000155N00001020140228112441NPSOCIDADE EDUCACIONAL DO ESPIRITO SANTO            00103300100010000000000000AV COMISSARIO JOSE DANTAS DE MELO                 000021                    BOA VISTA II        VILA VELHA          ES291029020027212227000000000000000000000000                                                                     000000000000000000000000000000                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  ".PHP_EOL;
	$trailler="T";
	
	$group_size=strlen($trailler.$x);
	for($i=$group_size;$i<7;$i++){
		$trailler.="0";
	}
	$group_size=strlen($trailler.$x);
	for($i=$group_size;$i<1000;$i++){
		$x.=" ";
	}
	
	
	
	fclose($saida);
fclose($file);

$fileContents = file_get_contents('remessa_funcionario.txt');
$output = str_replace('Resource id #4','',$fileContents);

$out=$header;
	$out.= $output;
	$out.=$trailler.$x.PHP_EOL;
	file_put_contents('remessa_funcionario.txt', $out);

?>
