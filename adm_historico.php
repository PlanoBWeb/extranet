<?php

include_once "adm_login.php";
include_once "classes/Historico.class.php";
include_once "classes/Cliente.class.php";
$class 				 = new Historico();
$classExterna 		 = new Cliente();

$pagina = "historico";

$smarty->assign("titulo", utf8_encode(TITULO));

if( $_POST['acao'] == "gravar" )
{

	$_POST['idUser'] = $_SESSION['id'];
	$idCliente = $_POST['cliente'];

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
	$smarty->assign("redir", "adm_".$pagina.".php?acao=pesquisar&id=".$idCliente."");
	$smarty->display("mensagem.html");
	exit();
}
elseif( $_GET['acao'] == "pesquisar" )
{
	//  Paginação
	$retornoPag = $class->Pesquisar($_POST, null, null);

	$totalPorPagina = 10;
	$totalDeRegistros = count($retornoPag[1]);
	$conta = $totalDeRegistros / $totalPorPagina;
	$totalPaginas = ceil($conta);
	//  Fim Paginação

	$_GET['p'] = (!$_GET['p'] ? 1 : $_GET['p']);

	$_POST['idCliente'] = $_GET['id'];
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

	$parametro['id'] 		= $_GET['id'];
	$parametro['tpHist'] 	= $_GET['tpHist'];
	$parametro['idCliente']	= $_GET['idCliente'];
	$retorno = $class->Pesquisar($parametro, null, null);

	$retornoCliente = $classExterna->Pesquisar($_POST, null, null);
	$smarty->assign("dadosCliente", $retornoCliente[1]);
	
	// echo "<pre>";
	// print_r($retornoUsuario);
	// die();
	
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
	//Descobre ID do cliente
	$parametro['id'] = $_GET['id'];
	$retornoIdCliente = $class->Pesquisar($parametro, null, null);
	if( $retornoIdCliente[0] )
	{
		$smarty->assign("mensagem", $retornoIdCliente[1]);
		$smarty->assign("redir", "adm_".$pagina.".php");
		$smarty->display("mensagem.html");
		exit();
	}
	$idCliente = $retornoIdCliente[1][0]['idcliente'];

	//Exclui Historico
	$retorno = $class->Exclui($_GET['id']);
	if( $retorno[0] )
	{
		$smarty->assign("mensagem", $retorno[1]);
		$smarty->assign("redir", "adm_".$pagina.".php");
		$smarty->display("mensagem.html");
		exit();
	}

	$smarty->assign("mensagem", utf8_encode($retorno[1]));
	$smarty->assign("redir", "adm_".$pagina.".php?acao=pesquisar&id=".$idCliente."");
	$smarty->display("mensagem.html");
	exit();
}

$retornoCliente = $classExterna->Pesquisar($_POST, null, null);

$dataAtual=date("Y-m-d");
$smarty->assign("dataAtual", $dataAtual);
$smarty->assign("botao", "Gravar");
$smarty->assign("dadosCliente", $retornoCliente[1]);

$smarty->display('admin/'.$pagina.'/dados.html');

?>