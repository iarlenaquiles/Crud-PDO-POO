<p>Usuario: <?= $_SESSION['administrador'] ?></p><a href="index.php?acao=logout">Sair do sistema.</a>
<ul>
	<li>Usuarios</li>
		<ul>
			<li><a href="index.php?acao=novo_usuario">Novo</a></li>
			<li><a href="index.php?acao=listar_usuarios">Listar</a></li>
		</ul>
	<li>Cargos</li>
		<ul>
			<li><a href="index.php?acao=novo_cargo">Novo</a></li>
			<li><a href="index.php?acao=listar_cargos">Listar</a></li>
		</ul>
</ul>
