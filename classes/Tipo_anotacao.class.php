<?php

include_once "configs/funcoes.php";

class Tipo_anotacao
{
	function Tipo_anotacao()
    {
    	$this->entidade = "tipo_anotacao";
    }

    function Pesquisar($post)
	{

		$query = "";
		if($post['nome_tipo'])
		{
			$query .= " AND TA.nome = '".$post['nome_tipo']."' ";
		}

		$retorno = array();
	
		$sql = "SELECT
					*
				FROM  
					".$this->entidade." TA
				WHERE
					1 = 1 ".$query." 
				GROUP BY
					TA.nome
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
			$dados[$i]['nome'] 			= utf8_encode($rows['nome']);
			$dados[$i]['titulo'] 		= utf8_encode($rows['titulo']);
			$i++;
		}
	
		$retorno[0] = 0;
		$retorno[1] = $dados;
		return $retorno;
	}

	function Grava($post)
	{
		$retorno = array();

		$retorno = $this->Pesquisar($post);

		if($retorno[1] != ""){
			$retorno[0] = "1";
			$retorno[1] = "Nome do tipo já existe em nossa base de dados!";
			return $retorno;
		}

		$sql = "
			INSERT INTO
				tipo_anotacao
			SET
				nome		= '".utf8_decode($post['nome_tipo'])."'
		";
		$result = mysql_query($sql);
		$ultimoId = mysql_insert_id();
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
			$retorno[tipo] = $ultimoId;
			return $retorno;
		}
	}
}

