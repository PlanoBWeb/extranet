<?php

include_once "adm_login.php";
include_once "classes/Usuario.class.php";
$class = new Usuario();

$smarty->assign("titulo", utf8_encode(TITULO));
$pagina = "usuario";

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

		if($retorno[1] == "Senha atual incorreta!"){
			$smarty->assign("redir", "adm_".$pagina.".php?acao=senha");
		}
		else{
			$smarty->assign("redir", "adm_".$pagina.".php");
		}

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

	$totalPorPagina = 4;
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
elseif( $_GET['acao'] == "editar" || $_GET['acao'] == "visualizar" || $_GET['acao'] == "senha")
{
	if($_GET['acao'] == "senha")
		$parametro['id'] = $_SESSION['id'];
	else
		$parametro['id'] = $_GET['id'];

	$retorno = $class->Pesquisar($parametro, null, null);
	
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
	elseif($_GET['acao'] == "senha")
		$smarty->display('admin/'.$pagina.'/senha.html');
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