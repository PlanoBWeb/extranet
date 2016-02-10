<?php
include_once "adm_login.php";
include_once "classes/Anotacao.class.php";
include_once "classes/Cliente.class.php";
include_once "classes/Tipo_anotacao.class.php";
$class 				= new Anotacao();
$classExterna 		= new Cliente();
$classExternaTipo 	= new Tipo_anotacao();
$pagina = "anotacao";

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
	if( $retorno['idCliente'] ){
		$smarty->assign("redir", "adm_cliente.php?acao=visualizar&id=".$retorno['idCliente']."");
	}
	else{
		$smarty->assign("redir", "adm_".$pagina.".php?acao=pesquisar");
	}
	$smarty->display("mensagem.html");
	exit();
}
elseif( $_GET['acao'] == "editar" || $_GET['acao'] == "visualizar")
{

	$parametro['id']	= $_GET['id'];
	$parametro['idAnotacao'] = $_GET['idAnotacao'];
	$parametro['idAnota'] = $_GET['idAnota'];

	$retorno 		= $class->Pesquisar($parametro);
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
		$smarty->display('admin/cliente/ver-'.$pagina.'.html');
	else
		$smarty->display('admin/cliente/dados-'.$pagina.'.html');
	exit;
}
elseif( $_GET['acao'] == "pesquisar" )
{

	$parametro['idAnota'] = $_GET['idAnota'];
	$parametro['idCliente'] = $_GET['id'];
	$retorno = $class->Pesquisar($parametro);

	if( $retorno[0] )
	{
		$smarty->assign("mensagem", $retorno[1]);
		$smarty->assign("redir", "adm_".$pagina.".php");
		$smarty->display("mensagem.html");
		exit();
	}

	$smarty->assign("dados", $retorno[1]);
	$smarty->display('admin/cliente/relacao-'.$pagina.'.html');
	exit;
}
elseif( $_GET['acao'] == "exclui" )
{
	$parametro['idExcluir'] = $_GET['id'];
	$retornoCliente = $class->Pesquisar($parametro);

	$parametro['id'] = $_GET['id'];
	
	$retorno = $class->Exclui($parametro);
	
	$smarty->assign("mensagem", utf8_encode($retorno[1]));
	$smarty->assign("redir", "adm_".$pagina.".php?acao=visualizar&id=".$retornoCliente[1][0]['idcliente']."");
	$smarty->display("mensagem.html");
	exit();
}

$retornoCliente = $classExterna->Pesquisar($_POST, null, null);
$retorno 		= $classExternaTipo->Pesquisar($_POST);

$idClienteAnota = $_GET['id'];
$smarty->assign("idClienteAnota", $idClienteAnota);
$smarty->assign("botao", "Gravar");
$smarty->assign("dadosCliente", $retornoCliente[1]);
$smarty->assign("dadosTipo", $retorno[1]);
$smarty->display('admin/cliente/dados-'.$pagina.'.html');

?>