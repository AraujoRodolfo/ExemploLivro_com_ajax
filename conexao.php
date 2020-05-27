<?php 
	$servidor = "www.profrodolfo.com.br:3306";
	$usuario = "profro26_aluno";
	$senha = "158@aluno";
	
	// Indicando qual base de dados usar
	$db = "profro26_exemplo";
	
	// Variavel que representa uma nova conexao com a base de dados
	$conexao = new mysqli($servidor, $usuario, $senha, $db);
	
	// Se não conseguirmos fazer a conexao, mostre qual erro ocorreu
	if(!$conexao) {		
			echo "Erro de conexão! {$conexao->error}";		
	}

?>