<?php

session_start();
$lPermissao		= $_SESSION['perfil'];

//Checa se o usuário está logado
if($lPermissao)
{
	// ============================= LÓGICA =============================

	//Resgata PÁGINA
	$pastaProjeto	= "extranet/";
	$urlCompleta 	= $_SERVER['REQUEST_URI'];
	$posInicio		= strpos($urlCompleta, $pastaProjeto);
	$priimeiraEtapa	= substr($urlCompleta, ($posInicio+strlen($pastaProjeto)));
	if(strpos($priimeiraEtapa, "?"))
	{
		$posFinal		= strpos($priimeiraEtapa, "?");
		$pagina			= substr($priimeiraEtapa,0,$posFinal);
	}
	else
	{
		$pagina			= $priimeiraEtapa;
	}

	//Resgata AÇÃO

	

	$acao 		= "cadastrar";
	$strAcao	= "acao=";
	if(strpos($urlCompleta, $strAcao))
	{
		$acao = substr($urlCompleta, strpos($urlCompleta, $strAcao) + strlen($strAcao));

		if(strpos($acao, "&"))
		{
			$acao = substr($acao, 0, strpos($acao, "&"));
		}
	}

	if ($pagina == "") {
		$pagina = "index";
	}else{
		$pagina = str_replace(".php", "", $pagina);	
	}
	// ============================= FIM - LÓGICA =============================

	if($acao != "logout")
	{
		// ============================= ARRAY DE PERMISSÃO =============================

		// Permissões disponíveis
		// - A - Administrador
		// - M - Marketing
		// - F - Financeiro
		// - D - Desenvolvimento

		// POSSÍVEIS AÇÕES:
		// cadastrar - Formulário de cadastro
		// gravar - Grava tanto alterações quanto inclusões no BD
		// pesquisar - Relação de registros
		// editar - Formulário de edição
		// exclui - Excluir registro do BD


		$permissao['adm_usuario']['cadastrar'] 		= array("A");
		$permissao['adm_usuario']['editar'] 		= array("A");
		$permissao['adm_usuario']['pesquisar'] 		= array("A");
		$permissao['adm_usuario']['exclui'] 		= array("A");
		$permissao['adm_usuario']['senha'] 			= array("A");
		$permissao['adm_usuario']['visualizar']		= $permissao['adm_usuario']['pesquisar'];
		$permissao['adm_usuario']['gravar'] 		= $permissao['adm_usuario']['editar'];


		$permissao['adm_cliente']['cadastrar'] 		= array("A","M","F");
		$permissao['adm_cliente']['editar'] 		= array("A","M","F","D");
		$permissao['adm_cliente']['busca'] 			= array("A","M","F","D");
		$permissao['adm_cliente']['pesquisar'] 		= array("A");
		$permissao['adm_cliente']['exclui'] 		= array("A");
		$permissao['adm_cliente']['visualizar']		= $permissao['adm_cliente']['pesquisar'];
		$permissao['adm_cliente']['gravar'] 		= $permissao['adm_cliente']['editar'];

		$permissao['adm_anotacao']['cadastrar'] 	= array("A","M","F");
		$permissao['adm_anotacao']['editar'] 		= array("A","M","F","D");
		$permissao['adm_anotacao']['pesquisar'] 	= array("A");
		$permissao['adm_anotacao']['exclui'] 		= array("A");
		$permissao['adm_anotacao']['visualizar']	= $permissao['adm_anotacao']['pesquisar'];
		$permissao['adm_anotacao']['gravar'] 		= $permissao['adm_anotacao']['editar'];

		$permissao['adm_contato']['cadastrar'] 		= array("A","M","F");
		$permissao['adm_contato']['editar'] 		= array("A","M","F","D");
		$permissao['adm_contato']['pesquisar'] 		= array("A");
		$permissao['adm_contato']['exclui'] 		= array("A");
		$permissao['adm_contato']['visualizar']		= $permissao['adm_contato']['pesquisar'];
		$permissao['adm_contato']['gravar'] 		= $permissao['adm_contato']['editar'];

		$permissao['adm_fornecedor']['cadastrar'] 			= array("A","M","F");
		$permissao['adm_fornecedor']['editar'] 				= array("A","M","F","D");
		$permissao['adm_fornecedor']['pesquisar'] 			= array("A");
		$permissao['adm_fornecedor']['exclui'] 				= array("A");
		$permissao['adm_fornecedor']['visualizar']			= $permissao['adm_fornecedor']['pesquisar'];
		$permissao['adm_fornecedor']['gravar'] 				= $permissao['adm_fornecedor']['editar'];

		$permissao['adm_contato_fornecedor']['cadastrar'] 	= array("A","M","F");
		$permissao['adm_contato_fornecedor']['editar'] 		= array("A","M","F","D");
		$permissao['adm_contato_fornecedor']['pesquisar'] 	= array("A");
		$permissao['adm_contato_fornecedor']['exclui'] 		= array("A");
		$permissao['adm_contato_fornecedor']['visualizar']	= $permissao['adm_contato_fornecedor']['pesquisar'];
		$permissao['adm_contato_fornecedor']['gravar'] 		= $permissao['adm_contato_fornecedor']['editar'];

		$permissao['adm_tarefa']['cadastrar'] 		= array("A","M","F");
		$permissao['adm_tarefa']['editar'] 			= array("A","M","F","D");
		$permissao['adm_tarefa']['pesquisar'] 		= array("A");
		$permissao['adm_tarefa']['exclui'] 			= array("A");
		$permissao['adm_tarefa']['visualizar']		= $permissao['adm_tarefa']['pesquisar'];
		$permissao['adm_tarefa']['painel']			= $permissao['adm_tarefa']['pesquisar'];
		$permissao['adm_tarefa']['gravar'] 			= $permissao['adm_tarefa']['editar'];

		$permissao['adm_historico']['cadastrar'] 		= array("A","M","F");
		$permissao['adm_historico']['editar'] 			= array("A","M","F","D");
		$permissao['adm_historico']['pesquisar'] 		= array("A");
		$permissao['adm_historico']['exclui'] 			= array("A");
		$permissao['adm_historico']['visualizar']		= $permissao['adm_historico']['pesquisar'];
		$permissao['adm_historico']['gravar'] 			= $permissao['adm_historico']['editar'];



		// ============================= FIM - ARRAY DE PERMISSÃO =============================


		if($pagina != "index")
		{
			// echo "<br>PAGINA -->" . $pagina;
			// echo "<br>AÇÃO -->" . $acao;
			if(!in_array($lPermissao, $permissao[$pagina][$acao]))
			{
				$smarty->assign("mensagem", utf8_encode("Você não tem permissão para acessar essa área!"));
				$smarty->assign("redir", "index.php");
				$smarty->display("mensagem.html");
				exit();
			}

		}

		$smarty->assign("nome", $_SESSION['nome']);
		$smarty->assign("perfil", $_SESSION['perfil']);

		$smarty->assign("menuPesUsuario", in_array($lPermissao, $permissao['adm_usuario']['pesquisar']));
		$smarty->assign("menuAddUsuario", in_array($lPermissao, $permissao['adm_usuario']['cadastrar']));
		$smarty->assign("menuExcUsuario", in_array($lPermissao, $permissao['adm_usuario']['exclui']));
		$smarty->assign("menuEdiUsuario", in_array($lPermissao, $permissao['adm_usuario']['editar']));
	}

	
}

?>