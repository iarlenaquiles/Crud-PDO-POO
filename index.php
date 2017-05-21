<?php
session_start();
/*
  Esta função irá ativar o buffer de saída. Enquanto o buffer de saída estiver ativo,
  não é enviada a saída do script (outros que não sejam cabeçalhos), ao invés a saída
  é guardada em um buffer interno.
 */
  ob_start();
  ini_set('display_errors', 1);
  ini_set('display_startup_erros', 1);
  error_reporting(E_ALL);
  spl_autoload_register(function ($class) {
  	if (file_exists('classes/' . ucfirst($class) . '.php')) {
  		require_once 'classes/' . ucfirst($class) . '.php';
  	}
  });
  $logar = new Login();
  include "view/layout/head.php";
  if (isset($_SESSION['logado'])) {
  	$usuario = new Usuarios();
  	$cargo = new Cargos();
  	include "view/layout/menu.php";
  	if (isset($_POST['acao'])) {
  		switch ($_POST['acao']) {
  			case 'Cadastrar usuario':
  			$usuario->setNome($_POST['nome']);
  			$usuario->setSenha($_POST['senha']);
  			$usuario->setCargo($_POST['cargo']);

  			if(isset($usuario->findByEmail($_POST['email'])->email) == $_POST['email']){ ?>
  			<div class="alert alert-danger alert-dismissable">
  				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  				O e-mail já está cadastrado!
  			</div>
  			<?php }else{
  				if ($usuario->setEmail($_POST['email'])) {
  					if ($usuario->insert()) {
  						?>
  						<div class="alert alert-success alert-dismissable">
  							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  							Inserido com sucesso!
  						</div>
  						<?php
  					}
  				} 
  			} 
  			break;
  			case 'Atualizar usuario':
  			$usuario->setNome($_POST['nome']);
  			$usuario->setSenha($_POST['senha']);
  			$usuario->setCargo($_POST['cargo']);
  			if ($usuario->setEmail($_POST['email'])) {
  				$usuario->update($_POST['id']); ?>
  				<div class="alert alert-success alert-dismissable">
  					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  					Atualizado com sucesso!
  				</div>
  				<?php
  			} else {
  				?>
  				<div class="alert alert-danger alert-dismissable">
  					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  					O e-mail inserido é invalido!
  				</div>
  				<?php
  			}
  			break;
  			case 'Cadastrar cargo':
  			$cargo->setNome($_POST['cargo']);

  			if(isset($cargo->findByNome($_POST['cargo'])->nome) == $_POST['cargo']){ ?>
  			<div class="alert alert-danger alert-dismissable">
  				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  				Cargo já existe!
  			</div>
  			<?php }else{
  				if ($cargo->insert()) {
  					?>
  					<div class="alert alert-success alert-dismissable">
  						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  						Inserido com sucesso!
  					</div>
  					<?php
  				}}
  				break;
  				case 'Atualizar cargo':
  				$cargo->setNome($_POST['cargo']);
  				if ($cargo->update($_POST['id'])) {
  					?>
  					<div class="alert alert-success alert-dismissable">
  						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  						Atualizado com sucesso!
  					</div>
  					<?php
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
  				if ($usuario->delete($id)) {
  					?>
  					<div class="alert alert-success alert-dismissable">
  						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  						Deletado com sucesso!
  					</div>
  					<?php
  				}
  				break;
  				case 'editar_usuario':
  				$id = (int)$_GET['id'];
  				$resultado = $usuario->find($id);
  				include "view/usuario/formulario_usuario_atualizar.php";
  				break;
  				case 'novo_usuario':
  				include "view/usuario/formulario_usuario_cadastrar.php";
  				break;
  				case 'listar_usuarios':
  				include "view/usuario/listar_usuarios.php";
  				break;
        //Crud Cargos
  				case 'deletar_cargo':
  				$id = (int)$_GET['id'];
  				if ($cargo->delete($id)) {
  					?>
  					<div class="alert alert-success alert-dismissable">
  						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  						Deletado com sucesso!
  					</div>
  					<?php
  				}
  				break;
  				case 'editar_cargo':
  				$id = (int)$_GET['id'];
  				$resultado = $cargo->find($id);
  				include "view/cargo/formulario_cargo_atualizar.php";
  				break;
  				case 'novo_cargo':
  				include "view/cargo/formulario_cargo_cadastrar.php";
  				break;
  				case 'listar_cargos':
  				include "view/cargo/listar_cargos.php";
  				break;
  				case 'logout':
  				$logar->deslogar();
  				break;
  			}
  		}
  	} else {
  		include "view/login/index.php";
  		if (isset($_POST["logar"])) {
  			if ($logar->logar($_POST["email"], md5($_POST["senha"]))) {
  				header("location: index.php");
  			} else { ?>
  			<div class="container">
  				<div class="alert alert-danger alert-dismissable">
  					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  					Erro ao logar!
  				</div>
  			</div>
  			<?php }
  		}
  	}
  	include "view/layout/footer.php";