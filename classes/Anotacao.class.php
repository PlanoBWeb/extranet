<?php

include_once "configs/funcoes.php";
include_once "classes/Tipo_anotacao.class.php";
include_once "classes/Cliente.class.php";

class Anotacao
{
	function Anotacao()
    {
    	$this->entidade = "anotacao";
    	$classExternaTipo 	= new Tipo_anotacao();
    	$this->classExternaTipo = $classExternaTipo;
    }
	
	function Grava($post)
	{
		$retorno = array();

		if( $post['tipo']  == "outros"){
			$retorno = $this->classExternaTipo->Grava($post);
			if($retorno['tipo'] == ""){
				$retorno[0] = "1";
				$retorno[1] = "Nome do tipo já existe em nossa base de dados!";
				$retorno['tipo'] = $retorno['tipo'];
				return $retorno;
			}
		}

		if ($retorno['tipo'] == "") {
			$post['tipo'] = $post['tipo'];
		}else{
			$post['tipo'] = $retorno['tipo'];	
		}

		$sql = "
			INSERT INTO
				".$this->entidade."
			SET
				idcliente	= '".$post['cliente']."',
				idtipo		= '".$post['tipo']."',
				titulo 		= '".utf8_decode($post['titulo'])."',
				descricao 	= '".utf8_decode($post['descricao'])."'
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
			$retorno[0] 		= 0;
			$retorno[1] 		= "Registro inserido com sucesso.";
			$retorno[idCliente] = $post['cliente'];
			return $retorno;
		}
	}

	function Pesquisar($post)
	{

		$query = "";
		
		if($post['idCliente'])
		{
			$query .= " AND A.idcliente = '".$post['idCliente']."' ";
		}

		if($post['id'])
		{
			$query .= " AND A.id = '".$post['id']."' ";
		}

		if($post['idAnotacao'])
		{
			$query .= " AND TA.id = '".$post['idAnotacao']."' ";
		}

		if($post['idAnota'])
		{
			$query .= " AND A.id = '".$post['idAnota']."' ";
		}

		$retorno = array();
	
		$sql = "SELECT
					*,
					A.id AS id,
					C.id AS idCliente,
					TA.id AS idTipoAnotacao
				FROM  
					".$this->entidade." A
				LEFT JOIN
					cliente C
				ON 
					A.idcliente = C.id
				INNER JOIN
					tipo_anotacao TA
				ON 
					TA.id = A.idtipo
				WHERE
					1 = 1 ".$query." 
		";

		// GROUP BY
		// 	TA.nome
		
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
			$dados[$i]['nome'] 			= utf8_encode($rows['nome']);
			$dados[$i]['empresa'] 		= utf8_encode($rows['empresa']);
			$dados[$i]['titulo'] 		= utf8_encode($rows['titulo']);
			$dados[$i]['descricao'] 	= utf8_encode($rows['descricao']);
			$i++;
		}
	
		$retorno[0] = 0;
		$retorno[1] = $dados;
		return $retorno;
	}
}

