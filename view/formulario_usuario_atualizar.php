<div id="formulario">
	<form method="post">
		<fieldset>
			<legend>Atualize o usuario.</legend>
			<label>Nome: </label><input type="text" name="nome" value="<?= $resultado->nome; ?>"/><br /><br />
			<label>Email: </label><input type="text" name="email" value="<?= $resultado->email; ?>"/><br /><br />
			<label>Senha: </label><input type="password" name="senha" placeholder="Digite uma senha" oninvalid="this.setCustomValidity('Informe uma senha!')" required/><br /><br />
			<select name="cargo">
				<?php foreach($cargo->findAll() as $key => $value): ?>
					<option <?= $selected = ($resultado->id_cargo == $value->id) ? 'selected="selected"' : '' ; ?>
									value="<?= $value->id;?>"><?= $value->nome;?>
					</option>
				<?php endforeach; ?>
			</select><br /><br />
			<input type="hidden" name="id" value="<?= $resultado->id; ?>">
			<input type="submit" name="acao" value="Atualizar usuario">
		</fieldset>
	</form>
</div>
