<div id="formulario_listar">
	<table>
		<tr>
			<th>Id:</th>
			<th>Nome:</th>
			<th>Ações:</th>
		</tr>

<?php
	 foreach($cargo->findAll() as $key => $value): ?>
		<tr>
			<td><?= $value->id; ?></td>
			<td><?= $value->nome; ?></td>
			<td>
				<?= "<a href='../index.php?acao=editar_cargo&id=" . $value->id . "'>Editar</a>"; ?>
				<?= "<a href='../index.php?acao=deletar_cargo&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
			</td>
<?php endforeach; ?>
		</tr>
	</table>
</div>
