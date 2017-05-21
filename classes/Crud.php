<?php

require_once 'DB.php';

abstract class Crud extends DB
{
    protected $table;

    abstract public function insert();
    abstract public function update($id);

    public function find($id)
    {
        $sql  = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = DB::prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();
    }

    public function findByNome($nome){
        $sql = "SELECT * FROM $this->table WHERE nome = :nome";
        $stmt = DB::prepare($sql);
        $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function findAll()
    {
        $sql  = "SELECT * FROM $this->table";
        $stmt = DB::prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function delete($id)
    {
        $sql  = "DELETE FROM $this->table WHERE id = :id";
        $stmt = DB::prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
