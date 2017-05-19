<div id="formulario">
	<form method="post">
		<fieldset>
			<legend>Cadastrar novo usuario.</legend>
			<label>Nome: </label><input type="text" name="nome"/><br /><br />
			<label>Email: </label><input type="text" name="email"/><br /><br />
			<label>Senha: </label><input type="password" name="senha"/><br /><br />
			<select name="cargo">
				<?php foreach($cargo->findAll() as $key => $value): ?>
					<option value="<?= $value->id;?>"><?= $value->nome;?></option>
				<?php endforeach; ?>
			</select><br /><br />
		    <input type="submit" name="acao" value="Cadastrar usuario">
		</fieldset>
	</form>
</div>
