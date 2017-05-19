<html>
<meta charset="UTF-8">
<head>
   <title>Sistema</title>
   <link rel="stylesheet" type="text/css" href="/css/css.css" />
</head>
<body>

<?php
    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);

		function __autoload($class_name){
		require_once 'classes/' . ucfirst($class_name) . '.class.php';
		}

		session_start();
		$usuario = new Usuarios();
		$cargo = new Cargos();
		$logar = new login();

if (isset($_SESSION['logado'])) {

	include "view/head.php";

	if(isset($_POST['acao'])){
		switch ($_POST['acao']) {
			case 'Cadastrar usuario':

						$usuario->setNome($_POST['nome']);
						$usuario->setSenha($_POST['senha']);
						$usuario->setCargo($_POST['cargo']);
						if($usuario->setEmail($_POST['email'])){
							if($usuario->insert()){
								echo "Inserido com sucesso!";
							}
						}else{
							echo "O e-mail inserido é invalido!";
						}

				break;

			case 'Atualizar usuario':
						$usuario->setNome($_POST['nome']);
						$usuario->setSenha($_POST['senha']);
            $usuario->setCargo($_POST['cargo']);
						if($usuario->setEmail($_POST['email'])){
              $usuario->update($_POST['id']);
								echo "Atualizado com sucesso!";
						}else{
							echo "O e-mail inserido é invalido!";
						}
				break;

			case 'Cadastrar cargo':

						$cargo->setNome($_POST['cargo']);
						if($cargo->insert()){
								echo "Inserido com sucesso!";
						}

				break;

			case 'Atualizar cargo':
						$cargo->setNome($_POST['cargo']);
						if($cargo->update($_POST['id'])){
								echo "Atualizado com sucesso!";
						}
				break;
		}
	}

//crud de cargos e usuarios

	if (isset($_GET['acao'])) {

		switch ($_GET['acao']) {

			//Crud Usuarios

			case 'deletar_usuario':
						$id = (int)$_GET['id'];
						if($usuario->delete($id)){
							echo "Deletado com sucesso!";
						}
				break;

			case 'editar_usuario':
						$id = (int)$_GET['id'];
						$resultado = $usuario->find($id);
						include "view/formulario_usuario_atualizar.php";
				break;

			case 'novo_usuario':
						include "view/formulario_usuario_cadastrar.php";
				break;

			case 'listar_usuarios':
						include "view/listar_Usuarios.php";
				break;

		//Crud Cargos

			case 'deletar_cargo':
						$id = (int)$_GET['id'];
						if($cargo->delete($id)){
							echo "Deletado com sucesso!";
						}
				break;

			case 'editar_cargo':
						$id = (int)$_GET['id'];
						$resultado = $cargo->find($id);
						include "view/formulario_cargo_atualizar.php";
				break;

			case 'novo_cargo':
						include "view/formulario_cargo_cadastrar.php";
				break;

			case 'listar_cargos':
						include "view/listar_Cargos.php";
				break;
			case 'logout':
				$logar->deslogar();
				break;
		}
	}
}else{
	include "view/login.php";
	if (isset($_POST["logar"])) {
		if ($logar->logar($_POST["email"], md5($_POST["senha"]))) {
			header("location:http://teste.app/index.php");
		}else{
			echo "Erro ao logar!";
		}
	}
}
?>
</body>
</html>
