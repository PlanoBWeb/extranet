<?php

include_once "adm_login.php";
include_once "classes/Cliente.class.php";
include_once "classes/Contato.class.php";
include_once "classes/Anotacao.class.php";
include_once "classes/Tipo_anotacao.class.php";
$class = new Cliente();
$classContato 	= new Contato();
$classAnotacao  = new Anotacao();
$classExternaTipo 	= new Tipo_anotacao();
$pagina = "cliente";

$smarty->assign("titulo", utf8_encode(TITULO));

if( $_POST['acao'] == "gravar" )
{
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
	$retornoPag = $class->Pesquisar($_POST, null, null);

	$totalPorPagina = 10;
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
// Busca
elseif( $_GET['acao'] == "busca" )
{

	$parametro = $_GET['busca'];
	//  Paginação
	$retornoPag = $class->Busca($parametro, null, null);

	$totalPorPagina = 10;
	$totalDeRegistros = count($retornoPag[1]);
	$conta = $totalDeRegistros / $totalPorPagina;
	$totalPaginas = ceil($conta);
	//  Fim Paginação

	$_GET['p'] = (!$_GET['p'] ? 1 : $_GET['p']);

	$retorno = $class->Busca($parametro, $totalPorPagina, $_GET['p']);

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

	$valorBusca = $_GET['busca'];
	$smarty->assign("valorBusca", $valorBusca);
	$smarty->assign("Numpaginas", $Numpaginas);
	$smarty->assign("totalPaginas", $totalPaginas);
	$smarty->assign("dados", $retorno[1]);
	$smarty->display('admin/'.$pagina.'/relacao.html');
	exit;
}
// Busca
elseif( $_GET['acao'] == "editar" || $_GET['acao'] == "visualizar")
{

	$parametro['id'] = $_GET['id'];
	$retorno = $class->Pesquisar($parametro, null, null);

	$parametroContato['idCliente'] = $_GET['id'];
	$retornoContato = $classContato->Pesquisar($parametroContato);

	$parametroAnotacao['idCliente'] = $_GET['id'];
	$retornoAnotacao 	= $classAnotacao->Pesquisar($parametroAnotacao);
	$retornoTipo		= $classExternaTipo->Pesquisar($parametroAnotacao);

	if( $retorno[0] )
	{
		$smarty->assign("mensagem", $retorno[1]);
		$smarty->assign("redir", "adm_".$pagina.".php");
		$smarty->display("mensagem.html");
		exit();
	}
	
	$smarty->assign("dadosTipo", $retornoTipo[1]); 
	$smarty->assign("dados", $retorno[1]);
	$smarty->assign("dadosContato", $retornoContato[1]);
	$smarty->assign("dadosAnotacao", $retornoAnotacao[1]);
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

$smarty->assign("botao", "Gravar");
$smarty->display('admin/'.$pagina.'/dados.html');

?>