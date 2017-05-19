<div id="formulario">
	<form method="post">
		<fieldset>
			<legend>Atualize o cargo.</legend>
			<label>Nome: </label><input type="text" name="cargo" value="<?= $resultado->nome; ?>"/><br /><br />
			<input type="hidden" name="id" value="<?= $resultado->id; ?>">
			<input type="submit" name="acao" value="Atualizar cargo">
		</fieldset>
	</form>
</div>
