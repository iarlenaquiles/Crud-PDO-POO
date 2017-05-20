<div class="col-md-offset-4 col-md-4">
	<form method="post" class="form-group input-group">
		<fieldset>
			<legend>Cadastrar novo cargo.</legend>
			<label class="control-label" >Nome: </label>
			<div class="form-group input-group">
				<span class="input-group-addon">
					<i class="fa fa-briefcase" aria-hidden="true"></i>
				</span>
				<input type="text" name="cargo" class="form-control"  value="<?= $resultado->nome; ?>"/>
			</div>
			<input type="hidden" name="id" value="<?= $resultado->id; ?>">
			<div class="form-group input-group">
				<input type="submit" name="acao" value="Atualizar cargo" class="btn btn-success">
			</div>
		</fieldset>
	</form>
</div>
