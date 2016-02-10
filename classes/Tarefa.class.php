<?php

include_once "configs/funcoes.php";
include_once "classes/Contato_fornecedor.class.php";

class Tarefa
{
	function Tarefa()
    {
    	$this->entidade = "tarefa";
    }
	
	function Grava($post)
	{

		$retorno = array();

		$sql = "
			INSERT INTO
				".$this->entidade."
			SET
				idcliente 		= '".$post['cliente']."',
				idusuario 		= '".$post['idUser']."',
				status 			= '".$post['status']."',
				tarefa_lembrete = '".$post['tarefa_lembrete']."',
				titulo 			= '".utf8_decode($post['titulo'])."',
				data_inicio 	= '".utf8_decode($post['data_inicio'])."',
				data_fim	 	= ".($post['data_fim'] ? "'".$post['data_fim']."'" : 'null').",
				descricao	 	= '".utf8_decode($post['descricao'])."',
				lembrar	 		= '".$post['lembrar']."'
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
				idusuario 		= '".$post['idUser']."',
				status 			= '".$post['status']."',
				tarefa_lembrete = '".$post['tarefa_lembrete']."',
				titulo 			= '".utf8_decode($post['titulo'])."',
				data_inicio 	= '".utf8_decode($post['data_inicio'])."',
				data_fim	 	= ".($post['data_fim'] ? "'".$post['data_fim']."'" : 'null').",
				descricao	 	= '".utf8_decode($post['descricao'])."',
				lembrar	 		= '".$post['lembrar']."'
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
			$query .= " AND id = '".$post['id']."' ";
		}

		if($post['idusuario'])
		{
			$query .= " AND idusuario = '".$post['idusuario']."' ";
		}

		$sqlLimit = "";
		if ($totalPorPagina) {

			$numero = $pagina-1;
			$_limit = $numero*$totalPorPagina;

			$sqlLimit = "LIMIT ".$_limit.",".$totalPorPagina."";
		}
		
		$retorno = array();
	
		$sql = "SELECT
					*
				FROM  
					".$this->entidade." 
				WHERE
					1 = 1 ".$query."
				ORDER BY
					tarefa_lembrete

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
			$dados[$i]['titulo'] 				= utf8_encode($rows['titulo']);
			$dados[$i]['descricao'] 			= utf8_encode($rows['descricao']);
			$dados[$i]['data_fim_formatada']	= date('d/m/y', strtotime($rows['data_fim']));
			$dados[$i]['data_inicio_formatada']	= date('d/m/y', strtotime($rows['data_inicio']));
			$dados[$i]['tarefa_lembrete_sigla'] = utf8_encode($rows['tarefa_lembrete']);
			$dados[$i]['tarefa_lembrete']		= $this->exibeTarefa($rows['tarefa_lembrete']);

			//Trata o status
			if($rows['status'] == "A")
			{
				$dados[$i]['statusFormat']		= "Em Aberta";
			}
			else if($rows['status'] == "P")
			{
				$dados[$i]['statusFormat']		= "Parada";
			}
			else
			{
				$dados[$i]['statusFormat']		= "Finalizada";
			}

			$i++;
		}
	
		$retorno[0] = 0;
		$retorno[1] = $dados;
		return $retorno;
	}

	function PesquisarFiltro($post)
	{

		$query = "";

		if($post['usuario_filtro'])
		{
			$query .= " AND T.idusuario = '".$post['usuario_filtro']."' ";
		}else{
			$query .= " AND T.idusuario = '".$post['idUser']."' ";
		}		
		
		if($post['tarefa_lembrete'])
		{
			$query .= " AND T.tarefa_lembrete = '".$post['tarefa_lembrete']."' ";
		}

		if($post['cliente_filtro'])
		{
			$query .= " AND C.id = '".$post['cliente_filtro']."' ";
		}

		if($post['data_inicio'] != "1969/12/31" &&  $post['data_inicio'] != "") 
		{
			$query .= " AND T.data_inicio = '".$post['data_inicio']."' ";
		}

		if($post['data_fim'] != "1969/12/31" &&  $post['data_fim'] != "") 
		{
			$query .= " AND T.data_fim = '".$post['data_fim']."' ";
		}
		
		$retorno = array();
	
		$sql = "SELECT
					*
				FROM  
					".$this->entidade." T
				LEFT JOIN
					cliente C	
				ON 
					C.id = T.idcliente			
				WHERE
					1 = 1 ".$query."
				ORDER BY
					T.tarefa_lembrete
		";

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
			$dados[$i]['titulo'] 				= utf8_encode($rows['titulo']);
			$dados[$i]['descricao'] 			= utf8_encode($rows['descricao']);
			$dados[$i]['data_fim_formatada']	= date('d/m/y', strtotime($rows['data_fim']));
			$dados[$i]['data_inicio_formatada']	= date('d/m/y', strtotime($rows['data_inicio']));
			$dados[$i]['tarefa_lembrete_sigla'] = utf8_encode($rows['tarefa_lembrete']);
			$dados[$i]['tarefa_lembrete']		= $this->exibeTarefa($rows['tarefa_lembrete']);
			$i++;
		}
	
		$retorno[0] = 0;
		$retorno[1] = $dados;
		return $retorno;
	}

	

	function exibeTarefa($nomeServico){
		
		if($nomeServico == "TAR"){
			$nomeServico = "Tarefa";
		}elseif ($nomeServico == "LEM") {
			$nomeServico = "Lembrete";
		}
		return $nomeServico;
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
		
		$retorno[0] = 0;
		$retorno[1] = "Exclusão feita com sucesso!";
		return $retorno;
	}

}

