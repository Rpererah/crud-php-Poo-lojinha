<?php
Class FunctionsP{
		public function listarId($id,$nome){
			echo "<li><a href=verProdutos.php?id=$id>$nome</a></li>";
		}

		public function listaProdutos($id, $nome, $foto,$preco,$precoColetivo){
			echo "<p>" .$nome."</p>" ;
            echo "<p>" .$foto. "</p>";
            echo "<p>" .$preco. "</p>";
            echo "<p>" .$precoColetivo. "</p>";
			echo "<a href='alterarProdutos.php?alterar=".$id." '>Alterar</a> | ";
			echo "<a href='verProdutos.php?deleta=".$id." '>Deletar</a>";
		}
		
		public function updateSucess(){
			echo "Nome alterado com sucesso.";
		}
		public function errorMysql(){
			echo "Error: ".mysqli_error();
		}
		public function insertSucess(){
			echo "Cadastrado com sucesso.";
		}
		public function deleteSucess(){
			echo "Deletado com sucesso.</p>";
			echo "<a href=" .$_SERVER['PHP_SELF']. ">Clique aqui para atualizar.";
		}
		public function semCadastros(){
			echo "Não há nenhum funcionário registrado.";
		}

		public function avisoNome(){
			echo "O nome não pode ser maior que 255 caracteres.";
		}
		public function avisoEmail(){
			echo "O CPF não pode ter mais que 255 caracteres.";
		}
		public function avisoSenha(){
			echo "O Endereço não pode ter mais que 255 caracteres.";
		}
		
		public function avisoCamposVazios(){
			echo "Favor, preencher todos os campos.";
		}
		
		public function avisoNomeUpdate(){
			echo "O campo nome está vazio.";
        }
        public function avisoEmailUpdate(){
			echo "O campo nome está vazio.";
		}
}
?>