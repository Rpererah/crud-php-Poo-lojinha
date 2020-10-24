<?php
class Conexao{
    public function conecta(){
        $conn = mysqli_connect("localhost:3308", "root", "", "loja");  
			if(mysqli_connect_errno($conn)){
				echo "Error:" .mysqli_connect_errno();
				exit;
			}else{
				return $conn;
		}		
    }
}
?>
