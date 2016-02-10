<?php

include_once "configs/funcoes.php";

class Localizacao
{
	function Localizacao()
    {
		
    }
	
	function PesquisarCidades($_estado)
	{
		$query = "";
		
		$retorno = array();
	
		$sql = "SELECT
					*
				FROM  
					tb_cidades
				WHERE
					uf = '".$_estado."'
				ORDER BY
					nome
		";

		$result = mysql_query($sql);
		if (!($result))
		{
			$retorno[0] = "1";
			$retorno[1] = "Erro ao executar a query. Classe = Localizacao - Metodo = PesquisarCidades";
			return $retorno;
		}
		
		$i = 0;
		while( $rows = mysql_fetch_array($result) )
		{
			$dados[$i] 					= $rows;
			$dados[$i]['nome'] 		= utf8_encode($rows['nome']);

			$i++;
		}
		
		$retorno[0] = 0;
		$retorno[1] = $dados;
		return $retorno;
	}

	function PontosVendaCidades($_estado)
	{
		$query = "";
		
		$retorno = array();

		$sql = "SELECT
					*
				FROM  
					lojista L
				INNER JOIN 
					tb_cidades C
				ON 
					L.idCidade = C.id  
				WHERE
					C.uf = '".$_estado."'
				GROUP BY
					L.idCidade
		";



		$result = mysql_query($sql);
		if (!($result))
		{
			$retorno[0] = "1";
			$retorno[1] = "Erro ao executar a query. Classe = Localizacao - Metodo = PesquisarCidades";
			return $retorno;
		}
		
		$i = 0;
		while( $rows = mysql_fetch_array($result) )
		{
			$dados[$i] 					= $rows;
			$dados[$i]['nome'] 		= utf8_encode($rows['nome']);

			$i++;
		}
		
		$retorno[0] = 0;
		$retorno[1] = $dados;
		return $retorno;
	}

	function DistribuidorCidades($_estado)
	{
		$query = "";
		
		$retorno = array();

		$sql = "SELECT
					*
				FROM  
					distribuidor D
				INNER JOIN 
					tb_cidades C
				ON 
					C.id = D.idCidade
				WHERE
					uf = '".$_estado."'
				GROUP BY 
					C.nome
		";



		$result = mysql_query($sql);
		if (!($result))
		{
			$retorno[0] = "1";
			$retorno[1] = "Erro ao executar a query. Classe = Localizacao - Metodo = PesquisarCidades";
			return $retorno;
		}
		
		$i = 0;
		while( $rows = mysql_fetch_array($result) )
		{
			$dados[$i] 					= $rows;
			$dados[$i]['nome'] 		= utf8_encode($rows['nome']);

			$i++;
		}
		
		$retorno[0] = 0;
		$retorno[1] = $dados;
		return $retorno;
	}

	function PesquisarEstados()
	{
		$query = "";
		
		$retorno = array();
	
		$sql = "SELECT
					*
				FROM  
					lojista L
				INNER JOIN
					tb_cidades C
				ON 
					L.idCidade =  C.id
				GROUP BY 
					uf
		";

		$result = mysql_query($sql);
		if (!($result))
		{
			$retorno[0] = "1";
			$retorno[1] = "Erro ao executar a query. Classe = Localizacao - Metodo = PesquisarEstado";
			return $retorno;
		}
		
		$i = 0;
		while( $rows = mysql_fetch_array($result) )
		{
			$dados[$i] 					= $rows;
			$dados[$i]['nome'] 		= utf8_encode($rows['nome']);

			$i++;
		}
		
		$retorno[0] = 0;
		$retorno[1] = $dados;
		return $retorno;
	}

	function PesquisarEstadosDistribuidores()
	{
		$query = "";
		
		$retorno = array();
	
		$sql = "SELECT
					*
				FROM  
					distribuidor D
				INNER JOIN
					tb_cidades C
				ON 
					C.id = D.idCidade
				GROUP BY 
					uf
		";

		$result = mysql_query($sql);
		if (!($result))
		{
			$retorno[0] = "1";
			$retorno[1] = "Erro ao executar a query. Classe = Localizacao - Metodo = PesquisarEstado";
			return $retorno;
		}
		
		$i = 0;
		while( $rows = mysql_fetch_array($result) )
		{
			$dados[$i] 					= $rows;
			$dados[$i]['nome'] 		= utf8_encode($rows['nome']);

			$i++;
		}
		
		$retorno[0] = 0;
		$retorno[1] = $dados;
		return $retorno;
	}


	function PesquisarPais()
	{
		$query = "";
		
		$retorno = array();
	
		$sql = "SELECT
					*
				FROM  
					tb_pais
				ORDER BY
					paisNome
		";

		$result = mysql_query($sql);
		if (!($result))
		{
			$retorno[0] = "1";
			$retorno[1] = "Erro ao executar a query. Classe = Localizacao - Metodo = PesquisarPais";
			return $retorno;
		}
		
		$i = 0;
		while( $rows = mysql_fetch_array($result) )
		{
			$dados[$i] 					= $rows;
			$dados[$i]['id'] 		= $rows['paisId'];
			$dados[$i]['nome'] 		= utf8_encode($rows['paisNome']);

			$i++;
		}
		
		$retorno[0] = 0;
		$retorno[1] = $dados;
		return $retorno;
	}

	function PesquisaLojistaPais()
	{
		$query = "";
		
		$retorno = array();
	
		$sql = "SELECT
					*
				FROM  
					tb_pais P
				INNER JOIN
					lojista L
				ON 
					L.idPais = P.paisId AND L.status = 1
				GROUP BY
					paisNome
				ORDER BY
					paisNome
		";

		$result = mysql_query($sql);
		if (!($result))
		{
			$retorno[0] = "1";
			$retorno[1] = "Erro ao executar a query. Classe = Localizacao - Metodo = PesquisarPais";
			return $retorno;
		}
		
		$i = 0;
		while( $rows = mysql_fetch_array($result) )
		{
			$dados[$i] 					= $rows;
			$dados[$i]['id'] 		= $rows['paisId'];
			$dados[$i]['nome'] 		= utf8_encode($rows['paisNome']);

			$i++;
		}
		
		$retorno[0] = 0;
		$retorno[1] = $dados;
		return $retorno;
	}

	function PesquisaDistribuidorPais()
	{
		$query = "";
		
		$retorno = array();
	
		$sql = "SELECT
					*
				FROM  
					distribuidor D
				INNER JOIN
					tb_pais P
				ON 
					P.paisId = D.idPais
				GROUP BY
					paisNome
				ORDER BY
					paisNome
		";

		$result = mysql_query($sql);
		if (!($result))
		{
			$retorno[0] = "1";
			$retorno[1] = "Erro ao executar a query. Classe = Localizacao - Metodo = PesquisarPais";
			return $retorno;
		}
		
		$i = 0;
		while( $rows = mysql_fetch_array($result) )
		{
			$dados[$i] 					= $rows;
			$dados[$i]['id'] 		= $rows['paisId'];
			$dados[$i]['nome'] 		= utf8_encode($rows['paisNome']);

			$i++;
		}
		
		$retorno[0] = 0;
		$retorno[1] = $dados;
		return $retorno;
	}

	function PesquisarPais2()
	{
		$query = "";
		
		$retorno = array();
	
		$sql = "SELECT
					*
				FROM  
					pais
				ORDER BY
					nome
		";

		$result = mysql_query($sql);
		if (!($result))
		{
			$retorno[0] = "1";
			$retorno[1] = "Erro ao executar a query. Classe = Localizacao - Metodo = PesquisarPais";
			return $retorno;
		}
		
		$i = 0;
		while( $rows = mysql_fetch_array($result) )
		{
			$dados[$i] 					= $rows;
			$dados[$i]['nome'] 		= utf8_encode($rows['nome']);

			$i++;
		}
		
		$retorno[0] = 0;
		$retorno[1] = $dados;
		return $retorno;
	}
}

?>