<div id="formulario_listar">
	<table>
		<tr>
			<th>Id:</th>
			<th>Nome:</th>
			<th>E-mail:</th>
			<th>Senha:</th>
			<th>Codigo do Cargo:</th>
			<th>Ações:</th>
		</tr>

<?php
	 foreach($usuario->findAll() as $key => $value): ?>
		<tr>
			<td><?= $value->id; ?></td>
			<td><?= $value->nome; ?></td>
			<td><?= $value->email; ?></td>
			<td><?= $value->senha; ?></td>
			<td><?= $value->id_cargo; ?></td>
			<td>

				<?= "<a href='../index.php?acao=editar_usuario&id=" . $value->id . "'>Editar</a>"; ?>
				<?= "<a href='../index.php?acao=deletar_usuario&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
			</td>
<?php endforeach; ?>
		</tr>
	</table>
</div>
