<?php

include_once "adm_login.php";
include_once "classes/Contato_fornecedor.class.php";
include_once "classes/Fornecedor.class.php";
$class 			= new Contato_fornecedor();
$classExterna 	= new Fornecedor();
$pagina = "fornecedor";

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
	if( $_POST['id'] ){
		$smarty->assign("redir", "adm_fornecedor.php?acao=visualizar&id=".$_POST['idfornecedor']."");
	}
	else{
		$smarty->assign("redir", "adm_fornecedor.php?acao=pesquisar");
	}
	$smarty->display("mensagem.html");
	exit();
}
elseif( $_GET['acao'] == "pesquisar" )
{	

	$_POST['idfornecedor']	= $_GET['id'];
	$retorno = $class->Pesquisar($_POST);

	if( $retorno[0] )
	{
		$smarty->assign("mensagem", $retorno[1]);
		$smarty->assign("redir", "adm_".$pagina.".php");
		$smarty->display("mensagem.html");
		exit();
	}
	$smarty->assign("dados", $retorno[1]);
	$smarty->display('admin/fornecedor/relacao-contato-fornecedor.html');
	exit;
}
elseif( $_GET['acao'] == "editar" || $_GET['acao'] == "visualizar")
{

	$parametro['idContato']	= $_GET['id'];
	// $parametro['idContato'] = $_GET['idContato'];
	$retorno = $class->Pesquisar($parametro);

	$retornoExterna = $classExterna->Pesquisar($parametro, null, null);

	if( $retorno[0] )
	{
		$smarty->assign("mensagem", $retorno[1]);
		$smarty->assign("redir", "adm_".$pagina.".php");
		$smarty->display("mensagem.html");
		exit();
	}

	$smarty->assign("dadosCliente", $retornoExterna[1]);
	$smarty->assign("dados", $retorno[1]);
	$smarty->assign("botao", "Alterar");

	if($_GET['acao'] == "visualizar")
		$smarty->display('admin/fornecedor/ver-contato.html');
	else
		$smarty->display('admin/fornecedor/dados-contato.html');
	exit;
}
elseif( $_GET['acao'] == "exclui" )
{
	$parametro['idExcluir'] = $_GET['id'];
	$retornoExterna = $class->Pesquisar($parametro);

	$parametro['id'] = $_GET['id'];
	
	$retorno = $class->Exclui($parametro);
	
	$smarty->assign("mensagem", utf8_encode($retorno[1]));
	$smarty->assign("redir", "adm_fornecedor.php?acao=visualizar&id=".$retornoExterna[1][0]['idfornecedor']."");
	$smarty->display("mensagem.html");
	exit();
}

$retornoExterna = $classExterna->Pesquisar($_POST, null, null);

$smarty->assign("botao", "Gravar");
$smarty->assign("dadosCliente", $retornoExterna[1]);
$smarty->display('admin/fornecedor/dados-contato.html');

?>