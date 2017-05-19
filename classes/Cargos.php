<?php

require_once 'Crud.php';

class Cargos extends Crud
{

	protected $table = 'cargos';
	private $nome;

	public function setNome($nome)
	{
		$this->nome = $nome;
	}

	public function insert()
	{
		$sql  = "INSERT INTO $this->table (nome) VALUES (:nome)";
		$stmt = DB::prepare($sql);

		$stmt->bindValue(':nome', $this->nome);

		return $stmt->execute();

	}

	public function update($id)
	{
		$sql  = "UPDATE $this->table SET nome = :nome WHERE id = :id";
		$stmt = DB::prepare($sql);

		$stmt->bindValue(':nome', $this->nome);
		$stmt->bindValue(':id', $id);

		return $stmt->execute();

	}

}