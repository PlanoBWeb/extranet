<?php

include_once "configs/funcoes.php";

class Usuario
{
	function Usuario()
    {
    	$this->entidade = "usuario";
    }
	
	function Grava($post)
	{
		$retorno = array();

		//Valida duplicidade
		$parametroValidacao['email'] = $post['email'];
		$retornoValidacao = $this->Pesquisar($parametroValidacao, null, null);
		if($retornoValidacao[1][0]['id'] != 0)
		{
			$retorno[0] = "1";
			$retorno[1] = "O email ".$post['email']." já existe em nosso banco de dados!";
			return $retorno;
		}
		
		$sql = "
			INSERT INTO
				".$this->entidade."
			SET
				nome = '".utf8_decode($post['nome'])."',
				email = '".$post['email']."',
				senha = '".md5($post['senha'])."',
				perfil = '".$post['perfil']."'
		";

		$result = mysql_query($sql);
		if (!($result))
		{
			$retorno[0] = "1";
			$retorno[1] = "Erro ao executar a query. Classe = Usuario - Metodo = grava";
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

		//Valida Senha
		if($post['senhaatual']){
			$parametroValidacao['senhaatual'] = md5($post['senhaatual']);
			$parametroValidacao['id']    	  = $post['id'];
			$retornoValidacao = $this->Pesquisar($parametroValidacao, null, null);

			if($retornoValidacao[1][0]['senha'] != $parametroValidacao['senhaatual'])
			{
				$retorno[0] = "1";
				$retorno[1] = "Senha atual incorreta!";
				return $retorno;
			}
		}
		//Valida Senha
		
		if($post['senha']){
			$sql = "
			UPDATE	
				".$this->entidade." 
			SET
				senha = '".md5($post['senha'])."'
			WHERE
				id = '".$post['id']."'
		".$query;

		}else{
			$sql = "
			UPDATE	
				".$this->entidade." 
			SET
				nome = '".utf8_decode($post['nome'])."',
				email = '".$post['email']."',
				perfil = '".$post['perfil']."'
			WHERE
				id = '".$post['id']."'
		".$query;
		}

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
			$query .= " AND U.id = '".$post['id']."' ";
		}
		
		if($post['senhaatual'])
		{
			$query .= " AND U.senha = '".$post['senhaatual']."' ";
		}		
		
		if($post['nome'])
		{
			$query .= " AND U.nome like '%".$post['nome']."%' ";
		}
		
		if($post['email'])
		{
			$query .= " AND U.email like '%".$post['email']."%' ";
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
					".$this->entidade." U
				WHERE
					1 = 1 ".$query."
				ORDER BY
					U.nome
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
			$dados[$i]['nome'] = utf8_encode($rows['nome']);
			
			if($rows['perfil'] == 'M')
			{
				$dados[$i]['perfilFormat'] = 'Master';
			}
			elseif($rows['perfil'] == 'C')
			{
				$dados[$i]['perfilFormat'] = 'Colaborador';
			}

			$dados[$i]['perfilCompleto'] = $this->exibeUsuario($rows['perfil']);
			
			$i++;
		}
	
		$retorno[0] = 0;
		$retorno[1] = $dados;
		return $retorno;
	}

	function exibeUsuario($nomePerfil){
		
		if($nomePerfil == "A"){
			$nomePerfil = "Administrador";
		}elseif ($nomePerfil == "M") {
			$nomePerfil = "Marketing";
		}elseif ($nomePerfil == "F") {
			$nomePerfil = "Financeiro";
		}elseif ($nomePerfil == "D") {
			$nomePerfil = "Desenvolvedor";
		}

		return $nomePerfil;
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
	
	function checa($login, $senha)
	{
		$retorno = array();
	
		$sql = "SELECT
					*
				FROM  
					".$this->entidade." 
				WHERE
					email = '".$login."' AND 
					senha = '".$senha."'
		";
		$result = mysql_query($sql);
		if (!($result))
		{
			$retorno[0] = "1";
			$retorno[1] = "Erro ao executar a query. Classe = ".$this->entidade." - Metodo = checa";
			return $retorno;
		}
		$total = mysql_num_rows($result);
		
		if( $total != 1 )
		{
			$retorno[0] = "1";
			$retorno[1] = "Login ou senha incorreta!";
			return $retorno;
		}
		
		$rows = mysql_fetch_array($result);
		
		$dadosUsuario['id']		= $rows['id'];
		$dadosUsuario['email']	= $rows['email'];
		$dadosUsuario['senha']	= $rows['senha'];
		$dadosUsuario['nome']	= $rows['nome'];
		$dadosUsuario['perfil']	= $rows['perfil'];
		
		$retorno[0] = 0;
		$retorno[1] = $dadosUsuario;
		return $retorno;
	}
}

