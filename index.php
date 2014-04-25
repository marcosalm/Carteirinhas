<?php 
require_once('config.php');

 ?> 
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
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
            <span class="navbar-brand"> <img src="img/logo-uvv.jpg"> Controle de carteirinhas </span>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-3">
            <ul class="nav navbar-nav navbar-right">
			  <?php
								  
					 if(isset($_COOKIE['ID_my_site']))  { 
						$username = $_COOKIE['ID_my_site']; 
						$pass = $_COOKIE['Key_my_site']; 
						$check = __call('query', "SELECT * FROM users WHERE username = '$username'"); 
						while($info = __call('fetch_array', $check )) { 
							//if the cookie has the wrong password, they are taken to the login page 
								if ($pass != $info['password']) 
								{ 			
			  ?>
              <!-- Deslogado -->
              <li class="dropdown"> <a class="dropdown-toggle" href="#" data-toggle="dropdown">Área Restrita<strong class="caret"></strong></a>
                <div class="dropdown-menu" style="padding: 10px;min-width:240px;">
                  <form action="login.php" method="post" role="form" class="form-horizontal">
                    <div class="input-group" style="margin-bottom:.5em">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text" class="form-control" placeholder="Login">
                    </div> 
                    <div class="input-group" style="margin-bottom:.5em">
                      <span class="input-group-addon"><i class="fa fa-lock"></i> </span>
                      <input type="password" class="form-control" placeholder="Senha">
                    </div> 
                    <input class="btn btn-primary" style="margin-top:.75em;width: 100%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Entrar">
                  </form>
                </div>
              </li>
              <!-- fim deslogado -->
			  <?php
								} 
					 		 //otherwise they are shown the admin area	 
							else 

								{ 
?>
			<!-- Logado -->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Olá, Fulano de tal <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="index.html"><i class="fa fa-sign-out fa-fw"></i> Sair</a></li>
                </ul>
              </li>
              <!-- fim Logado -->
<?php
							} 

							} 

							} 

					 else 
				 //if the cookie does not exist, they are taken to the login screen 

					 {			 

			  ?>
              <!-- Deslogado -->
              <li class="dropdown"> <a class="dropdown-toggle" href="#" data-toggle="dropdown">Área Restrita<strong class="caret"></strong></a>
                <div class="dropdown-menu" style="padding: 10px;min-width:240px;">
                  <form action="login.php" method="post" role="form" class="form-horizontal">
                    <div class="input-group" style="margin-bottom:.5em">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text" class="form-control" placeholder="Login">
                    </div> 
                    <div class="input-group" style="margin-bottom:.5em">
                      <span class="input-group-addon"><i class="fa fa-lock"></i> </span>
                      <input type="password" class="form-control" placeholder="Senha">
                    </div> 
                    <input class="btn btn-primary" style="margin-top:.75em;width: 100%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Entrar">
                  </form>
                </div>
              </li>
              <!-- fim deslogado -->
			  <?php
			   } 
			  ?>
			  
            
			  
			    <?php
			  
			  ?>
			  
            </ul>
          </div>
      </div>  
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs">
            <li class="active"><a href="#Consulta" data-toggle="tab">Consulta</a></li>
            <li><a href="#Listagem" data-toggle="tab">Listagem</a></li>
            <li><a href="#Lotes" data-toggle="tab">Lotes</a></li>
            <li><a href="#config" data-toggle="tab">Configurações</a></li>
            <li><a href="#acesso" data-toggle="tab">Acesso</a></li>
          </ul>
          <div class="tab-content">
		  
             <!-- ####### consulta ########## -->
            <div class="tab-pane active" id="Consulta">
              <h1  class="page-header">Consulta</h1>
              <div class="row" >
                <div class="col-md-6" >
                  <h3 class="centralizado">Procure o aluno pelo <br><span class="cor-info">Nome</span> ou <span class="cor-info">Número de matrícula</span></h3>
                  <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                    <input type="text" class="form-control" placeholder="Nome ou matrícula...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Procurar</button>
                    </span>
                  </div>
                  <p></p>

                  <div class="alert alert-success">
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
                  -->
                
                </div>
                <div class="col-md-6" >
                  <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-tachometer"></i> Status </h3> </div>
                    <div class="panel-body">
                      <div class="bs-callout bs-callout-danger">
                        <h4 class="cor-danger "><i class="fa fa-exclamation-circle"></i> Alunos com erro</h4>
                        <a href="#" class="btn btn-danger pull-right" role="button"> <i class="fa fa-eye"></i> Visualizar</a>
                        <p>Ainda restam <span class="cor-danger numero-destaque ">800</span> alunos com erros. </p>
                      </div>
                      <div class="bs-callout bs-callout-success">
                        <h4 class="cor-success "><i class="fa fa-credit-card"></i> Alunos processados</h4>
                        <a href="#" class="btn btn-success pull-right" role="button"> <i class="fa fa-eye"></i> Visualizar</a>
                        <p>Já foram processados <span class="cor-success numero-destaque ">300</span> alunos. </p>
                      </div> 
                    </div>
                  </div>                   
                </div>
              </div>   
            </div>
             <!-- ####### listagem ########## -->
            <div class="tab-pane" id="Listagem">
              <h1  class="page-header">Listagem</h1>
              <div class="row">
                <div class="col-md-8"> 
                  <div class="panel panel-danger">
                    <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-user"></i> Alunos com erro : <span class="numero-destaque ">800</span>
                      <div class="btn-group pull-right">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                          Filtro <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Sem foto</a></li>
                          <li><a href="#">Falta dados</a></li>
                          <li><a href="#">Outro erro</a></li>  
                        </ul>
                      </div>
                      </h3>
                    </div>
                    <div class="panel-body">
                      
                    <!-- data table aqui -->
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Nome</th>
                            <th>Matrícula</th>
                            <th>Nivel</th>
                            <th>Outro campo</th>
                            <th>Erros</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Lucas Coradini</td>
                            <td>201416585</td>
                            <td>Pós-Graduação</td>
                            <td>201416585</td>
                            <td>
                                #29292 - Erro tal<br/>
                                #29292 - Erro tal<br/>
                            </td>
                          </tr>
                          <tr>
                            <td>Marcos almeida</td>
                            <td>201416585</td>
                            <td>Pós-Graduação</td>
                            <td>201416585</td>
                            <td>
                               #29292 - Erro tal<br/>
                                #29292 - Erro tal<br/>
                                #29292 - Erro tal<br/>
                            </td>
                          </tr>
                          <tr>
                            <td>Bruno Guimarães</td>
                            <td>201416585</td>
                            <td>Pós-Graduação</td>
                            <td>201416585</td>
                            <td>
                               #29292 - Erro tal<br/>

                            </td>
                          </tr>
                         <tr>
                            <td>Nome Muito Grande de Aluno Silva</td>
                            <td>201416585</td>
                            <td>Pós-Graduação</td>
                            <td>201416585</td>
                            <td>
                               #29292 - Erro tal<br/>

                                #29292 - Erro tal<br/>
                            </td>
                          </tr>
                        </tbody>
                      </table>

                      <ul class="pagination pull-right">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                      </ul>

                      <!-- fim table aqui -->


                    </div>
                    <div class="panel-footer"><a href="#" class="btn btn-default"><i class="fa fa-print"></i> Imprimir Resultado</a></div>
                  </div>
                </div>
                 <div class="col-md-4">
                    <div class="panel panel-success">
                      <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-user"></i> Alunos em processados: <span class="numero-destaque ">300</span></h3> </div>
                      <div class="panel-body">
                        <!-- data table aqui -->
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Nome</th>
                            <th>Matrícula</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Lucas Coradini</td>
                            <td>201416585</td>
                          </tr>
                          <tr>
                            <td>Marcos almeida</td>
                            <td>201416585</td>
                          </tr>
                          <tr>
                            <td>Bruno Guimarães</td>
                            <td>201416585</td>
                          </tr>
                         <tr>
                            <td>Nome Muito Grande de Aluno Silva</td>
                            <td>201416585</td>
                          </tr>
                        </tbody>
                      </table>

                      <ul class="pagination pull-right">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                      </ul>

                      <!-- fim table aqui -->
                      </div>
                      <div class="panel-footer">
                       <p> <span class="alert alert-success prox-lot">Proximo lote: <b>10/10/10</b></span></p>
                       <p> Faltam <b>03</b> dias para a próxima remessa.</p> 
                      </div>
                    </div>
                  </div>
                </div> 
            </div>
             <!-- ####### lotes ########## -->
            <div class="tab-pane" id="Lotes">
              <h1  class="page-header">Lotes</h1>
              <div class="row" > 
                <div class="col-md-8">
                  <div class="panel panel-info">
                    <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-bell"></i> Em aberto</h3> </div>
                    <div class="panel-body">
                        <!-- data table aqui -->
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Nome</th>
                            <th>Matrícula</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Lucas Coradini</td>
                            <td>201416585</td>
                          </tr>
                          <tr>
                            <td>Marcos almeida</td>
                            <td>201416585</td>
                          </tr>
                          <tr>
                            <td>Bruno Guimarães</td>
                            <td>201416585</td>
                          </tr>
                         <tr>
                            <td>Nome Muito Grande de Aluno Silva</td>
                            <td>201416585</td>
                          </tr>
                        </tbody>
                      </table>

                      <ul class="pagination pull-right">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                      </ul>

                      <!-- fim table aqui -->
                    </div>
                    <div class="panel-footer">
                     <p> <span class="alert alert-info prox-lot">Proximo lote: <b>10/10/10</b></span> Faltam <b>03</b> dias para a próxima remessa.</p> 
                    </div>
                  </div>
                </div>  
                <div class="col-md-4">
                  <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-calendar"></i> Histórico</h3> </div>
                    <div class="panel-body">
                      <div class="qa-message-list" id="wallmessages">
                          
                          <!-- repeat time line -->
                          <div class="message-item" id="m16">
                          <div class="message-inner">
                            <div class="message-head clearfix">
                              <div class="avatar pull-left"><i class="fa fa-folder-o fa-2x"></i></div>
                              <div class="user-detail">
                                <h4 class="handle">Lote 45555666</h4>
                                <div class="post-meta">
                                </div>
                              </div>
                            </div>
                            <div class="qa-message-content">
                            <ul>
                              <li>Data de envio: 10/10/10</li>
                              <li >Alunos enviados: <span class="cor-info">234234</span></li>
                              <li >Alunos processados: <span class="cor-success">34423</span></li>
                              <li >Alunos com erro: <span class="cor-danger">23423</span></li>
                            </ul>
                            </div>
                        </div></div>
                        <!-- fim do repeat time line -->

                          <!-- repeat time line -->
                          <div class="message-item" id="m16">
                          <div class="message-inner">
                            <div class="message-head clearfix">
                              <div class="avatar pull-left"><i class="fa fa-folder-o fa-2x"></i></div>
                              <div class="user-detail">
                                <h4 class="handle">Lote 45555666</h4>
                                <div class="post-meta">
                                </div>
                              </div>
                            </div>
                            <div class="qa-message-content">
                            <ul>
                              <li>Data de envio: 10/10/10</li>
                              <li >Alunos enviados: <span class="cor-info">234234</span></li>
                              <li >Alunos processados: <span class="cor-success">34423</span></li>
                              <li >Alunos com erro: <span class="cor-danger">23423</span></li>
                            </ul>
                            </div>
                        </div></div>
                        <!-- fim do repeat time line -->

                      <ul class="pagination pull-right">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
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
                        <label for="exampleInputFile">Selecione o arquivo que deseja enviar:</label>
                        <input type="file" id="exampleInputFile">
                        <p class="help-block">O arquivo deve estar no formato .txt</p>
                      </div>
                      <button type="button" class="btn btn-success btn-lg btn-block">Upload</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <!-- Remessa -->
                  <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-pencil-square-o"></i> Opções</h3></div>
                    <div class="panel-body">
                      <form class="form-horizontal col-md-12" role="form">
                      <fieldset>

                        <div class="form-group">
                          <label for="InputName">Pasta destino das Fotos</label>
                          <div class="input-group">
                            <span class="input-group-addon">caminho/pasta/</span>
                            <input type="text" class="form-control" name="InputName" id="InputName" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="InputEmail">Email de retorno</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" class="form-control" id="InputEmail" name="InputEmail" required  >
                          </div>
                        </div>

                        <div class="form-group">
                            <div class="pull-right">
                              <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>

                      </fieldset>
                    </form>         
                    </div>
                  </div>
                  
                </div>  
              </div>  
            </div>
             <!-- ####### acesso ########## -->
            <div class="tab-pane" id="acesso">
              <h1  class="page-header">Acesso</h1>
                  <button class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-plus"></i> Novo
                  </button>
                  <h3>Usuários Cadastrados</h3>
                  
                  <div class="well">

                      <!-- criar loops aqui -->
                      <div class="row user-row">
                          <div class="col-xs-3 col-sm-2 col-md-1 col-lg-1">
                              <i class="fa fa-user fa-4x"></i>
                          </div>
                          <div class="col-xs-8 col-sm-9 col-md-10 col-lg-10">
                              <strong>Lucas Coradini</strong><br>
                              <span class="text-muted">Tipo: Administrator</span>
                          </div>
                          <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 dropdown-user" data-for="#id-user"> <!-- inserir id do usuario aqui -->
                              <i class="glyphicon glyphicon-chevron-down text-muted"></i>
                          </div>
                      </div>
                      <div class="row user-infos" id="id-user"> <!-- inserir id do usuario aqui -->
                          <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
                              <div class="panel panel-info">
                                  <div class="panel-heading">
                                      <h3 class="panel-title">Informações do usuário</h3>
                                  </div>
                                  <div class="panel-body">
                                      <div class="row">
                                          <div class="col-xs-10 col-sm-10 hidden-md hidden-lg">
                                              <strong>Lucas Coradini</strong><br>
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
                                              <strong>Lucas Coradini</strong><br>
                                              <table class="table table-user-information">
                                                  <tbody>
                                                  <tr>
                                                      <td>Tipo:</td>
                                                      <td>Administrator</td>
                                                  </tr>
                                                  <tr>
                                                      <td>E-mail:</td>
                                                      <td>email</td>
                                                  </tr>
                                                  <tr>
                                                      <td>Login</td>
                                                      <td>15</td>
                                                  </tr>
                                                  <tr>
                                                      <td>Senha</td>
                                                      <td>0</td>
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
                                                  data-original-title="Editar este usuário"><i class="glyphicon glyphicon-edit"></i></button>
                                          <button class="btn btn-sm btn-danger" type="button"
                                                  data-toggle="tooltip"
                                                  data-original-title="Remover este usuário"><i class="glyphicon glyphicon-remove"></i></button>
                                      </span>
                                  </div>
                              </div>
                          </div>
                      </div>
                     <!-- fim do loop -->


                      <!-- modal inserir novo -->
                     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Inserir novo usuário</h4>
                          </div>
                          <div class="modal-body">
                            <form accept-charset="UTF-8" role="form">
                              <fieldset>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Nome" name="email" type="text">
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
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-success">Inserir</button>
                          </div>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                     

                  </div> <!-- well -->
            </div>
          </div>
        </div><!-- col 12 -->
      </div><!-- row-->
    <footer>
    <hr>
    Desenvolvido por DTI - UVV
    </footer>  
    </div><!-- container -->
    <!-- JavaScript -->
    <script src="<?php echo CONTENT;?>js/jquery-1.10.2.js"></script>
    <script src="<?php echo CONTENT;?>js/bootstrap.min.js"></script>
    <script src="<?php echo CONTENT;?>js/script.js"></script>
</body>

</html>