<div class="col-md-12">
	<fieldset>
		<legend>Os usuarios</legend>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Id:</th>
					<th>Nome:</th>
					<th>E-mail:</th>
					<th>Senha:</th>
					<th>ID Cargo:</th>
					<th>Ações:</th>
				</tr>
			</thead>
			<tbody>
				<?php	foreach ($usuario->findAll() as $key => $value): ?>
				<tr>
					<td><?= $value->id; ?></td>
					<td><?= $value->nome; ?></td>
					<td><?= $value->email; ?></td>
					<td><?= $value->senha; ?></td>
					<td><?= $value->id_cargo; ?></td>
					<td>
						<a href='?acao=editar_usuario&id=<?= $value->id; ?>'
							class="btn btn-warning btn-circle">
							<i class="fa fa-pencil"></i>
						</a>
						<a href='acao=deletar_usuario&id=<?=  $value->id; ?>'
							class="btn btn-danger btn-circle"
							onclick='return confirm(\"Deseja realmente deletar?\")'>
							<i class="fa fa-trash-o"></i>
						</a>
					</td>
				<?php endforeach; ?>
				</tr>
			</tbody>
		</table>
	</fieldset>
</div>
