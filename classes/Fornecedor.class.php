<?php

include_once "configs/funcoes.php";
include_once "classes/Contato_fornecedor.class.php";

class Fornecedor
{
	function Fornecedor()
    {
    	$this->entidade = "fornecedor";
    }
	
	function Grava($post)
	{
		$retorno = array();

		//Valida duplicidade
		$parametroValidacao['cnpj'] = $post['cnpj'];
		$retornoValidacao = $this->Pesquisar($parametroValidacao, null, null);
		// print_r($retornoValidacao);
		// die();
		if($retornoValidacao[1][0]['id'] != 0)
		{
			$retorno[0] = "1";
			$retorno[1] = "O cnpj ".$post['cnpj']." já existe em nosso banco de dados!";
			return $retorno;
		}

		if(strlen($post['dddtel']) <= 2){
			$post['dddtel'] = "0". $post['dddtel'];
		}

		$retornoValidacao = validaUrl($post['site']);

		$sql = "
			INSERT INTO
				".$this->entidade."
			SET
				fornecedor 	= '".utf8_decode($post['fornecedor'])."',
				site	 	= '".$retornoValidacao."',
				cnpj 		= '".$post['cnpj']."',
				endereco 	= '".utf8_decode($post['endereco'])."',
				complemento = '".utf8_decode($post['complemento'])."',
				cep 		= '".utf8_decode($post['cep'])."',
				bairro	 	= '".utf8_decode($post['bairro'])."',
				cidade	 	= '".utf8_decode($post['cidade'])."',
				estado	 	= '".$post['estado']."',
				dddtel	 	= '".$post['dddtel']."',
				telefone 	= '".str_replace("-", "", $post['tel'])."',
				servicos 	= '".$post['servicos']."'
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

		if(strlen($post['dddtel']) <= 2){
			$post['dddtel'] = "0". $post['dddtel'];
		}

		$sql = "
			UPDATE	
				".$this->entidade."
			SET
				fornecedor 	= '".utf8_decode($post['fornecedor'])."',
				site	 	= '".utf8_decode($post['site'])."',
				cnpj 		= '".$post['cnpj']."',
				endereco 	= '".utf8_decode($post['endereco'])."',
				complemento = '".utf8_decode($post['complemento'])."',
				cep 		= '".utf8_decode($post['cep'])."',
				bairro	 	= '".utf8_decode($post['bairro'])."',
				cidade	 	= '".utf8_decode($post['cidade'])."',
				estado	 	= '".$post['estado']."',
				dddtel	 	= '".$post['dddtel']."',
				telefone 	= '".str_replace("-", "", $post['tel'])."',
				servicos 	= '".$post['servicos']."'
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
			$query .= " AND C.id = '".$post['id']."' ";
		}
		
		if($post['cnpj'])
		{
			$query .= " AND C.cnpj = '".$post['cnpj']."' ";
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
					".$this->entidade." C
				WHERE
					1 = 1 ".$query."
				ORDER BY
					C.fornecedor
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
			$dados[$i]['fornecedor'] 		= utf8_encode($rows['fornecedor']);
			$dados[$i]['siteCompleto'] 	= utf8_encode($rows['site']);
			$dados[$i]['site'] 			= utf8_encode(str_replace("http://", "", $rows['site']));
			$dados[$i]['endereco'] 		= utf8_encode($rows['endereco']);
			$dados[$i]['complemento'] 	= utf8_encode($rows['complemento']);
			$dados[$i]['cep'] 			= utf8_encode($rows['cep']);
			$dados[$i]['bairro'] 		= utf8_encode($rows['bairro']);
			$dados[$i]['cidade'] 		= utf8_encode($rows['cidade']);
			$dados[$i]['servicosSigla']	= utf8_encode($rows['servicos']);
			$dados[$i]['servicos'] 		= $this->exibeServico($rows['servicos']);
			$i++;
		}
	
		$retorno[0] = 0;
		$retorno[1] = $dados;
		return $retorno;
	}

	function exibeServico($nomeServico){
		
		if($nomeServico == "HM"){
			$nomeServico = "Hospedagem e Manutenção";
		}elseif ($nomeServico == "PI") {
			$nomeServico = " PlanoBInfo";
		}elseif ($nomeServico == "LP") {
			$nomeServico = "Link Patrocinado";
		}

		return $nomeServico;
	}
	
	function Exclui($id)
	{
		$retorno = array();

		$classContato = new Contato();
		$this->classContato = $classContato;

		$excluiContato['idfornecedor']	= $id;
		$retornoExcluiContato 	= $this->classContato->Exclui($excluiContato);
	
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

