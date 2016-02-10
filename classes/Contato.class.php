<?php

include_once "configs/funcoes.php";

class Contato
{
	function Contato()
    {
    	$this->entidade = "contato";
    }
	
	function Grava($post)
	{
		$retorno = array();

		if(strlen($post['dddtel']) <= 2){
			$post['dddtel'] = "0". $post['dddtel'];
		}

		if(strlen($post['dddcel']) <= 2){
			$post['dddcel'] = "0". $post['dddcel'];
		}

		$sql = "
			INSERT INTO
				".$this->entidade."
			SET
				idcliente		= '".utf8_decode($post['cliente'])."',
				nome 			= '".utf8_decode($post['nome'])."',
				cargo 			= '".utf8_decode($post['cargo'])."',
				email 			= '".utf8_decode($post['email'])."',
				emailPessoal 	= '".utf8_decode($post['emailPessoal'])."',
				skype 			= '".utf8_decode($post['skype'])."',
				aniversario		= '".utf8_decode($post['aniversario'])."',
				dddtel	 		= '".$post['dddtel']."',
				telefone 		= '".$post['telefone']."',
				dddcel	 		= '".$post['dddcel']."',
				celular 		= '".$post['celular']."'
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

		if(strlen($post['dddcel']) <= 2){
			$post['dddcel'] = "0". $post['dddcel'];
		}

		$sql = "
			UPDATE	
				".$this->entidade."
			SET
				idcliente		= '".utf8_decode($post['cliente'])."',
				nome 			= '".utf8_decode($post['nome'])."',
				cargo 			= '".utf8_decode($post['cargo'])."',
				email 			= '".utf8_decode($post['email'])."',
				emailPessoal 	= '".utf8_decode($post['emailPessoal'])."',
				skype 			= '".utf8_decode($post['skype'])."',
				aniversario		= '".utf8_decode($post['aniversario'])."',
				dddtel	 		= '".$post['dddtel']."',
				telefone 		= '".$post['telefone']."',
				dddcel	 		= '".$post['dddcel']."',
				celular 		= '".$post['celular']."'
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
			$retorno[1] = "Alteração feita com sucesso";
			return $retorno;
		}
	}
	
	function Pesquisar($post)
	{

		$query = "";
		
		if($post['idCliente'])
		{
			$query .= " AND C.idcliente = '".$post['idCliente']."' ";
		}

		if($post['idExcluir'])
		{
			$query .= " AND C.id = '".$post['idExcluir']."' ";
		}

		if($post['idContato'])
		{
			$query .= " AND C.id = '".$post['idContato']."' ";
		}

		if($post['id'])
		{
			$query .= " AND C.id = '".$post['id']."' ";
		}

		if($post['cliente'])
		{
			$inner .= "Inner Join cliente CL ON C.idcliente = CL.id";
			$justFilds = ",CL.empresa";
		}

		
		$retorno = array();
	
		$sql = "SELECT
					C.*
				".$justFilds."
				FROM  
					".$this->entidade." C
				".$inner."
				WHERE
					1 = 1 ".$query."
				ORDER BY
					C.nome
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
			$dados[$i]['nome'] 				= utf8_encode($rows['nome']);
			$dados[$i]['empresa'] 			= utf8_encode($rows['empresa']);
			$dados[$i]['email'] 			= utf8_encode($rows['email']);
			$dados[$i]['telefoneLimpo'] 	= str_replace("-", "", $rows['telefone']);
			$dados[$i]['celularLimpo'] 		= str_replace("-", "", $rows['celular']);
			$dados[$i]['aniversario']		= date('d/m/Y', strtotime($rows['aniversario']));
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

		if($id['idcliente'])
		{
			$query .= "  idcliente = '".$id['idcliente']."' ";
		}

		if($id['id'])
		{
			$query .= "  id = '".$id['id']."' ";
		}
	
		$sql = "
			DELETE FROM	
				".$this->entidade."
			WHERE
				
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

