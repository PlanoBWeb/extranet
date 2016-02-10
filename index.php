<?php

	include_once "adm_login.php";

	$smarty->assign("titulo", utf8_encode(TITULO));
	$smarty->assign("nome", $_SESSION['nome']);
	$smarty->assign("perfil", $_SESSION['perfil']);
	$smarty->assign("tipoUserLogado", $_SESSION['tipo']);
	$smarty->display("admin/index.html");

?>