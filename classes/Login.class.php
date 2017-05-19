<?php

class Login extends DB{

	public function logar($email, $senha){
		$sql  = "SELECT * FROM 	usuarios WHERE email = :email AND senha = :senha";
		$stmt = DB::prepare($sql);
		$stmt->bindValue(':email', $email, PDO::PARAM_INT);
		$stmt->bindValue(':senha', $senha, PDO::PARAM_INT);
		$stmt->execute();
		if ($stmt->rowCount()==1) {
			$dados = $stmt->fetch(PDO::FETCH_OBJ);
			$_SESSION['administrador'] = $dados->nome;
			$_SESSION['logado'] = true;
			return true;
		}else{
			return false;
		}
	}

	public static function deslogar(){
		if (isset($_SESSION['logado'])) {
			unset($_SESSION['logado']);
			session_destroy();
			header("location:http://teste.app/index.php");
		}
	}
}
?>
