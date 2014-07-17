<?php 
include 'config.php'; 
include 'scheduler/firepjs.php'; 
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Controle Carteirinhas UVV</title>
  <link href="<?php echo CONTENT;?>img/favicon.ico" rel="icon" type="image/x-icon">

  <!-- CSS -->
  <link href="<?php echo CONTENT;?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo CONTENT;?>css/bootstrap-theme.min.css" rel="stylesheet">
  <link href="<?php echo CONTENT;?>css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo CONTENT;?>css/estilo.css" rel="stylesheet">
  <link href="<?php echo CONTENT;?>css/demo_page.css" rel="stylesheet">
  <link href="<?php echo CONTENT;?>css/demo_table2.css" rel="stylesheet">

  <script src="<?php echo CONTENT;?>js/jquery-1.10.2.js"></script>
  <script src="<?php echo CONTENT;?>js/search.js"></script>
  <script src="<?php echo CONTENT;?>js/jquery.dataTables.js"></script>


  <script>

  </script>
  <style>
  .dataTables_length label{
   font-weight:200;
   font-size:12px;
 }

 </style>
 <script type="text/javascript">
 $(document).ready(function() {
  $('#table_ok').dataTable( {
   "bProcessing": true,
   "bServerSide": true,
   "sAjaxSource": "app/alunos_ok.php",
   "bFilter": false,
   "bInfo": false,
   "oLanguage": {
     "sProcessing":   "A processar...",
     "sLengthMenu":   "Mostrar _MENU_ registos",
     "sZeroRecords":  "Não foram encontrados resultados",
     "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registos",
     "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registos",
     "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
     "sInfoPostFix":  "",
     "sSearch":       "Procurar:",
     "sUrl":          "",
     "oPaginate": {
       "sFirst":    "Primeiro",
       "sPrevious": "Anterior",
       "sNext":     "Seguinte",
       "sLast":     "Último"
     }
   },

   "aoColumnDefs" : [ {
     "bSortable" : false,
     "aTargets" : [ "no-sort" ]
   } ]

 } );
} );
 </script>
 <script type="text/javascript">
 $(document).ready(function() {
  $('#table_remessa').dataTable( {
   "bProcessing": true,
   "bServerSide": true,
   "sAjaxSource": "app/remessa.php",
   "bInfo": true,
   "oLanguage": {
     "sProcessing":   "A processar...",
     "sLengthMenu":   "Mostrar _MENU_ registos",
     "sZeroRecords":  "Não foram encontrados resultados",
     "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registos",
     "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registos",
     "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
     "sInfoPostFix":  "",
     "sSearch":       "Procurar:",
     "sUrl":          "",
     "oPaginate": {
       "sFirst":    "Primeiro",
       "sPrevious": "Anterior",
       "sNext":     "Seguinte",
       "sLast":     "Último"
     }
   },

   "aoColumnDefs" : [ {
     "bSortable" : false,
     "aTargets" : [ "no-sort" ]
   } ]

 } );
} );
 </script>
 <script type="text/javascript" charset="utf-8">
 /* Formating function for row details */


 var oTable
 function fnFormatDetails ( nTr )
 {
  var aData = oTable.fnGetData( nTr );

  var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
  sOut += '<tr><td>'+aData['extra']+'</td></tr>';
  sOut += '</table>';

  return sOut;
}


$(document).ready(function() {
  oTable = $('#table_error').dataTable({
   "bProcessing": true,
   "bServerSide": true,
   "sAjaxSource": "app/error_remessa.php",
   "oLanguage": {
    "sProcessing":   "A processar...",
    "sLengthMenu":   "Mostrar _MENU_ registos",
    "sZeroRecords":  "Não foram encontrados resultados",
    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registos",
    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registos",
    "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
    "sInfoPostFix":  "",
    "sSearch":       "Procurar:",
    "sUrl":          "",
    "oPaginate": {
     "sFirst":    "Primeiro",
     "sPrevious": "Anterior",
     "sNext":     "Seguinte",
     "sLast":     "Último"
   }
 },

 "aoColumnDefs" : [{ "aTargets": [ 0 ], "bSortable": false },
 { "aTargets": [ 1 ], "bSortable": true },
 { "aTargets": [ 2 ], "bSortable": true },
 { "aTargets": [ 3 ], "bSortable": false } ]


} );


  $('#renderingEngineFilter').on( 'change', function () {
   oTable.fnFilter( $(this).val() );
 } );



  $(document).on('click','#table_error tbody td img',function () {
   var nTr = $(this).parents('tr')[0];
   if ( oTable.fnIsOpen(nTr) )
   {
    /* This row is already open - close it */
    this.src = "img/details_open.png";
    oTable.fnClose( nTr );
  }
  else
  {
    /* Open this row */
    this.src = "img/details_close.png";
    oTable.fnOpen( nTr, fnFormatDetails(nTr), 'details' );
  }
} );


} );


			//$(document).ready(function() {oTable.columnFilter({aoColumns:[null, null, null, null,{ sSelector: "#renderingEngineFilter", type:"select"  }]})});
			
      </script>

      <script type="text/javascript">
      $(document).ready(function(){
       $('#btn_refresh').click(function(){
        $.ajax({
          url: "filter.php",
          beforeSend: function() {
            $("span#refresh").html("<i class='fa fa-refresh fa-spin'></i>");
          }
        });

      });
     });
      (function( $ ) {
       $(function() {
        $( "a", "#pagination" ).on( "click", function( e ) {
         e.preventDefault();
         var $a = $( this );

         $a.addClass( "current" ).
         siblings().
         removeClass( "current" );

         var page = $a.data( "page" );
         $.get( "app/ajax.php", { s: page }, function( html ) {
          $( "#wallmessages" ).html( html );

        });
       });

      });

     })( jQuery );
     </script>
	 
   </head>

   <body>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-3">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="navbar-brand"> <img src="img/logo-uvv.jpg"> | Controle de carteirinhas </span>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-3">
          <ul class="nav navbar-nav navbar-right">
           <?php


						//print_r($connection);
           if (!logedin($username,$pass,$connection)){
             ?>
             <!-- Deslogado -->
             <li class="dropdown"> <a class="dropdown-toggle" href="#" data-toggle="dropdown">Área Restrita<strong class="caret"></strong></a>
              <div class="dropdown-menu" style="padding: 10px;min-width:240px;">
                <form action="login.php" method="post" role="form" class="form-horizontal">
                  <div class="input-group" style="margin-bottom:.5em">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" placeholder="Login" name='username'>
                  </div> 
                  <div class="input-group" style="margin-bottom:.5em">
                    <span class="input-group-addon"><i class="fa fa-lock"></i> </span>
                    <input type="password" class="form-control" placeholder="Senha" name='password'>
                  </div> 
                  <input class="btn btn-primary" style="margin-top:.75em;width: 100%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Entrar">
                </form>
              </div>
            </li>
            <!-- fim deslogado -->
          </ul>
        </div>
      </div>  
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- Nav tabs -->
          <?php
        } 
					 		 //otherwise they are shown the admin area	 
        else 

        { 
          ?>
          <!-- Logado -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Olá, <?php echo $username;?><b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Sair</a></li>
            </ul>
          </li>
          <!-- fim Logado -->
        </ul>
      </div>
    </div>  
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li id="consulta_li" class="active"><a href="#Consulta" data-toggle="tab">Consulta</a></li>
          <li id="listagem_li"><a href="#Listagem" data-toggle="tab">Pendências</a></li>
          <li id="lotes_li"><a href="#Lotes" data-toggle="tab">Próxima remessa</a></li>
          <li id="config_li"><a href="#config" data-toggle="tab">Configurações</a></li>
          <li id="acesso_li"><a href="#acesso" data-toggle="tab">Acesso</a></li>
        </ul>
        <?php	}  	  ?>

        
        <div class="tab-content">


   <div class="modal fade" id="atualizar_sis">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Atualizando sistema</h4>
      </div>
      <div class="modal-body">
        <p>Aguarde, estamos atualizando o sistema. Isso pode demorar alguns minutos...</p>
        <center><img src="img/carteirinha.gif"></center>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->






         <!-- ####### consulta ########## -->
         <div class="tab-pane active" id="Consulta">
          <h1  class="page-header">Consulta</h1>
          <div class="row" >
            <div class="col-md-6" >
              <h3 class="centralizado">Procure o aluno pelo <br><span class="cor-info">Nome</span> ou <span class="cor-info">Número de matrícula</span></h3>
              <div class="input-group input-group-lg">
               <input type="text" class="form-control" placeholder="Digite aqui o nome ou matrícula..." id="search" autocomplete="off">
               <span class="input-group-btn">
                <button class="btn btn-default" type="button" id="btn_search"><i class="glyphicon glyphicon-search"></i></button>
              </span>
            </div>

            <p class="centralizado help-block">Consulte aqui o status de produção da carteirinha do aluno.</p>
            <span id="results">

            </span>
                <!--  <div class="alert alert-success">
                    <h4><i class="fa fa-credit-card"></i> Carteirinha produzida</h4> 
                      <ul>
                        <li><b>Aluno:</b> Lucas coradini </li>
                        <li><b>Matrícula:</b> 201425864</li>
                        <li><b>Lote:</b> #144552</li>
                      </ul>
                  </div>

                  <!-- Nao encontrado --> 
                 <!--  <div class="alert alert-warning">
                   <p><i class="fa fa-search"></i> <b> Aluno não encontrato!</b> Tente outra busca.</p>
                 </div> --> 


                 <!-- erro --> 
                 <!-- <div class="alert alert-danger">
                    <h4><i class="fa fa-exclamation-circle"></i> Ocorreram os erros:</h4> 
                      <b>Aluno:</b> Lucas coradini <br>
                      <b>Matrícula:</b> 201425864 <br>
                      <b>Erros:</b> 
                      <ul>
                        <li>#29292 - Erro tal</li>
                        <li>#29292 - Erro tal</li>
                        <li>#29292 - Erro tal</li>
                      </ul>
                  </div>
				 
				  onClick="$('#listagem').addClass('active');$('#consulta').removeClass('active');"
				  onClick="$('#lotes').addClass('active');$('#consulta').removeClass('active');"
        -->

      </div>

      <div class="col-md-6" >
        <div class="panel panel-default">
          <div class="panel-heading"><h3 class="panel-title">    <?php if (logedin($username,$pass,$connection)){ ?><button type="button" data-toggle="modal"  data-backdrop="static" data-target="#atualizar_sis" class="btn btn-primary btn-xs pull-right " id="btn_refresh" onClick="location.href='filter.php'">Atualizar dados</button> <span id="refresh" class="atualizar pull-right"></span> <?php } ?><i class="fa fa-tachometer"></i> Status </h3> </div>
          <div class="panel-body">
           <div class="bs-callout bs-callout-danger">
            <!--//////////////// -->
            <h4 class="cor-danger "><i class="fa fa-exclamation-circle"></i> Alunos com dados incorretos</h4>
            <?php if (logedin($username,$pass,$connection)){ ?> <a href="#Listagem" data-toggle="tab" class="btn btn-danger pull-right" role="button"  onClick="$('#listagem_li').addClass('active');$('#consulta_li').removeClass('active')"> <i class="fa fa-eye"></i> Visualizar</a>  <?php } ?>
            <p>Ainda restam <span class="cor-danger numero-destaque "><?php echo error_total($connection);?></span> alunos com erros. </p>
          </div>

           <!--//////////////// -->
          <?php if (logedin($username,$pass,$connection)){ ?>
          <div class="bs-callout bs-callout-info">
            <h4 class="cor-info "><i class="fa fa-credit-card"></i> Alunos com dados ajustados (Próximo lote)</h4>
            <a href="#Lotes"  data-toggle="tab" class="btn btn-info pull-right" role="button" onClick="$('#lotes_li').addClass('active');$('#consulta_li').removeClass('active')"> <i class="fa fa-eye"></i> Visualizar</a>
            <p>Estão prontos para processar <span class="cor-info numero-destaque "><?php echo next_total($connection);?></span> alunos. </p>
            <p>Saída do próximo lote: <span></span> <span class="cor-info numero-destaque "><?php $friday = strtotime("next friday"); echo date("d/m/Y",$friday);?></span> </p>
          </div> 
          <?php } ?>
          
            
            <!--//////////////// -->
            <div class="bs-callout bs-callout-warning">
            <h4 class="cor-warning "><i class="fa fa-credit-card"></i> Carteirinhas em processamento pelo Santander</h4>
            <p>No momento estão sendo produzidos <span class="cor-warning numero-destaque "><?php echo process_total($connection);?></span> Carteirinhas. </p>
            <p>Previsão de entrega: Até <span></span> <span class="cor-warning numero-destaque "><?php $entrega = strtotime("next friday + 15 days");echo date("d/m/Y",$entrega);?></span> </p>
          </div> 

          <!--//////////////// -->
          <div class="bs-callout bs-callout-success">
            <h4 class="cor-success "><i class="fa fa-credit-card"></i> Carteirinhas disponíveis para entrega</h4>
            <p>Já foram entregues <span class="cor-success numero-destaque "><?php echo pronto_total($connection);?></span> carteirinhas. </p>
          </div> 
          
          
        </div>
      </div>                   
    </div>
  </div>   
</div>
 <?php
          if(isset($_COOKIE['ID_my_site']))  { 
            $username = $_COOKIE['ID_my_site']; 
            $pass = $_COOKIE['Key_my_site']; 

            if (logedin($username,$pass,$connection)){
             ?>
<!-- ####### listagem ########## -->
<div class="tab-pane" id="Listagem">
  <h1  class="page-header">Pendências</h1>
  <div class="row">
    <div class="col-md-12"> 

      <p>Consulte aqui a listagem dos alunos com dados incorretos ou incompletos para o processo de confecção das carteirinhas.</p>
      <div class="alert alert-warning ver_erro"><b>Dica:</b> Clique em <img src="img/details_open.png"> para visualizar os erros e suas respectivas correções.</div>
      <p></p>
      <div class="panel panel-danger">
        <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-user"></i> Alunos com erro : <span class="numero-destaque "><?php echo error_total($connection);?></span>
          <div class="btn-group pull-right">
                        <!--button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" id="">
                          Filtro <span class="caret"></span>
                        </button-->

                        <select class="filtro-alunos" id="renderingEngineFilter" >
                          <option><b>Filtre por erro</b></option>
                          <option value="D008">  Data de nascimento inválida ou não informada. </option>
                          <option value="D009">  Código da nacionalidade inválida ou não informada.</option>
                          <option value=" D010">  Código do sexo diferente de ‘M’ e ‘F’.</option>
                          <option value="D012">  Logradouro não informado.</option>
                          <option value="D013">  Número do logradouro não informado.</option>
                          <option value="D014">  Bairro do logradouro não informado.</option>
                          <option value="D015">  Município do logradouro não informado.</option>
                          <option value="D016">  U.F. do logradouro não informada.</option>
                          <option value="D017">  CEP do logradouro inválido ou não informado.</option>
                          <option value="D018">  País não informado.</option>
                          <option value=" D019">  Tipo do vínculo com a IES inválido ou não informado.</option>
                          <option value=" D020">  Código de barras inválido ou não informado.</option>
                          <option value=" D023">  Foto não registrada.</option>
                          <option value=" D025">  Número do CNPJ inválido ou não informado no CHIP01.</option>
                          <option value=" D026">  Código da filial inválido ou não informado no CHIP01.</option>
                          <option value=" D027">  Código de barras inválido ou não informado no CHIP01.</option>
                          <option value=" D028">  Código da matrícula inválido ou não informado no CHIP01.</option>
                          <option value=" D029">  Nome do universitário inválido ou não informado no CHIP01.</option>
                          <option value=" D031">  Nome do universitário com caracteres inválidos.</option>
                          <option value=" D032">  Campos alfanuméricos obrigatórios com caracteres inválidos.</option>
                          <option value=" D033">  Parâmetros administrativos não cadastrados para este CNPJ/ Filial/ Vínculo/ Tipo Cartão</option>
                          <option value=" D034">  Código de estação dos parâmetros administrativos difere do cadastrado no Home Banking</option>


                        </select>

                        <!--ul class="dropdown-menu" role="menu">
                          <li><a href="#" onClick="$('input[aria-controls=table_error]').val('D023')">Sem foto</a></li>
                          <li><a href="#">Falta dados</a></li>
                          <li><a href="#">Outro erro</a></li>  
                        </ul-->

                      </div>
                    </h3>
                  </div>
                  <div class="panel-body" id="painel-erro" >


                    <!-- data table aqui -->
                    <table class="table" cellpadding="0" cellspacing="0" border="0" id="table_error">
                      <thead>
                        <tr>
                         <th></th>
                         <th>Nome</th>
                         <th>Matrícula</th>
                         <th>Erros</th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr>
                         <td colspan="5" class="dataTables_empty">Carregando informações do Servidor</td>
                       </tr>
                     </tbody>

                   </table>

                 </div>
                 <div class="panel-footer"><a href="#" id="print" class="btn btn-default" rel="painel-erro"><i class="fa fa-print"></i> Imprimir Resultado</a>
                 </div>
               </div>
               <div class="alert alert-warning"><b>Observações:</b> Caracteres permitidos para campos alfanuméricos: letras maiúsculas (A a Z), números (0 a 9), espaço (   ), dois pontos ( : ), ponto ( . ), barra normal ( / ), barra invertida ( \ ), traço ( - ), underscore ( _ ), apóstrofe ( ' ), e comercial ( & ), arroba ( @ ) e vírgula ( , ).
                Caracteres permitidos para campos numéricos: números (0 a 9).</div>

              </div>

            </div> 
          </div>
         
             <!-- ####### lotes ########## -->
             <div class="tab-pane" id="Lotes">
              <h1  class="page-header">Próxima remessa</h1>
              <p>Alunos com dados ou fotos corridigas que serão processados no próximo lote</p>
              <div class="row" > 
                <div class="col-md-8">
                  <div class="panel panel-info">
                    <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-bell"></i> Alunos prontos para a próxima remessa:  <span class="numero-destaque "><?php echo next_total($connection);?></span></h3> </div>
                    <div class="panel-body">
                      <!-- data table aqui -->
                      <table class="table" id="table_remessa">
                        <thead>
                          <tr>
                            <th>Nome</th> 
                            
                            <th>Matrícula</th>

                          </tr>
                        </thead>
                        <tbody>
                         <tr>
                           <td colspan="5" class="dataTables_empty">Carregando informações do Servidor</td>
                         </tr>
                       </tbody>
                     </table>

                     <!-- fim table aqui -->
                   </div>
                   <div class="panel-footer">
                     <?php 
                     $next_date = strtotime('next monday');
                     $send_date = strftime ("%d/%m/%Y", $next_date);
                     $today = date('today');
                     $TIME_LAST = $next_date - time();
                     $days=floor($TIME_LAST/(60*60*24));


                     ?>
                     <p> <span class="alert alert-info prox-lot">Proximo lote: <b><?php echo $send_date; ?></b></span> Faltam <b><?php echo $days+1; ?></b> dias para a próxima remessa.</p> 
                   </div>
                 </div>
               </div>  
               <div class="col-md-4">
                <div class="panel panel-default">
                  <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-calendar"></i> Histórico</h3> </div>
                  <div class="panel-body">
                    <div class="qa-message-list" id="wallmessages">

                      <!-- repeat time line -->
                      <?php     
                      $history = $connection->query( "SELECT * FROM crt_historico ORDER BY id LIMIT 3" );


                      while( $hist = $history->fetch_assoc()) {
                       $lote = $hist['n_seg_remessa'];
                       $data = $hist['data_envio'];
                       $data_t= strftime('%d/%m/%Y',strtotime($data));
                       $Alu_env = $hist['total_enviado'];;
                       $Alu_pro = $hist['total_validos'];;	
                       $Alu_err = $hist['total_error'];;
                       ?>
                       <div class="message-item" id="m16">
                        <div class="message-inner">
                          <div class="message-head clearfix">
                            <div class="avatar pull-left"><i class="fa fa-folder-o fa-2x"></i></div>
                            <div class="user-detail">
                              <h4 class="handle">Lote <?php echo $lote?> </h4>
                              <div class="post-meta">
                              </div>
                            </div>
                          </div>
                          <div class="qa-message-content">
                            <ul>
                              <li>Data de envio: <?php echo $data_t?></li>
                              <li >Alunos enviados: <span class="cor-info"><?php echo $Alu_env?></span></li>
                              <li >Alunos processados: <span class="cor-success"><?php echo $Alu_pro?></span></li>
                              <li >Alunos com erro: <span class="cor-danger"><?php echo $Alu_err?></span></li>
                            </ul>
                          </div>
                        </div></div>
                        <?php
                      }

                      ?>



                      <ul id="pagination" class="pagination pull-right">
                       <?php
                       for( $i = 0; $i < 4; $i++ ) {
                        $n = $i + 1;
                        $current = ( $n == 1 ) ? ' class="active"' : '';
                        echo '<li><a href="#" data-page="' . $n .'"'. $current . '>' . $n . '</a></li>';
                      }
                      ?>
                    </ul>	

                  </div>  
                </div>
              </div>
            </div> 
          </div>   
        </div>

        <!-- ####### configurações ########## -->
        <div class="tab-pane" id="config">
          <h1  class="page-header">Configurações</h1>
          <div class="row">
            <!-- arquivo -->
            <div class="col-md-6">
              <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-download"></i> Arquivo retorno Santander</h3></div>
                <div class="panel-body">
                  <div class="form-group">
                   <form enctype="multipart/form-data" method="POST" id="form-retorno" action="retorno_read.php">
                     <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
                     <label for="exampleInputFile">Selecione o arquivo que deseja enviar:</label>
                     <input type="file" id="exampleInputFile" name="file">
                     <p class="help-block">O arquivo deve estar no formato .txt</p>
                     <input type="submit" class="btn btn-success btn-lg btn-block" Value="Enviar">
                   </form>
                 </div>

               </div>
             </div>
           </div>
           <div class="col-md-6">
            <!-- Remessa -->
            <div class="panel panel-default">
              <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-pencil-square-o"></i> Opções</h3></div>
              <div class="panel-body">
                <form class="form-horizontal col-md-12" method="POST" id="form-options" role="form">
                  <fieldset>

                    <div class="form-group">
                      <label for="InputName">Pasta destino das Fotos</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-folder"></i> </span>
                        <input type="text" class="form-control" name="InputName" id="InputName" value="<?php echo get_option('photo_folder',$connection);?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="InputEmail">E-mail de confirmação do envio das fotos</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" id="Inputfoto" name="Inputfoto" value="<?php echo get_option('email_foto',$connection);?>"  >
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="InputEmail">E-mail para enviar a remessa</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" id="InputEmail" name="InputEmail" value="<?php echo get_option('email_remessa',$connection);?>"  >
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="InputEmail">E-mail para reportar erros</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" id="Inputerro" name="Inputerro" value="<?php echo get_option('email_erro',$connection);?>"  >
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="pull-right">
                        <button type="submit" class="btn btn-primary" onClick="sendOptions()">Salvar</button>
                      </div>
                    </div>
                    <script>
                    $('#config button').click(function (e) {
                     e.preventDefault();
                     $(this).tab('show');
                   });

						// store the currently selected tab in the hash value
						$("ul.nav-tabs > li > a").on("shown.bs.tab", function (e) {
							var id = $(e.target).attr("href").substr(1);
							window.location.hash = id;
						});

						// on load of the page: switch to the currently selected tab
						var hash = window.location.hash;
						$('#config a[href="' + hash + '"]').tab('show');
						
						function sendFile(){
             $('#form-options').submit();
           }
           function sendOptions(){
            $.ajax({ url: 'index.php#config',
              data: $('#form-options').serialize(),
              type: 'post',
            });


          }
          </script>
          <?php
          if(isset($_POST['InputName']) && !empty($_POST['InputName']) &&isset($_POST['InputEmail']) && !empty($_POST['InputEmail']) && !empty($_POST['Inputerro']) && !empty($_POST['Inputfoto'])) {
            $folder = $_POST['InputName'];
            $email1 = $_POST['InputEmail'];
            $email2 = $_POST['Inputerro'];
            $email3 = $_POST['Inputfoto'];
            set_option('photo_folder',$folder,$connection);
            set_option('email_remessa',$email1,$connection);
            set_option('email_erro',$email2,$connection);
            set_option('email_foto',$email3,$connection);
          }
          ?>

        </fieldset>
      </form>         
    </div>
  </div>

</div>  
</div>  
</div>

<!-- ####### acesso ########## -->
<?php
if(isset($_COOKIE['ID_my_site']))  { 
  $username = $_COOKIE['ID_my_site']; 
} else {$username = "";}
$sql = "SELECT * FROM users WHERE username= '{$username}'";
$result = $connection->query($sql);
while ($info = $result->fetch_row()){
  ?>
  <div class="tab-pane" id="acesso">
    <h1  class="page-header">Acesso</h1>
    <?php if ($info[4]==="Administrador"){?>
    <button class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#myModal">
      <i class="fa fa-plus"></i> Novo
    </button><?php } ?>
    <h3>Usuários Cadastrados</h3>

    <div class="well">
     <?php


     ?>
     <!-- criar loops aqui -->
     <div class="row user-row">
      <div class="col-xs-3 col-sm-2 col-md-1 col-lg-1">
        <i class="fa fa-user fa-4x"></i>
      </div>
      <div class="col-xs-8 col-sm-9 col-md-10 col-lg-10">
        <strong><?php echo $info[3];?></strong><br>
        <span class="text-muted">Tipo: <?php echo $info[4];?></span>
      </div>
      <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 dropdown-user" data-for="#<?php echo $info[5];?>"> <!-- inserir id do usuario aqui -->
        <i class="glyphicon glyphicon-chevron-down text-muted"></i>
      </div>
    </div>
    <div class="row user-infos" id="<?php echo $info[5];?>"> <!-- inserir id do usuario aqui -->
      <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Informações do usuário</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-xs-10 col-sm-10 hidden-md hidden-lg">
                <strong><?php echo $user['nome'];?></strong><br>
                <dl>
                  <dt>User level:</dt>
                  <dd>Administrator</dd>
                  <dt>Registered since:</dt>
                  <dd>11/12/2013</dd>
                  <dt>Topics</dt>
                  <dd>15</dd>
                  <dt>Warnings</dt>
                  <dd>0</dd>
                </dl>
              </div>
              <div class=" col-md-9 col-lg-9 hidden-xs hidden-sm">
                <strong><?php echo $info[3];?></strong><br>
                <table class="table table-user-information">
                  <tbody>
                    <tr>
                      <td>Tipo:</td>
                      <td><?php echo '<span id="the-tipo-'.$info[0].'" >'.$info[4].'</span>';?></td>
                    </tr>
                    <tr>
                      <td>E-mail:</td>
                      <td><?php echo '<span id="the-email-'.$info[0].'">'.$info[2].'</span>';?></td>
                    </tr>
                    <tr>
                      <td>Login</td>
                      <td><?php echo '<span id="the-login-'.$info[0].'">'.$info[0].'</span>';?></td>
                    </tr>
                    <tr>
                      <td>Senha</td>
                      <td> </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="panel-footer">
            <button class="btn btn-sm btn-primary" type="button"
            data-toggle="tooltip"
            data-original-title="Enviar mensagem"><i class="glyphicon glyphicon-envelope"></i></button>
            <span class="pull-right">
              <button class="btn btn-sm btn-warning" type="button"
              data-toggle="tooltip"
              data-original-title="Editar este usuário" ><i class="glyphicon glyphicon-edit"></i></button>
              <button class="btn btn-sm btn-danger" type="button"
              data-toggle="tooltip"
              data-original-title="Remover este usuário" onClick="deleteUser()"><i class="glyphicon glyphicon-remove"></i></button>
            </span>
            <script>
            function deleteUser(){
             var userid = {user_id : <?php echo $info[5];?>}
             $.ajax({ url: 'remove.php',
              data: userid,
              type: 'post'									
            });
           }

           </script>

         </div>
       </div>
     </div>
   </div>
   <!-- fim do loop -->
   <?php } ?>

   <!-- modal inserir novo -->
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Inserir novo usuário</h4>
        </div>
        <div class="modal-body">
          <span id="status_add"></span>
          <form accept-charset="UTF-8" role="form" id="form-newuser">
            <fieldset>
              <div class="form-group">
                <input class="form-control" placeholder="Nome" name="nome" type="text">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="E-mail" name="email" type="text">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="login" name="login" type="text">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="senha" name="senha" type="password" value="">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Confirmar senha" name="senha2" type="password" value="">
              </div>

            </fieldset>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="modal-dismiss">Cancelar</button>
          <button type="button" class="btn btn-success" onCLick="sendNewUser()">Inserir</button>
          <script>
          function sendNewUser(){

           $.ajax({ url: 'add.php',
            data: $('#form-newuser').serialize(),
            type: 'post'									
          })
           .done(function() {
             $('#form-newuser')[0].reset();
             $('#status_add').html('<div class="alert alert-success">Usuário Adicionado com sucesso!</div>');
             setInterval(function(){$('#myModal').modal('hide')},3000);
           })
           .fail(function() {
            $('#status_add').html('<div class="alert alert-danger">Usuário <b>NÃO</b> foi adicionado, aguarde um momento e tente novamente!</div>');
          });
								/* } else {
								$('#status_add').html('<div class="alert alert-danger">Senha <b>NÃO</b> confere!</div>');
								$('#form-newuser')[0].reset();
								setInterval(function(){var node = document.getElementById('status_add');while (node.hasChildNodes()) { node.removeChild(node.firstChild);}},3000);
              } */
            }

            </script>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


  </div> <!-- well -->
</div>
<?php }

}
?>
</div>
</div><!-- col 12 -->
</div><!-- row-->
<footer>
  <hr>
  Desenvolvido por DTI - UVV
</footer>  
</div><!-- container -->
<!-- JavaScript -->

<script src="<?php echo CONTENT;?>js/bootstrap.min.js"></script>
<script src="<?php echo CONTENT;?>js/script.js"></script>
<script src="<?php echo CONTENT;?>js/core.js"></script>
<script src="<?php echo CONTENT;?>js/jquery.Print.js"></script>

</body>

</html>