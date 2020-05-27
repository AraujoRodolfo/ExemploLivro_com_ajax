<?php 
	//este arquivo estaria no servidor
	$servidor = "localhost";
	$usuario = "profro26_aluno";
	$senha = ""; //a senha é a mesma, só não deixei aberto ao público (visivel)
	
	// Indicando qual base de dados usar
	$db = "profro26_exemplo";
	
	// Variavel que representa uma nova conexao com a base de dados
	$conexao = new mysqli($servidor, $usuario, $senha, $db);
	
	// Se não conseguirmos fazer a conexao, mostre qual erro ocorreu
	if(!$conexao) {		
			echo "Erro de conexão! {$conexao->error}";		
	}

?>