<div class="col-md-offset-4 col-md-4">
	<form method="post" class="form-group input-group">
		<fieldset>
			<legend>Cadastrar novo usuario.</legend>

			<label class="control-label" >Nome: </label>
			<div class="form-group input-group">
				<span class="input-group-addon">
					<i class="fa fa-user-circle-o" aria-hidden="true"></i>
				</span>
				<input type="text" name="nome" class="form-control" />
			</div>

			<label class="control-label" >email: </label>
			<div class="form-group input-group">
				<span class="input-group-addon">
					<i class="fa fa-envelope-o" aria-hidden="true"></i>
				</span>
				<input type="email" name="email" class="form-control" />
			</div>

			<label class="control-label" >Senha: </label>
			<div class="form-group input-group">
				<span class="input-group-addon">
					<i class="fa fa-key" aria-hidden="true"></i>
				</span>
				<input type="password" name="senha" class="form-control" />
			</div>

			<div class="form-group input-group">
				<select class="form-control"	 name="cargo">
					<?php foreach ($cargo->findAll() as $key => $value): ?>
						<option value="<?= $value->id;?>"><?= $value->nome;?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group input-group">
				<input type="submit" name="acao" value="Cadastrar usuario" class="btn btn-success">
			</div>
		</fieldset>
	</form>
</div>
