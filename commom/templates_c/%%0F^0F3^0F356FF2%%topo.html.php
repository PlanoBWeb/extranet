<?php /* Smarty version 2.6.12, created on 2016-02-10 14:15:18
         compiled from admin/topo.html */ ?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon.ico">
    <meta name="robots" content="noindex, nofollow">
    <link href="commom/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="commom/css/template.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="commom/css/estilo.css">
    <script src="commom/assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="commom/js/funcoes.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://digitalbush.com/wp-content/uploads/2014/10/jquery.maskedinput.js"></script>
    <!-- Esse era o que estava  - se for usar tirar os 3 e deixar somente 3-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3333/jquery.min.js"></script>
    <!-- Esse era o que estava -->
    <title><?php echo $this->_tpl_vars['titulo']; ?>
 - ADM</title>
</head>
<body>
    <header>
        <div class="container-fluid">
            <div class="encapsula-topo-logo">
                <div class="topo-logo col-sm-12 col-md-4 col-lg-4">
                    <a class="navbar-brand" href="index.php"><img src="commom/img/logo.png" alt="logo PlanoBWeb" title="logo PlanoBWeb"></a>
                </div>
                <div class="starter-template col-sm-12 col-md-4 col-lg-4 top-espaco">
                    <h1 class="hidden-sm-down">Extranet PlanoBWeb</h1>
                </div>
                <form action="adm_cliente.php" method="get" name="search" class="none-desk">
                    <input type="hidden" name="acao" value="busca">
                    <input class="form-busca" type="search" name="busca" value="<?php echo $this->_tpl_vars['valorBusca']; ?>
" placeholder="busque o cliente">
                    <input class="envia-busca" type="submit" value="ok" name="gobusca">
                </form>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <p class="hello-user">Olá <?php echo $this->_tpl_vars['nome']; ?>
</p>
                </div>
            </div>
            <nav class="navbar navbar-light bg-faded navbar-fixed-top">
                <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">&#9776;</button>
                <div class="encapsula-navbar">
                    <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
                        <ul class="nav navbar-nav">
                        
                            <?php if ($this->_tpl_vars['menuPesUsuario']): ?>
                                <li class="nav-item active dropdown">
                                    <a class="nav-link dropdown-toggle" href="#">Usuários</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="adm_usuario.php?acao=pesquisar">Consultar</a>
                                        <?php if ($this->_tpl_vars['menuAddUsuario']): ?>
                                            <a class="dropdown-item" href="adm_usuario.php">Cadastrar</a>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endif; ?>

                            <?php if ($this->_tpl_vars['menuPesUsuario']): ?>
                                <li class="nav-item active dropdown">
                                    <a class="nav-link dropdown-toggle" href="#">Clientes</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="adm_cliente.php?acao=pesquisar">Consultar</a>
                                        <a class="dropdown-item" href="adm_cliente.php">Cadastrar</a>
                                        <a class="dropdown-item" href="adm_contato.php">Cadastrar Contato</a>
                                        <a class="dropdown-item" href="adm_anotacao.php">Cadastrar Anotação</a>
                                        <a class="dropdown-item" href="adm_historico.php">Cadastrar Histórico</a>
                                    </div>
                                </li>
                            <?php endif; ?>

                            <?php if ($this->_tpl_vars['menuPesUsuario']): ?>
                                <li class="nav-item active dropdown">
                                    <a class="nav-link dropdown-toggle" href="#">Contato</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="adm_contato.php?acao=pesquisar&p=contato">Consultar</a>
                                        <a class="dropdown-item" href="adm_contato.php">Cadastrar</a>
                                    </div>
                                </li>
                            <?php endif; ?>

                            <?php if ($this->_tpl_vars['menuPesUsuario']): ?>
                                <li class="nav-item active dropdown">
                                    <a class="nav-link dropdown-toggle" href="#">Fornecedores</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="adm_fornecedor.php?acao=pesquisar">Consultar</a>
                                        <a class="dropdown-item" href="adm_fornecedor.php">Cadastrar</a>
                                        <a class="dropdown-item" href="adm_contato_fornecedor.php">Cadastrar Contato</a>
                                    </div>
                                </li>
                            <?php endif; ?>

                            <?php if ($this->_tpl_vars['menuPesUsuario']): ?>
                                <!-- <li class="nav-item active dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Tarefas</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="adm_tarefa.php?acao=pesquisar">Consultar</a>
                                        <a class="dropdown-item" href="adm_tarefa.php">Cadastrar</a>
                                        <a class="dropdown-item" href="adm_tarefa.php?acao=painel">Painel</a>
                                    </div>
                                </li> -->
                            <?php endif; ?>

                            <!-- <li class="nav-item active dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Destaques</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="adm_destaque.php?acao=pesquisar">Consultar</a>
                                    <a class="dropdown-item" href="adm_destaque.php">Cadastrar</a>
                                </div>
                            </li> -->

                            <li class="nav-item">
                                <a class="nav-link" href="adm_usuario.php?acao=senha">Alterar Senha</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="adm_login.php?acao=logout">Sair</a>
                            </li>
                    
                          <!-- 
                          <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                          </li> -->
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>