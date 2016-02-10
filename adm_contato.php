<?php

include_once "adm_login.php";
include_once "classes/Contato.class.php";
include_once "classes/Cliente.class.php";
$class 			= new Contato();
$classCliente 	= new Cliente();
$pagina = "contato";

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
		//$smarty->assign("redir", "adm_cliente.php?acao=visualizar&id=".$_POST['idcliente']."");
		$smarty->assign("redir", "adm_contato.php?acao=visualizar&id=".$_POST['id']."&idcliente=".$_POST['idcliente']."");
	}
	else{
		$smarty->assign("redir", "adm_contato.php?acao=pesquisar");
	}
	
	$smarty->display("mensagem.html");
	exit();
}
elseif( $_GET['acao'] == "pesquisar" )
{

	$_POST['idCliente'] = $_GET['idCliente'];
	$_POST['cliente']	= $_GET['p'];
	$retorno = $class->Pesquisar($_POST);

	if( $retorno[0] )
	{
		$smarty->assign("mensagem", $retorno[1]);
		$smarty->assign("redir", "adm_".$pagina.".php");
		$smarty->display("mensagem.html");
		exit();
	}

	if ($_GET['p']) {
		$smarty->assign("valorPagina", 1);	
	}else{
		$smarty->assign("valorPagina", 0);
	}
	
	$smarty->assign("dadosContato", $retorno[1]);
	$smarty->display('admin/cliente/relacao-contato.html');
	exit;
}
elseif( $_GET['acao'] == "editar" || $_GET['acao'] == "visualizar")
{

	$parametro['id']		= $_GET['id'];
	$parametro['idContato'] = $_GET['idContato'];
	$retorno = $class->Pesquisar($parametro);

	$retornoCliente = $classCliente->Pesquisar($parametro, null, null);
	$idCliente = $retorno[1][0]['idcliente'];

	if( $retorno[0] )
	{
		$smarty->assign("mensagem", $retorno[1]);
		$smarty->assign("redir", "adm_".$pagina.".php");
		$smarty->display("mensagem.html");
		exit();
	}

	$smarty->assign("existeIdCliente", 	$_GET['idcliente']);
	$smarty->assign("existeId", 		$_GET['id']);
	$smarty->assign("idCliente", $idCliente);
	$smarty->assign("dadosCliente", $retornoCliente[1]);
	$smarty->assign("dados", $retorno[1]);
	$smarty->assign("botao", "Alterar");

	if($_GET['acao'] == "visualizar")
		$smarty->display('admin/cliente/ver-contato.html');
	else
		$smarty->display('admin/cliente/dados-contato.html');
	exit;
}
elseif( $_GET['acao'] == "exclui" )
{
	$parametro['idExcluir'] = $_GET['id'];
	$retornoCliente = $class->Pesquisar($parametro);

	$parametro['id'] = $_GET['id'];
	$retorno = $class->Exclui($parametro);
	
	$smarty->assign("mensagem", utf8_encode($retorno[1]));
	if ($_GET['p']) {
		$smarty->assign("redir", "adm_contato.php?acao=pesquisar");
	}else{
		$smarty->assign("redir", "adm_cliente.php?acao=visualizar&id=".$retornoCliente[1][0]['idcliente']."");
	}
	
	$smarty->display("mensagem.html");
	exit();
}

$retornoCliente = $classCliente->Pesquisar($_POST, null, null);

$smarty->assign("botao", "Gravar");
$smarty->assign("dadosCliente", $retornoCliente[1]);
$smarty->display('admin/cliente/dados-contato.html');

?>