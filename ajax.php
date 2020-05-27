<?php
//comando que permite acesso cross domain (um domínio acessar outro domínio)
header('Access-Control-Allow-Origin: *');

include('conexao.php');
if(isset($_GET['id_livro'])){
	$sql = 'DELETE FROM tb_livro WHERE cd_livro = '.$_GET['id_livro'];
	$executa = $GLOBALS['conexao']->query($sql);		
	if($executa){			
		echo 'Livro excluido!';
	// Se não
	} else {			
		echo 'Erro ao excluir livro > '.$GLOBALS['conexao']->error;
	}
}
	
if(isset($_GET['listar'])){
	// Guardando uma consulta que seleciona tudo da tabela e ordena por nome
	$sql = 'SELECT * FROM tb_livro ORDER BY nm_livro ASC';	
	// Guardando a conexao já fazendo a consulta
	$executa = $GLOBALS['conexao']->query($sql);	
	// A função fetch_array() pega o resultado da consulta e transforma em uma array. Então, enquanto tiver algo na array,
	while ($livro = $executa->fetch_array()){
		// Mostre o resultado que está na array, só que estamos especificando onde cada resultado fica.
			echo '<tr>
					<td>'.$livro['cd_livro'].'</td>
					<td>'.$livro['nm_livro'].'</td>
					<td>'.$livro['dt_ano'].'</td>
					<td>'.$livro['dt_cadastro'].'</td>
					<td>'.$livro['dt_exemplares'].'</td>
					<td>					
						<button class="excluir" codigo="'.$livro['cd_livro'].'">Excluir</button> 
					</td>
				</tr>';		
	}
}
//
if($_POST){
		// Guarde os valores dos campos input
		$nome = $_POST['nomeDoLivro'];
		$ano = $_POST['anoDoLivro'];
		$exemplares = $_POST['qtdDeEx'];

		$hoje = date('Y/m/d');

		$sql = 'INSERT INTO tb_livro VALUES (null, "'.$nome.'", "'.$ano.'", "'.$hoje.'", '.$exemplares.')';		
		$executa = $GLOBALS['conexao']->query($sql);
		
		if($executa){
			// Mostre uma mensagem de sucesso
			echo "<br><div class='text-center text-success'><b class='bg-light'>Livro cadastrado com sucesso!</b></div>";
		// Se não,
		} else {			
			echo '
			<br><div class="text-center text-danger"><b class="bg-light">Um erro ocorreu {$GLOBALS["conexao"]->error}</b></div>';
		}
	}

?>