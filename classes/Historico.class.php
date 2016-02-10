<?php

include_once "configs/funcoes.php";
include_once "classes/Cliente.class.php";
include_once "classes/Usuario.class.php";

class Historico
{
	function Historico()
    {
    	$this->entidade = "historico";
    }
	
	function Grava($post)
	{

		$retorno = array();

		$sql = "
			INSERT INTO
				".$this->entidade."
			SET
				idcliente 		= '".$post['cliente']."',
				idusuario		= '".$post['idUser']."',
				tipo 			= '".$post['tipoHist']."',
				titulo 			= '".utf8_decode($post['titulo'])."',
				descricao	 	= '".utf8_decode($post['descricao'])."',
				data 			= '".utf8_decode($post['data'])."'
		";
		
		$result = mysql_query($sql);
		if (!($result))
		{
			$retorno[0] = "1";
			$retorno[1] = "Erro ao executar a query. Classe = ".$this->entidade." - Metodo = grava";
			return $retorno;
		}
		else
		{
			$retorno[0] = 0;
			$retorno[1] = "Registro inserido com sucesso.";
			return $retorno;
		}
	}
	
	function Altera($post)
	{
		$retorno = array();

		$sql = "
			UPDATE	
				".$this->entidade."
			SET
				idcliente 		= '".$post['cliente']."',
				idusuario		= '".$post['idUser']."',
				tipo 			= '".$post['tipoHist']."',
				titulo 			= '".utf8_decode($post['titulo'])."',
				descricao	 	= '".utf8_decode($post['descricao'])."',
				data 			= '".utf8_decode($post['data'])."'
			WHERE
				id = '".$post['id']."'
		".$query;
	
		$result = mysql_query($sql);
		if (!($result))
		{
			$retorno[0] = "1";
			$retorno[1] = "Erro ao executar a query. Classe = ".$this->entidade." - Metodo = Alterar";
			return $retorno;
		}
		else
		{
			$retorno[0] = 0;
			$retorno[1] = "Alteração feita com sucesso!";
			return $retorno;
		}
	}
	
	function Pesquisar($post, $totalPorPagina, $pagina)
	{

		$query = "";
		
		if($post['id'])
		{
			$query .= " AND H.id = '".$post['id']."' ";
		}

		if($post['tpHist'])
		{
			$query .= " AND H.tipo = '".$post['tpHist']."' ";
		}

		if(!$post['tpHist'])
		{
			$group .= " GROUP BY H.tipo ";
		}

		if($post['idCliente'])
		{
			$query .= " AND H.idcliente = '".$post['idCliente']."' ";
		}

		$sqlLimit = "";
		if ($totalPorPagina) {

			$numero = $pagina-1;
			$_limit = $numero*$totalPorPagina;

			$sqlLimit = "LIMIT ".$_limit.",".$totalPorPagina."";
		}
		
		$retorno = array();
	
		$sql = "SELECT
					*, 
					C.id AS idCliente, C.empresa, H.id AS id, U.id AS idusuario, U.nome AS nomeUsuario
				FROM  
					".$this->entidade." H
				LEFT JOIN
					cliente C
				ON
					H.idcliente = C.id
				LEFT JOIN
					usuario U
				ON 
					H.idusuario = U.id
				WHERE
					1 = 1 ".$query."
				ORDER BY
					H.data desc

		".$sqlLimit." ";

		$result = mysql_query($sql);
		if (!($result))
		{
			$retorno[0] = "1";
			$retorno[1] = "Erro ao executar a query. Classe = ".$this->entidade." - Metodo = Pesquisar";
			return $retorno;
		}
		
		$i = 0;
		while( $rows = mysql_fetch_array($result) )
		{
			$dados[$i] = $rows;
			$dados[$i]['empresa'] 			= utf8_encode($rows['empresa']);
			$dados[$i]['nomeUsuario'] 		= utf8_encode($rows['nomeUsuario']);
			$dados[$i]['titulo'] 			= utf8_encode($rows['titulo']);
			$dados[$i]['descricao'] 		= utf8_encode($rows['descricao']);
			$dados[$i]['data_formatada']	= date('d/m/Y', strtotime($rows['data']));
			$dados[$i]['tipo'] 				= $this->tipoHistorico($rows['tipo']);
			$dados[$i]['tipoSigla'] 		= utf8_encode($rows['tipo']);
			$i++;
		}
	
		$retorno[0] = 0;
		$retorno[1] = $dados;
		return $retorno;
	}

	function tipoHistorico($nomeTipo){
		
		if($nomeTipo == "HA"){
			$nomeTipo = "Histórico Adwords";
		}elseif ($nomeTipo == "HS") {
			$nomeTipo = " Histórico SEO";
		}elseif ($nomeTipo == "HG") {
			$nomeTipo = "Histórico geral";
		}elseif ($nomeTipo == "HP") {
			$nomeTipo = "Histórico produção";
		}

		return $nomeTipo;
	}
	
	function Exclui($id)
	{
		$retorno = array();

		$sql = "
			DELETE FROM	
				".$this->entidade."
			WHERE
				id = '".$id."'
		".$query;

		$result = mysql_query($sql);
		if (!($result))
		{
			$retorno[0] = "1";
			$retorno[1] = "Erro ao executar a query. Classe = ".$this->entidade." - Metodo = Exclui";
			return $retorno;
		}
		
		$retorno[0] 		= 0;
		$retorno[1]			= "Exclusão feita com sucesso!";
		return $retorno;
	}

}

