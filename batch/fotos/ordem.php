<?php
//print_r($_SERVER);

$file = fopen('alunos.csv','r');
$saida = fopen('sem_foto.txt','w');
$matricula = array();
while (($line = fgetcsv($file)) !== FALSE) {
	$mat = explode(';', $line[0]);
		
		array_push($matricula, $mat[0]);
}


 $handle = opendir('C:/wamp/www/batch/fotos/');
 				$jpg=array();
		   			 while (false !== ($fotos = readdir($handle))) {
						 array_push($jpg, $fotos);

						   		}
						   		
$array_pic=array();
	foreach ($jpg as $key =>$pic) {
					   $n_file = explode(".",$pic);
					 array_push($array_pic, $n_file[0]);
				   }

				 //  print_r($array_pic);
				foreach ($jpg as $key =>$pic) {
					   $n_file = explode(".",$pic);
					    	foreach ($matricula as $position => $matr) {
					    			if (!in_array($matr, $array_pic)){
					    				fwrite($saida, $matr.PHP_EOL);
					    			}

					    			   			
					   			if ($matr === $n_file[0]){
					   				
					   				$o_pasta= "C:\\wamp\\www\\batch\\fotos\\";
									$d_pasta='C:\\wamp\\www\\batch\\fotos\\comfoto\\';
									$from=$o_pasta.$pic;
									$to=$d_pasta.$pic;
									copy($from,$to);
										
								} 
									
					  		}
					  		
		 
				}

fclose($saida);
fclose($file);

?>
