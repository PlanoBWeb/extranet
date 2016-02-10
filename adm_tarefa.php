<?php

include_once "adm_login.php";
include_once "classes/Tarefa.class.php";
include_once "classes/Cliente.class.php";
include_once "classes/Usuario.class.php";
$class 				 = new Tarefa();
$classExterna 		 = new Cliente();
$classExternaUsuario = new Usuario();

$pagina = "tarefa";

$smarty->assign("titulo", utf8_encode(TITULO));

if( $_POST['acao'] == "gravar" )
{

	$_POST['idUser'] = $_SESSION['id'];

	if( $_POST['id'] ){
		$retorno = $class->Altera($_POST);
	}
	else{
		$retorno = $class->Grava($_POST);
	}

	if( $retorno[0] )
	{
		$smarty->assign("mensagem", $retorno[1]);
		$smarty->assign("redir", "adm_".$pagina.".php");
		$smarty->display("mensagem.html");
		exit();
	}

	$smarty->assign("mensagem", utf8_encode($retorno[1]));
	$smarty->assign("redir", "adm_".$pagina.".php?acao=pesquisar");
	$smarty->display("mensagem.html");
	exit();
}
elseif( $_GET['acao'] == "pesquisar" )
{
	//  Paginação
	session_start();
	$_POST['idusuario'] = $_SESSION['id'];
	$retornoPag = $class->Pesquisar($_POST, null, null);

	$totalPorPagina = 2;
	$totalDeRegistros = count($retornoPag[1]);
	$conta = $totalDeRegistros / $totalPorPagina;
	$totalPaginas = ceil($conta);
	//  Fim Paginação

	$_GET['p'] = (!$_GET['p'] ? 1 : $_GET['p']);

	$retorno = $class->Pesquisar($_POST, $totalPorPagina, $_GET['p']);

	if( $retorno[0] )
	{
		$smarty->assign("mensagem", $retorno[1]);
		$smarty->assign("redir", "adm_".$pagina.".php");
		$smarty->display("mensagem.html");
		exit();
	}

	$Numpaginas = array();
	for($j=0; $j <= $totalPaginas; $j++) { 
		$Numpaginas[$j] = $j;
	}

	$smarty->assign("Numpaginas", $Numpaginas);
	$smarty->assign("totalPaginas", $totalPaginas);
	$smarty->assign("dados", $retorno[1]);
	$smarty->display('admin/'.$pagina.'/relacao.html');
	exit;
}
elseif( $_GET['acao'] == "editar" || $_GET['acao'] == "visualizar")
{

	$parametro['id'] = $_GET['id'];
	$retorno = $class->Pesquisar($parametro, null, null);

	$retornoCliente = $classExterna->Pesquisar($_POST, null, null);
	$smarty->assign("dadosCliente", $retornoCliente[1]);

	if( $retorno[0] )
	{
		$smarty->assign("mensagem", $retorno[1]);
		$smarty->assign("redir", "adm_".$pagina.".php");
		$smarty->display("mensagem.html");
		exit();
	}
	
	$smarty->assign("dados", $retorno[1]);
	$smarty->assign("botao", "Alterar");

	if($_GET['acao'] == "visualizar")
		$smarty->display('admin/'.$pagina.'/ver.html');
	else
		$smarty->display('admin/'.$pagina.'/dados.html');
	exit;
}
elseif( $_GET['acao'] == "exclui" )
{
	
	$retorno = $class->Exclui($_GET['id']);
	
	$smarty->assign("mensagem", utf8_encode($retorno[1]));
	$smarty->assign("redir", "adm_".$pagina.".php?acao=pesquisar");
	$smarty->display("mensagem.html");
	exit();
}
elseif( $_GET['acao'] == "painel")
{


	$_POST['idUser'] = $_SESSION['id'];

	$retornoCliente = $classExterna->Pesquisar($_POST, null, null);
	$retornoUsuario = $classExternaUsuario->Pesquisar(null, null, null);
	$retorno 		= $class->PesquisarFiltro($_POST);
	
	if( $retorno[0] )
	{
		$smarty->assign("mensagem", $retorno[1]);
		$smarty->assign("redir", "adm_".$pagina.".php");
		$smarty->display("mensagem.html");
		exit();
	}
	// Post Form
	$smarty->assign("form_cliente", $_POST['cliente_filtro']);
	$smarty->assign("form_tar_lem", $_POST['tarefa_lembrete']);
	$smarty->assign("form_usuario", $_POST['usuario_filtro']);
	$smarty->assign("form_data_inicio", $_POST['data_inicio']);
	$smarty->assign("form_data_fim", $_POST['data_fim']);
	// Fim Post Form
	$smarty->assign("clientes", $retornoCliente[1]);
	$smarty->assign("usuarios", $retornoUsuario[1]);
	$smarty->assign("dados", $retorno[1]);
	$smarty->display('admin/'.$pagina.'/painel.html');
	exit;
}

$retornoCliente = $classExterna->Pesquisar($_POST, null, null);

$smarty->assign("botao", "Gravar");
$smarty->assign("dadosCliente", $retornoCliente[1]);

$smarty->display('admin/'.$pagina.'/dados.html');

?>